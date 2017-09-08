<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('settings_model');
		$this->load->model('application_model');
		$this->load->library(array('ion_auth','form_validation','pagination','user_agent'));
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
		if (isset($_POST) && !empty($_POST))
		{
				$data = array(
					'sitename' 		=> $this->input->post('sitename'),
					'uploads_dir'  	=> $this->input->post('uploads_dir'),
					'site_email' 	=> $this->input->post('site_email'),
					'uploads_url'	=>$this->input->post('uploads_url'),
					'checkstatus'	=>$this->input->post('checkstatus'),
					'invoicelink'	=>$this->input->post('invoicelink'),
					'contactlink'	=>$this->input->post('contactlink'),
					'per_page'	=>$this->input->post('per_page'),
					'normal'	=>$this->input->post('normal'),
					'urgent'	=>$this->input->post('urgent'),
					'immediate'	=>$this->input->post('immediate'),
					'currency'	=>$this->input->post('currency'),
				);
				 if($this->settings_model->update('1', $data))
			    {
				    $this->session->set_flashdata('message',"Settings Updated Successfully" );
					$this->session->set_flashdata('messagetype',"alert-success" );
					redirect($this->agent->referrer(), 'refresh');
			    } else{
					$this->session->set_flashdata('message',"Failed to Application Settings .Please Try Later" );
					$this->session->set_flashdata('messagetype',"alert-danger" );
				}
		}
		$this->data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype'); //initializing
		$this->data['settings']=$this->settings_model->get_settings();
		$this->data['title'] = "Settings";
		$this->data['header_title'] = "Settings";
		$this->_render_pages('settings_view', $this->data);
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
		$this->viewdata['application_count']=$this->application_model->count_myapps($this->session->userdata('user_id'));
		$this->_render_page('templates/header', $this->viewdata);
		$this->_render_page('templates/header_main', $this->viewdata);
		$this->_render_page($view, $this->viewdata);
		$this->_render_page('templates/footer_main', $this->viewdata);
		$this->_render_page('templates/footer', $this->viewdata);
	}
}