<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('application_model');
		$this->load->model('settings_model');
		$this->load->model('messages_model');
		$this->load->model('template_model');
		$this->load->library(array('ion_auth','form_validation','pagination','user_agent','email','parser'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	/*This function will display dashboard */
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Reports";
		$this->data['header_title'] = "Reports";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		$this->_render_pages('reports_view', $this->data);
	}
	function reports_csv(){
		$this->status=$this->input->post('export');
		if($this->status=='completed'){
			$report = $this->application_model->list_completed_applications();
			$filename="Completed_applications_Report.csv";
			$this->create_csv($report,$filename);
		}else if($this->status=='pending'){
			$report = $this->application_model->list_pending_applications();
			$filename="Pending_applications_Report.csv";
			$this->create_csv($report,$filename);
		}else if($this->status=='process'){
			$report = $this->application_model->list_processing_applications();
			$filename="Processing_applications_Report.csv";
			$this->create_csv($report,$filename);
		}
	}
        function create_csv($report,$filename){
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		/* get the object   */
				/*  pass it to db utility function  */
		$new_report = $this->dbutil->csv_from_result($report);
		//echo $new_report;
		force_download($filename, $new_report);
		/*  Now use it to write file. write_file helper function will do it */
		//write_file('csv_file.csv',$new_report);
		/*  Done    */
            
        }
	/*
	This function will Render single Template 
	*/
	function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
	/*
	This function will Render Entire Template 
	*/
	function _render_pages($view, $data=null)//I think this makes more sense
	{
		$user=$this->ion_auth->user()->row();
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$this->viewdata['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$this->viewdata['application_count']=$this->application_model->myapps_process($this->session->userdata('user_id'));
		$this->viewdata['recent_messages']=$this->messages_model->get_new_messages('5');
		$this->viewdata['recent_normal_count']=$this->application_model->recent_count_normal();
		$this->viewdata['recent_immediate_count']=$this->application_model->recent_count_immediate();
		$this->viewdata['recent_urgent_count']=$this->application_model->recent_count_urgent();
		$this->_render_page('templates/header', $this->viewdata);
		$this->_render_page('templates/header_main', $this->viewdata);
		$this->_render_page($view, $this->viewdata);
		$this->_render_page('templates/footer_main', $this->viewdata);
		$this->_render_page('templates/footer', $this->viewdata);
	}
	function _pagination($base,$total_rows,$per_page){
	 	$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$config['base_url'] = $base;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page; 
		$this->pagination->initialize($config); 
		return $this->pagination->create_links();
	}
}