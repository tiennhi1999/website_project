<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HN_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function loadDanhMuc()
	{
	    $this->db->select('*');
	    $dulieu = $this->db->get('danhmuc');
	    $dulieu = $dulieu->result_array();
	    return $dulieu;
	}
	public function insertDanhMuc($tendanhmuc)
	{
	   $tendanhmuc = array('tendanhmuc' => $tendanhmuc );
	   return $this->db->insert('danhmuc', $tendanhmuc);
	}
	public function delById($id)
	{
	    $this->db->where('id', $id);
	    $this->db->delete('danhmuc');
	}
	public function updateById($id, $tendanhmuc)
	{
		$dl = array('id' => $id, 'tendanhmuc' => $tendanhmuc );
	    $this->db->where('id', $id);
	   return $this->db->update('danhmuc', $dl);
	}
	public function loadDiaDiem()
	{
	    $this->db->select('*');
	    $dl = $this->db->get('diadiemtc');
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function insertDD($tendd, $diachidd, $succhua)
	{
	    $dulieu = array('tendd' => $tendd, 'diachi' => $diachidd, 'succhua' => $succhua);
	    return $this->db->insert('diadiemtc', $dulieu);
	}
	public function loadDanhSachTin()
	{
	    $this->db->select('*');
	    $dl = $this->db->get('hoi_nghi');
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function loadDanhSach2Tin()
	{
	    $this->db->select('*');
	    $dl = $this->db->get('hoi_nghi', 2, 0);
	    	
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function insertHN($madd, $iddanhmuc,$tenhn,$motang, $mota, $hinhanh, $thoigian)
	{
	    $dl = array('madd' => $madd, 
	    'iddanhmuc' => $iddanhmuc, 
	    'tenhn' => $tenhn, 
	    'motang' => $motang, 
	    'mota' => $mota, 
	    'hinhanh' => $hinhanh, 
	    'thoigian' => $thoigian, 
	);
	    $this->db->insert('hoi_nghi', $dl);
	    return $this->db->insert_id();
	}
	public function getTinById($id)
	{
	    $this->db->select('*');
	    $this->db->from('hoi_nghi');
	    $this->db->join('danhmuc', 'hoi_nghi.iddanhmuc = danhmuc.id', 'left');
	    $this->db->join('diadiemtc', 'diadiemtc.madd = hoi_nghi.madd', 'left');
	    $this->db->where('hoi_nghi.mahn', $id);
	    $dl = $this->db->get();
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function updateHN($mahn, $madd, $iddanhmuc,$tenhn,$motang, $mota, $hinhanh, $thoigian)
	{
	     $dl = array('mahn' => $mahn,
	     	'madd' => $madd, 
	    'iddanhmuc' => $iddanhmuc, 
	    'tenhn' => $tenhn, 
	    'motang' => $motang, 
	    'mota' => $mota, 
	    'hinhanh' => $hinhanh, 
	    'thoigian' => $thoigian, 
	);
	     $this->db->where('mahn', $mahn);
	     return $this->db->update('hoi_nghi', $dl);
	}
}

/* End of file HN_model.php */
/* Location: ./application/models/HN_model.php */