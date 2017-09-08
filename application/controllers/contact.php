<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contact extends CI_Controller {



	public function __Construct(){

		parent::__construct();

		$this->
load->helper('string');

		$this->load->helper('url');

		 $this->load->database();

	}

	public function index()

	{

		$this->load->helper('url');

	if ( ! file_exists(APPPATH.'/views/'.THEME.'/pages/application.php'))

	{

		// Whoops, we don't have a page for that!

		show_404();

	}



	$data['title'] = ucfirst("Contact"); // Capitalize the first letter	$data['message']= "";



	$this->load->view(THEME.'/templates/header', $data);

	$this->load->view(THEME.'/pages/contact-us', $data);

	$this->load->view(THEME.'/templates/footer', $data);

	} 

	public function send(){
		 $this->load->helper(array('form', 'url'));
     $this->load->library('form_validation');
$this->form_validation->set_rules('first-name', 'First Name', 'required');
$this->form_validation->set_rules('last-name', 'Last Name', 'required');
$this->form_validation->set_rules('subject', 'Subject', 'required');
$this->form_validation->set_rules('email', 'Email', 'email|required');
$this->form_validation->set_rules('comments', 'Comments', 'email|required');
if ($this->form_validation->run() == TRUE)



        {

	 $this->load->database();

	$now = date("Y-m-d H:i:s");

	$cdata=array(

			'name' =>$this->input->post('first-name').' '.$this->input->post('last-name'),

			'subject' =>$this->input->post('subject'),

			'message'=>$this->input->post('comments'),

			'email'=>$this->input->post('email'),

			'senderip'=>$_SERVER['REMOTE_ADDR'],

			'createddate'=>$now,

			);

	$this->load->library('email');

	$config['wordwrap'] = TRUE;

	$config['mailtype'] = "html";

	$this->email->initialize($config);

	$email=$this->input->post('email');

	$name=$this->input->post('name');

	$subject=$this->input->post('subject');

	$message=$this->input->post('comments');

	$body="<b>Name  :</b> $name<br/>
<b>Email</b> : $email<br/>
<b>Subject</b>: $subject<br/>
<b>Message:</b>:$message<br/>
<br/>
this mail is sent from turkey visa contact Page";

	$this->email->from($email, $name);

	$this->email->to(SITEEMAIL);

//$this->email->cc('another@another-example.com');

//$this->email->bcc('them@their-example.com');



$this->email->subject($subject);

$this->email->message($body);



if($this->email->send()){

$this->db->insert('visa_contacts', $cdata);



//echo $this->email->print_debugger();

	$data['title'] = ucfirst("Contact"); // Capitalize the first letter

	$data['message']= "
<p class='alert alert-success'>Message Sent Successfully</p>
<br/>
";

	$this->load->view(THEME.'/templates/header', $data);

	$this->load->view(THEME.'/pages/contact-us', $data);

	$this->load->view(THEME.'/templates/footer', $data);

}	}else{
	$data['title'] = ucfirst("Contact"); // Capitalize the first letter

	$data['message']= "
<p class='alert alert-danger'>All Fields Required</p>
<br/>
";

	$this->load->view(THEME.'/templates/header', $data);

	$this->load->view(THEME.'/pages/contact-us', $data);

	$this->load->view(THEME.'/templates/footer', $data);

}
}


	public function send_json(){
	 $this->load->helper(array('form', 'url'));
     $this->load->library('form_validation');
$this->form_validation->set_rules('first-name', 'First Name', 'required');
$this->form_validation->set_rules('last-name', 'Last Name', 'required');
$this->form_validation->set_rules('subject', 'Subject', 'required');
$this->form_validation->set_rules('email', 'Email', 'email|required');
$this->form_validation->set_rules('comments', 'Comments', 'email|required');
if ($this->form_validation->run() == TRUE)



        {
	 $this->load->database();

	$now = date("Y-m-d H:i:s");

	$cdata=array(

			'name' =>$this->input->post('first-name').' '.$this->input->post('last-name'),
			
           // 'name' =>$this->input->post('name'),
			'subject' =>$this->input->post('subject'),

			'message'=>$this->input->post('comments'),

			'email'=>$this->input->post('email'),

			'senderip'=>$_SERVER['REMOTE_ADDR'],

			'createddate'=>$now,

			);
			
	$this->load->library('email');

	$config['wordwrap'] = TRUE;

	$config['mailtype'] = "html";

	$this->email->initialize($config);

	$email=$this->input->post('email');

	$name=$this->input->post('name');

	$subject=$this->input->post('subject');

	$message=$this->input->post('comments');

	$body="<b>Name  :</b> $name<br/>
<b>Email</b> : $email<br/>
<b>Subject</b>: $subject<br/>
<b>Message:</b>:$message<br/>
<br/>
this mail is sent from Quickevisa contact Page";

	$this->email->from($email, $name);

	$this->email->to(SITEEMAIL);

//$this->email->cc('another@another-example.com');

//$this->email->bcc('them@their-example.com');



$this->email->subject($subject);

$this->email->message($body);



if($this->email->send()){

$this->db->insert('visa_contacts', $cdata);



//echo $this->email->print_debugger();

	$data['title'] = ucfirst("Contact"); // Capitalize the first letter

	$data['message']= "Message Sent Successfully";

	 $result = array(

		'result' => 'success', 

		'msg' => $data['message'],

		);



	echo json_encode($result);

}else{

$data['message']= "Message Sent Failed";

 $result = array(

		'result' => 'error', 

		'msg' => $data['message'],

		);



	echo json_encode($result);

}
	} else{
	 $result = array(

		'result' => 'error', 

		'msg' => "All Fields Required",

		);



	echo json_encode($result);
}
	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */