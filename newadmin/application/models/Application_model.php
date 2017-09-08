<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
	}
	public function pending_applications($limit,$start){
		$this->db->limit($limit, $start);
		 $this->db->select('a.*,u.username');
	     $this->db->from('applications a');
		 $this->db->join('users u', 'u.id = a.lockUser', 'left');
		 $this->db->where('a.status','P');
		 $this->db->order_by('a.id','asc');
		 $query = $this->db->get();
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function processing_applications($limit,$start){
		$this->db->limit($limit, $start);
		 $this->db->select('a.*,u.username');
	     $this->db->from('applications a');
		 $this->db->join('users u', 'u.id = a.lockUser', 'left');
		 $this->db->where('a.status','Pr');
		  $this->db->order_by('a.id','asc');
		 $query = $this->db->get();
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function completed_applications($limit,$start){
		 $this->db->limit($limit, $start);
		 $this->db->select('a.*,u.username');
	     $this->db->from('applications a');
		 $this->db->join('users u', 'u.id = a.lockUser', 'left');
		 $this->db->where('a.status','C');
		 $this->db->order_by('a.id','asc');
		 $query = $this->db->get(); 
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function list_completed_applications(){
		$query = $this->db->get_where('applications', array('status' => 'C'));
        return $query;
	}
	public function list_pending_applications(){
		$query = $this->db->get_where('applications', array('status' => 'P'));
        return $query;
	}
	public function list_processing_applications(){
		$query = $this->db->get_where('applications', array('status' => 'Pr'));
        return $query;
	}
	public function count_pending(){
		$query = $this->db->get_where('applications', array('status' => 'P'));
		return $query->num_rows();
	}
	public function count_processing(){
		$query = $this->db->get_where('applications', array('status' => 'Pr'));
		return $query->num_rows();
	}
	public function recent_count_normal(){
		$query = $this->db->get_where('applications', array('view'=>'0','processingtime'=>'1'));
		return $query->num_rows();
	}
	public function recent_count_immediate(){
		$query = $this->db->get_where('applications', array('view'=>'0','processingtime'=>'2'));
		return $query->num_rows();
	}
	public function recent_count_urgent(){
		$query = $this->db->get_where('applications', array('view'=>'0','processingtime'=>'3'));
		return $query->num_rows();
	}
	public function count_completed(){
		$query = $this->db->get_where('applications', array('status' => 'C'));
		return $query->num_rows();
	}
	public function get_application($id){
		$query = $this->db->get_where('applications', array('id' => $id));
		return $query->row();
	}
	public function get_lockuser($userid){
		$query = $this->db->get_where('users', array('id' => $userid));
		return $query->result();
	}
	public function get_visadocs($id){
		$query = $this->db->get_where('visa_uploads', array('id' => $id));
		return $query->result();
	}
	public function get_visa($id){
		$query = $this->db->get_where('visa_uploads', array('uniqueid' => $id));
		return $query->row();
	}
	public function get_visadocs_count($id){
		$query = $this->db->get_where('visa_uploads', array('id' => $id));
		return $query->num_rows();
	}
	public function get_messages($id){
		$query = $this->db->get_where('visa_contacts', array('userid' => $id));
		return $query->result();
	}
	public function lock_application($id,$userid){
		$data = array(
               'locked' => '1',
               'lockUser' => $userid
            );
			$this->db->where('id', $id);
			$this->db->update('applications', $data);
		
	}
	public function unlock_application($id,$userid){
			$data = array(
               'locked' => '0',
               'lockUser' => ''
            );
			$this->db->where('id', $id);
			$this->db->update('applications', $data);
		
	}
	public function upload($data){
		if($this->db->insert('visa_uploads', $data))
		return true;
		else 
		return false;
	}
	public function update($id,$data){
	$this->db->where('id', $id);
	if($this->db->update('applications', $data)){
		return true;
		}else{
			return false;
		};
	}
	public function delete($id){
	$this->db->where('id', $id);
	if($this->db->delete('applications')){
		return true;
		}else{
			return false;
		};
	}
	public function insert_message($data){
		if($this->db->insert('visa_contacts', $data))
		return true;
		else 
		return false;
	}
	public function delete_visa($id){
	$this->db->where('uniqueid', $id);
	if($this->db->delete('visa_uploads')){
		return true;
		}else{
			return false;
		};
	}
	public function my_applications($limit,$start,$id){
		$this->db->limit($limit, $start);
		 $this->db->select('a.*,u.username');
	     $this->db->from('applications a');
		 $this->db->join('users u', 'u.id = a.lockUser', 'left');
		 $this->db->where('a.lockUser',$id);
		 $this->db->order_by('a.status','desc');
		 $query = $this->db->get();
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function count_myapps($id){
		$this->db->select('a.*,u.username');
	     $this->db->from('applications a');
		 $this->db->join('users u', 'u.id = a.lockUser', 'left');
		 $this->db->where('a.lockUser',$id);
		 $this->db->order_by('a.status','desc');
		 $query = $this->db->get();
		return $query->num_rows();
	}
	public function myapps_process($id){
		$this->db->select('*');
		$this->db->from('applications');
		$this->db->where('lockUser',$id);
		$this->db->where('status','Pr');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
}
