<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
	}
	public function get_settings(){
		$query = $this->db->get_where('settings', array('id' => '1'));
		return $query->row();
	}
	public function update($id,$data){
	$this->db->where('id', $id);
	if($this->db->update('settings', $data)){
		return true;
		}else{
			return false;
		};
	}
}