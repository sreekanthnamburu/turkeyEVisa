<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Template extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('application_model');
		$this->load->model('settings_model');
		$this->load->model('messages_model');
		$this->load->model('template_model');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	/*This function will display Templates */
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "List Templates";
		$this->data['header_title'] = "List Email Templates";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		$this->data['email_templates']=$this->template_model->all_templates();
		$this->_render_pages("template_view", $this->data);
	}
		/*This function will Edit Email Templates */
	function create()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['messagetype'] = 'alert-success'; //initializing
				// validate form input
		$this->form_validation->set_rules('templatename', 'Template Name Required', 'required');
		$this->form_validation->set_rules('templateData', 'Template Data Required' , 'required');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'templatename' => $this->input->post('templatename'),
					'templateData'  => $this->input->post('templateData'),
					'status'    => $this->input->post('status')=='on'?"1":"0",
				);
				$this->id = $this->input->post('id');
				 if($this->template_model->create($data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message',"Template Created Successfully" );
					$this->session->set_flashdata('message',"alert-success" );
					// redirect them to the template page
					redirect('template', 'refresh');
			    } else{
					$this->session->set_flashdata('message',"Failed to Create Template .Please Try Later" );
					$this->session->set_flashdata('message',"alert-danger" );
				}
			}else{
				$this->session->set_flashdata('message',"alert-danger" );
				}
		}
		$this->data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		$this->data['title'] = "New Email Template";
		$this->data['header_title'] = "New Email Template";
		$this->data['email_templates']=$this->template_model->all_templates();
		$this->_render_pages("newtemplate_view", $this->data);
	}
	/*This function will Edit Email Templates */
	function edit($id)
	{
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Template Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect('template', 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
				// validate form input
		$this->form_validation->set_rules('templatename', 'Template Name Required', 'required');
		$this->form_validation->set_rules('templateData', 'Template Data Required' , 'required');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'templatename' => $this->input->post('templatename'),
					'templateData'  => $this->input->post('templateData'),
					'status'    => $this->input->post('status')=='on'?"1":"0",
					'users'    => $this->input->post('users')=='on'?"1":"0",
				);
				$this->id = $this->input->post('id');
				 if($this->template_model->update($this->id, $data))
			    {
				    $this->session->set_flashdata('message',"Template Updated Successfully" );
					$this->session->set_flashdata('messagetype',"alert-success" );
					redirect('template', 'refresh');
			    } else{
					$this->session->set_flashdata('message',"Failed to Update Template .Please Try Later" );
					$this->session->set_flashdata('messagetype',"alert-danger" );
				}
			}else{
				$this->data['messagetype'] = 'alert-danger';
				}
		}
		$this->data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype'); //initializing
		$this->data['email_template']=$this->template_model->get_template($id);
		$this->data['title'] = "Edit Email Template";
		$this->data['header_title'] = "Edit Email Template";
		$this->_render_pages("edittemplate_view", $this->data);
	}
	/*This function will Delete Email Templates */
	function delete($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Template Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect('template', 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		 if($this->template_model->delete($id))
			{
				$this->session->set_flashdata('message',"Template Deleted Successfully" );
				$this->session->set_flashdata('messagetype',"alert-success" );
				redirect('template', 'refresh');
			} else{
				$this->session->set_flashdata('message',"Failed to Delete Template .Please Try Later" );
				$this->session->set_flashdata('messagetype',"alert-danger" );
			}
		
	
	}
	function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
	function _render_pages($view, $data=null)//I think this makes more sense
	{
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
}
