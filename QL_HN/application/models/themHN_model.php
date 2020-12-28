<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class themHN_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insert($ten, $mota, $motachitiet, $anh, $dd, $tg)
	{
		$dulieu =  array('tenHN' => $ten,  'mota' => $mota, 'motachitiet' => $motachitiet, 'anh' => $anh, 'diadiem' => $dd, 'thoigian' => $tg);
		$this->db->insert('hoinghi', $dulieu);

		return $this->db->insert_id();
	}

}

/* End of file themHN_model.php */
/* Location: ./application/models/themHN_model.php */