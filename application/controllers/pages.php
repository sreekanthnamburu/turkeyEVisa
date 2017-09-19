<?php 
class Pages extends CI_Controller {
public function view($page = 'home')
{
		 $this->load->helper('string');

        $this->load->helper(array('form', 'url'));

        $this->load->helper('email');

        $this->load->model('application_model');

        $this->load->library('encrypt');

        $this->load->helper('captcha');

        $this->load->helper('download');

        $this->load->library('session');
	if ( ! file_exists(APPPATH.'/views/'.THEME.'/pages/'.$page.'.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	$query = $this->db->query("SELECT * FROM seoinformation WHERE page='".$page."'");
	if ($query->num_rows() > 0) {
		$data['seo'] = $query->result();
	}

	$this->load->model('application_model');
	$data['title'] = ucfirst($page); // Capitalize the first letter
	$data['countrylist']=$this->application_model->get_country();
	$this->load->view(THEME.'/templates/header', $data);
	$this->load->view(THEME.'/pages/'.$page, $data);
	$this->load->view(THEME.'/templates/footer', $data);

}
}