<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('application_model');
		$this->load->model('settings_model');
		$this->load->model('messages_model');
		$this->load->model('template_model');
		$this->load->helper('download');
		$this->load->helper('date');
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
		$this->data['title'] = "Pending Applications";
		$this->data['header_title'] = "Pending Applications";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->_settings=$this->settings_model->get_settings();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['total']=$this->application_model->count_pending();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/application/pending_applications/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['applications']=$this->application_model->pending_applications($this->data['per_page'], $this->data['page']);
		$this->_render_pages('application_view', $this->data);
	}
	/*
	This function will Pending Applications View 
	*/
	function pending_applications()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Pending Applications";
		$this->data['header_title'] = "Pending Applications";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->_settings=$this->settings_model->get_settings();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['total']=$this->application_model->count_pending();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/application/pending_applications/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['applications']=$this->application_model->pending_applications($this->data['per_page'], $this->data['page']);
		$this->_render_pages('application_view', $this->data);
	}
	/*
	This function will Processing Applications View 
	*/
	function processing_applications()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Processing Applications";
		$this->data['header_title'] = "Processing Applications";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->_settings=$this->settings_model->get_settings();
		$this->data['total']=$this->application_model->count_processing();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/application/processing_applications/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['applications']=$this->application_model->processing_applications($this->data['per_page'], $this->data['page']);
		$this->_render_pages('application_view', $this->data);
	}
	/*
	This function will Completed Applications View 
	*/
	function completed_applications()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "Completed Applications";
		$this->data['header_title'] = "Completed Applications";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->_settings=$this->settings_model->get_settings();
		$this->data['total']=$this->application_model->count_completed();
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/application/completed_applications/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['applications']=$this->application_model->completed_applications($this->data['per_page'], $this->data['page']);
		$this->_render_pages('application_view', $this->data);
	}
	/*
	This function will My Applications View 
	*/
	function my_applications()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['title'] = "My Applications";
		$this->data['header_title'] = "CMy Applications";
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		/*pagination Classes*/
		$this->_settings=$this->settings_model->get_settings();
		$this->data['total']=$this->application_model->count_myapps($this->session->userdata('user_id'));
		$this->data['per_page']=$this->_settings->per_page;
		$this->data['pagination']=$this->_pagination(base_url().'index.php/application/my_applications/',$this->data['total'],$this->data['per_page']);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['applications']=$this->application_model->my_applications($this->data['per_page'], $this->data['page'],$this->session->userdata('user_id'));
		$this->_render_pages('application_view', $this->data);
	}
	/*
	This function for view Application 
	*/
	function view($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype');
		$this->data['settings']=$this->settings_model->get_settings();;
		$this->data['visa_docs']=$this->application_model->get_visadocs($id);
		$this->data['messages']=$this->application_model->get_messages($id);
		$this->data['title'] = "View Applications";
		$this->data['header_title'] = "View Applications";
		$this->data['application']=$this->application_model->get_application($id);
		$this->_render_pages('viewapplication_view', $this->data);
	}
	/*
	This function for Editing Application 
	*/
	function edit($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Application Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		if (isset($_POST) && !empty($_POST))
		{
				$data = array(
					'active' =>  $this->input->post('enable')=='on'?"1":"0",
					'status'    => $this->input->post('status'),
				);
				 if($this->application_model->update($id, $data))
			    {
				    $this->session->set_flashdata('message',"Application Updated Successfully" );
					$this->session->set_flashdata('messagetype',"alert-success" );
					redirect($this->agent->referrer(), 'refresh');
			    } else{
					$this->session->set_flashdata('message',"Failed to Application Template .Please Try Later" );
					$this->session->set_flashdata('messagetype',"alert-danger" );
				}
		}
		$this->data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');
		$this->data['messagetype'] = $this->session->flashdata('messagetype'); //initializing
		$this->data['application']=$this->application_model->get_application($id);
		$this->data['visa_docs']=$this->application_model->get_visadocs($id);
		$this->data['visa_docs_count']=$this->application_model->get_visadocs_count($id);
		$this->data['title'] = "Edit Email Template";
		$this->data['header_title'] = "Edit Email Template";
		$this->_render_pages("editapplication_view", $this->data);
	
	}
	/*
	This function for Deleting Application 
	*/
	function delete($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Application Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		 if($this->application_model->delete($id))
			{
				$this->session->set_flashdata('message',"Application Deleted Successfully" );
				$this->session->set_flashdata('messagetype',"alert-success" );
				redirect($this->agent->referrer(), 'refresh');
			} else{
				$this->session->set_flashdata('message',"Failed to Delete Application .Please Try Later" );
				$this->session->set_flashdata('messagetype',"alert-danger" );
			}	
	}
	/*
	This function for Deleting Visa 
	*/
	function delete_visa($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Visa Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		 if($this->application_model->delete_visa($id))
			{
				$this->session->set_flashdata('message',"Visa Deleted Successfully" );
				$this->session->set_flashdata('messagetype',"alert-success" );
				redirect($this->agent->referrer(), 'refresh');
			} else{
				$this->session->set_flashdata('message',"Failed to Delete Visa .Please Try Later" );
				$this->session->set_flashdata('messagetype',"alert-danger" );
			}	
	}
	/*
	This function for send mail to user
	*/
	function message($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Application Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->_settings=$this->settings_model->get_settings();
				// validate form input
		$this->form_validation->set_rules('subject', 'Subject Required' , 'required');
		$this->form_validation->set_rules('templateData', 'Message  Required' , 'required');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$this->appdata=$this->application_model->get_application($id);
				$this->data=array(
						'NAME'=> explode('?|',$this->appdata->firstname)[0],
						'INVOICE'=>$this->appdata->invoiceid,
						'BASEURL'=> base_url(),
						'CHECKSTATUS'=>"<a href=".$this->_settings->checkstatus.">Check Status</a>",
						'INVOICELINK'=>"<a href=".$this->_settings->invoicelink."/".$this->appdata->invoiceid.">Print Invoice</a>",
						'CONTACTLINK'=>"<a href=".$this->_settings->contactlink.">Contact Us</a>",
						'SITENAME'=>$this->_settings->sitename,
						'DATE'=> '2015'
					);
									
				$this->message = $this->parser->parse_string($this->input->post('templateData'), $this->data);
				$data = array(
					'name'=>explode('?|',$this->appdata->firstname)[0],
					'email'=>$this->appdata->email,
					'subject'=>$this->input->post('subject'),
					'createddate'=>now(),
					'adminsent'=>'1',
					'userid'=>$this->appdata->id,
					'message'  => $this->message,
				);
				 if($this->application_model->insert_message($data))
			    {
					$config['protocol'] = 'sendmail';
					$config['mailtype'] = 'html';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$this->email->initialize($config);
					$this->email->from($this->_settings->site_email, $this->_settings->sitename);
					$this->email->to($this->appdata->email); 
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
		$this->data['application']=$this->application_model->get_application($id);
		$this->data['email_templates']=$this->template_model->all_templates();
		$this->data['title'] = "Send Message";
		$this->data['header_title'] = "Send Message";
		$this->_render_pages("messageapplication_view", $this->data);
	}
	/*
	This function for Download Visa for backend
	*/
	function downloadvisa($id){
		if($id == NULL){
			// redirect them to the Template page
			$this->session->set_flashdata('message',"No Visa Found" );
			$this->session->set_flashdata('messagetype',"alert-danger" );
			redirect($this->agent->referrer(), 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->_settings=$this->settings_model->get_settings();
		$this->targetPath = $this->_settings->uploads_dir?$this->_settings->uploads_dir:getcwd() . '/uploads/';
		$this->visa=$this->application_model->get_visa($id);
		$data = file_get_contents($this->targetPath.$this->visa->image); // Read the file's contents
		$name = $this->visa->image;
		force_download($name, $data);
		}
		/*
	This function for Send Visa to user
	*/
	function sendvisa($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}
	/*
	This function for Lock Application 
	*/
	function lock($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		// redirect them to the Applications
		$user = $this->ion_auth->user()->row();
		$this->application_model->lock_application($id,$user->id);
		$this->session->set_flashdata('message', 'Application Locked Successfully');
		$this->session->set_flashdata('messagetype',"alert-success" );
		redirect($this->agent->referrer(), 'refresh');
	}
	/*
	This function for Un Lock Application 
	*/
	function unlock($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		// redirect them to the Applications
		$user = $this->ion_auth->user()->row();
		$this->application_model->unlock_application($id,$user->id);
		$this->session->set_flashdata('message', 'Application UnLocked Successfully');
		$this->session->set_flashdata('messagetype',"alert-success" );
		redirect($this->agent->referrer(), 'refresh');
	}
	/*
	This function will upload files to DB*/
	public function upload($id,$invoice) {
		if (!empty($_FILES)) {
		$tempFile = $_FILES['file']['tmp_name'];
		$fileName = $_FILES['file']['name'];
		$this->_settings=$this->settings_model->get_settings();
		$targetPath = $this->_settings->uploads_dir;
		$targetFile = $targetPath . $fileName ;
		if(move_uploaded_file($tempFile, $targetFile)){
			$data = array(
				'id' => $id,
				'invoiceid' =>$invoice,
				'image' =>$fileName,
			);
			$this->application_model->upload($data);	
		}
		// if you want to save in db,where here
		// with out model just for example
		// $this->load->database(); // load database
		// $this->db->insert('file_table',array('file_name' => $fileName));
		}
	}
	function search(){
	$key=$this->input->post('s');
	$this->data['applications']=$this->application_model->search($key);
	$this->data['messages']=$this->messages_model->search($key);
		
	}
	function update_sidebar_msgs(){
	$html ='<ul class="list list-activity">';
	$recent_messages=$this->messages_model->get_new_messages('5');
	foreach($recent_messages as $message){
		$html .='<li>
			<i class="si si-mail-envelope text-success"></i>
			<div class="font-w600">'.$message->name.'</div>
			<div><a href="'.site_url('messages/view/'.$message->id).'">'.$message->subject.'</a></div>
			<div><small class="text-muted">'.$message->createddate.'</small></div>
		</li>';
		}
	$html .='</ul>';
	echo $html;
	}
	function update_sidebar_apps(){
		$this->viewdata['recent_normal_count']=$this->application_model->recent_count_normal();
		$this->viewdata['recent_immediate_count']=$this->application_model->recent_count_immediate();
		$this->viewdata['recent_urgent_count']=$this->application_model->recent_count_urgent();
		echo '<ul class="nav-users">
                                    <li>
                                        <a href="#">
                                            <img class="img-avatar" src="'.base_url().'assets/img/avatars/avatar5.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> <span class="badge badge-primary pull-right">'.$this->viewdata['recent_urgent_count'].'</span>
                                            <div class="font-w400 text-muted">Urgent applications</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-avatar" src="'.base_url().'assets/img/avatars/avatar5.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> <span class="badge badge-primary pull-right">'.$this->viewdata['recent_immediate_count'].'</span>
                                            <div class="font-w400 text-muted">Immediate applications</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-avatar" src="'.base_url().'assets/img/avatars/avatar5.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> <span class="badge badge-primary pull-right">'.$this->viewdata['recent_normal_count'].'</span>
                                            <div class="font-w400 text-muted">Normal applications</div>
                                        </a>
                                    </li>  
                                </ul>';
                                }
	/*This function will Send Template Data*/
	function template_json($id){
		$this->template_data=$this->template_model->get_template($id);
		echo json_encode($this->template_data);
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
