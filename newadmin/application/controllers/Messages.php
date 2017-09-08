<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('messages_model');
		$this->load->model('settings_model');
		$this->load->model('template_model');
		$this->load->model('application_model');
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
		$this->data['title'] = "List Received Messages";
		$this->data['header_title'] = "List Received Messages";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->data['total']=$this->messages_model->count_allreceivedmessages();
		$this->data['per_page']=10;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/messages/index/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['messages']=$this->messages_model->get_allreceivedmessages($this->data['per_page'], $this->data['page']);
		$this->_render_pages('messages_view', $this->data);
	}
	/*This function will display dashboard */
	function sent()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "List Sent Messages";
		$this->data['header_title'] = "List Sent Messages";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->_settings=$this->settings_model->get_settings();
		$this->data['total']=$this->messages_model->count_allsentmessages();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/messages/sent/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['messages']=$this->messages_model->get_allsentmessages($this->data['per_page'], $this->data['page']);
		$this->_render_pages('messages_view', $this->data);
	}
	/*
	This function for view Message 
	*/
	function view($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->maildata=array(
					'view' =>'1',
					);
		$this->messages_model->update($id,$this->maildata);
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		$this->data['messages']=$this->messages_model->get_message($id);
		$this->data['title'] = "View Message";
		$this->data['header_title'] = "View Message";
		$this->_render_pages('viewmessage_view', $this->data);
	}
	/*
	This function for send mail to user
	*/
	function reply($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Message Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->maildata=array(
			'view' =>'1',
			);
		$this->messages_model->update($id,$this->maildata);
		$this->_settings=$this->settings_model->get_settings();
				// validate form input
		$this->form_validation->set_rules('subject', 'Subject Required' , 'required');
		$this->form_validation->set_rules('templateData', 'Message  Required' , 'required');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$this->messagedata=$this->messages_model->get_message($id);
				if($this->appdata->userid){
					$this->appdata=$this->application_model->get_application($id);
					$this->data=array(
						'NAME'=> explode('?|',$this->appdata->firstname)[0],
						'INVOICE'=>$this->appdata->invoiceid,
						'BASEURL'=> base_url(),
						'CHECKSTATUS'=>"<a href=".$this->_settings->checkstatus.">Check Status</a>",
						'INVOICELINK'=>"<a href=".$this->_settings->invoicelink."/".$this->appdata->invoiceid.">Print Invoice</a>",
						'CONTACTLINK'=>"<a href=".$this->_settings->contactlink.">Contact Us</a>",
						'SITENAME'=>$this->_settings->sitename,
						'DATE'=> date('Y')
					);
					}else{
					$this->data=array(
						'NAME'=> $this->messagedata->name,
						'BASEURL'=> base_url(),
						'CHECKSTATUS'=>"<a href=".$this->_settings->checkstatus.">Check Status</a>",
						'CONTACTLINK'=>"<a href=".$this->_settings->contactlink.">Contact Us</a>",
						'SITENAME'=>$this->_settings->sitename,
						'DATE'=> date('Y')
					);
					}			
				$this->message = $this->parser->parse_string($this->input->post('templateData'), $this->data);
				$data = array(
					'name'=>$this->messagedata->name,
					'email'=>$this->messagedata->email,
					'subject'=>$this->input->post('subject'),
					'createddate'=>date('Y-m-d H:i:s'),
					'adminsent'=>'1',
					'userid'=>$this->messagedata->userid,
					'message'  => $this->message,
				);
				 if($this->messages_model->insert_message($data))
			    {
					$this->email->from($this->_settings->site_email, $this->_settings->sitename);
					$this->email->to($this->messagedata->email); 
					$this->email->subject($this->input->post('subject'));
					$this->email->message($this->message);	
					$this->email->send();
				    $this->session->set_flashdata('message',"Mail Sent Successfully" );
					$this->session->set_flashdata('messagetype',"alert-success" );
					redirect($this->agent->referrer(), 'refresh');
			    } else{
					$this->session->set_flashdata('message',"Failed to Send Mail.Please Try Later" );
					$this->session->set_flashdata('messagetype',"alert-danger" );
				}
			}else{
				$this->session->set_flashdata('messagetype',"alert-danger" );				}
		}
		$this->data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype'); //initializing
		$this->data['messages']=$this->messages_model->get_message($id);
		$this->data['email_templates']=$this->template_model->all_templates_notuser();
		$this->data['title'] = "Send Message";
		$this->data['header_title'] = "Send Message";
		$this->_render_pages("replymessage_view", $this->data);
	}
	/*
	This function for Download Visa for backend
	*/
	function downloadvisa($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}
	/*
	This function for Deleting Messages 
	*/
	function delete($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Message Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		 if($this->messages_model->delete($id))
			{
				$this->session->set_flashdata('message',"Message Deleted Successfully" );
				$this->session->set_flashdata('messagetype',"alert-success" );
				redirect($this->agent->referrer(), 'refresh');
			} else{
				$this->session->set_flashdata('message',"Failed to Delete Message .Please Try Later" );
				$this->session->set_flashdata('messagetype',"alert-danger" );
			}	
	}
	function get_messages_json(){
		$this->get_messages=$this->messages_model->get_new_messages('5');
		return json_encode($this->get_messages);
	}
	function get_messages(){
		$this->get_messages=$this->messages_model->get_new_messages('5');
		return $this->get_messages;
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