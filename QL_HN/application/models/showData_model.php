<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getdatabase()
	{
		$this->db->select('*');
		$ketqua = $this->db->get('hoinghi');

		$ketqua = $ketqua->result_array();
		return $ketqua;
	}
	public function getDataByID($idnhan)
	{
	    $this->db->select('*');
	    $this->db->where('id', $idnhan);

	    $dulieu = $this->db->get('hoinghi');
	    $dulieu = $dulieu->result_array();
	    return $dulieu;
	}
}

/* End of file showData_model.php */
/* Location: ./application/models/showData_model.php */