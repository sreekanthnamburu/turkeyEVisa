<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
	}
	public function get_allcountries($limit,$start){
		 $this->db->limit($limit, $start);
		$query = $this->db->get('visa_country'); 
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->result();
	}
	public function count_allcountries(){
		$query = $this->db->get_where('visa_country');
		return $query->num_rows();
	}
	public function delete($id){
	$this->db->where('id', $id);
	if($this->db->delete('visa_country')){
		return true;
		}else{
			return false;
		};
	}
}