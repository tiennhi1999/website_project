<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showAdd_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getdatabase()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('diadiemhn');

		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

}

/* End of file showAdd_model.php */
/* Location: ./application/models/showAdd_model.php */