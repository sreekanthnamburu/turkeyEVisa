<?php
class Application_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_country($id=FALSE) {
        if ($id === FALSE)
        {
            $query = $this->db->get("visa_country");
            return $query->result_array();
        }
        $query = $this->db->get_where('visa_country', array('id' => $id));
        return $query->row_array();
    }
    public function address_verify($id) {
        $now = date("Y-m-d H:i:s");
        $data = array(
                    'active' => 1,
                    'approveddate' => $now,
                );

        $this->db->where('invoiceid', $id);
        if ($this->db->update('applications', $data))
            return true;
        else
            return false;
    }
    public function download_evisa($id=FALSE) {
        if ($id === FALSE)
        {
            return "nodata";
        }
        $query = $this->db->get_where('upload_images', array('invoiceid' => $id));
        return $query->row_array();
    }
    public function check_status($app=FALSE) {
        if ($app === FALSE)
        {
			$data['array']='nodata';
            return $data;
        }
        $query = $this->db->get_where('applications', array('invoiceid' => $app));
		//echo $this->db->num_rows;
		//if($this->db->num_rows > 0)
        return $query->row_array();
		//else 
		//return "nodata";
    }
	public function get_application($app=FALSE) {
        if ($app === FALSE)
        {
            return "nodata";
        }
        $query = $this->db->get_where('applications', array('invoiceid' => $app));
        return $query->row_array();
    }
	public function save_payment($data=FALSE) {
        $query =$this->db->insert('visa_payments', $data);
        return $this->db->insert_id();
    }
	public function update_application($data,$invoiceid) {
	$this->db->where('invoiceid', $invoiceid);
        $query =$this->db->update('applications', $data);
        return TRUE;
    }

}