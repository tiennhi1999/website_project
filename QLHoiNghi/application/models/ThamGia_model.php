<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThamGia_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function loadID($email)
	{
	    $this->db->select('ma_user');
	    $this->db->where('user_email', $email);
	    $dl = $this->db->get('user_');
	    $dl = $dl->result_array();
	    if (!empty($dl)) {
	    	$dl = $dl[0]['ma_user'];
	    }
	    else
	    {
	    	$dl = '';
	    }
	    return $dl;

	}
	public function insertTG($iduser, $idhn)
	{
	    $dl = array('ma_user' => $iduser,'hn_id' => $idhn);
	    $this->db->insert('ds_dangki', $dl);
	    return $this->db->insert_id();
	}
	public function deleteTG($iduser, $idhn)
	{
	   $this->db->where('ma_user', $iduser);
		   $this->db->where('hn_id', $idhn);
		   return $this->db->delete('ds_dangki');

	}
	public function updateTG($idds)
	{
	    $this->db->where('ma_dsdk', $idds);
	    $dl = array('duyet' => 1 );
	    return $this->db->update('ds_dangki', $dl);
	}

}

/* End of file ThamGia_model.php */
/* Location: ./application/models/ThamGia_model.php */