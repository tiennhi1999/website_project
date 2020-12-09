<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class themDD_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function themdd($m, $t, $d, $s)
	{
		
		$dulieua = array('id_dd'=> $m, 'tendd' => $t, 'diachi' => $d, 'succhua' => $s );
		$this->db->insert('diadiemhn', $dulieua);

		return $this->db->insert_id();
	}
}

/* End of file themDD_model.php */
/* Location: ./application/models/themDD_model.php */