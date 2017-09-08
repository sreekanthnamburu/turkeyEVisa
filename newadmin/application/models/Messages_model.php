<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
	}
	public function get_allsentmessages($limit,$start){
		 $this->db->limit($limit, $start);
		 $this->db->select('*');
	     $this->db->from('visa_contacts');
		 $this->db->where('adminsent','1');
		 $this->db->order_by('id','asc');
		 $query = $this->db->get(); 
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function get_new_messages($limit){
		 $this->db->limit($limit);
		 $this->db->select('*');
	     $this->db->from('visa_contacts');
		 $this->db->where('adminsent','');
		 $this->db->where('view','');
		 $this->db->order_by('id','asc');
		 $query = $this->db->get(); 
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function get_new_messages_count(){
		 $this->db->limit($limit);
		 $this->db->select('*');
	     $this->db->from('visa_contacts');
		 $this->db->where('adminsent','');
		 $this->db->where('view','');
		 $this->db->order_by('id','asc');
		 $query = $this->db->get(); 
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->num_rows();
	}
	public function count_allsentmessages(){
		$query = $this->db->get_where('visa_contacts', array('adminsent' => ''));
		return $query->num_rows();
	}
	public function get_allreceivedmessages($limit,$start){
		 $this->db->limit($limit, $start);
		 $this->db->select('*');
	     $this->db->from('visa_contacts');
		 $this->db->where('adminsent','');
		 $this->db->order_by('id','asc');
		 $query = $this->db->get(); 
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function count_allreceivedmessages(){
		$query = $this->db->get_where('visa_contacts', array('adminsent' => ''));
		return $query->num_rows();
	}
	public function get_message($id){
		$query = $this->db->get_where('visa_contacts', array('id' => $id));
		return $query->row();
	}
	public function insert_message($data){
		if($this->db->insert('visa_contacts', $data))
		return true;
		else 
		return false;
	}
	public function update($id,$data){
	$this->db->where('id', $id);
	if($this->db->update('visa_contacts', $data)){
		return true;
		}else{
			return false;
		};
	}
	public function delete($id){
	$this->db->where('id', $id);
	if($this->db->delete('visa_contacts')){
		return true;
		}else{
			return false;
		};
	}
}