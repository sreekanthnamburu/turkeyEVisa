<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
		// initialize db tables data
		$this->tables  = $this->config->item('tables', 'email_templates');
	}
	public function all_templates(){
	     $query = $this->db->get_where('email_templates');
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function all_templates_notuser(){
	     $query = $this->db->get_where('email_templates',array('users'=>'0'));
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function all_templates_user(){
	     $query = $this->db->get_where('email_templates',array('users'=>'1'));
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function get_template($id){
		$query = $this->db->get_where('email_templates', array('id' => $id));
		return $query->row();
	}
	public function create($data){
		if($this->db->insert('email_templates', $data))
		return true;
		else 
		return false;
	}
	public function update($id,$data){
	$this->db->where('id', $id);
	if($this->db->update('email_templates', $data)){
		return true;
		}else{
			return false;
		};
	}
	public function delete($id){
	$this->db->where('id', $id);
	if($this->db->delete('email_templates')){
		return true;
		}else{
			return false;
		};
	}
}
