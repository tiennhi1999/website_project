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
	public function loadByID($id)
	{
	    $this->db->select('*');
	    $this->db->where('mahn', $id);
	    $dl = $this->db->get('hoi_nghi');
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function loadDiaDiemTheoHN($id)
	{
	    $this->db->select('*');
	    $this->db->from('diadiemtc');
	    $this->db->join('hoi_nghi', 'hoi_nghi.madd = diadiemtc.madd', 'left');
	     $this->db->where('hoi_nghi.mahn', $id);
	    $dl = $this->db->get();

	    $dl = $dl->result_array();
	    return $dl;
	}
	public function kiemtrangay($id)
	{
	    $this->db->select('*');
	    $this->db->where('mahn', $id);
	    $date = date("Y-m-d H:i:s");
	    $this->db->where('hoi_nghi.thoigian <=', $date);
	    $dl = $this->db->get('hoi_nghi');
	    $dl = $dl->result_array();
	    if (!empty($dl)) {
	    	return 1;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	public function kiemtradangki($id, $idhn)
	{
	    $this->db->select('*');
	    $this->db->where('ma_user', $id);
	    $this->db->where('hn_id', $idhn);
	    $dl =  $this->db->get('ds_dangki');
	    $dl = $dl->result_array();
    	if ($this->kiemtrangay($idhn) == 1) {
    			return 0;
    	}	
	    if (empty($dl)) {
	    	return 1;
	    }
	    else
	    {
	    	return 2;
	    }	
	}
	public function loadTinDanhMuc($iddanhmuc)
	{
	    $this->db->select('*');
	    $this->db->from('hoi_nghi');
	    $this->db->join('danhmuc', 'hoi_nghi.iddanhmuc = danhmuc.id', 'left');
	    $this->db->where('danhmuc.id', $iddanhmuc);
	    $dl = $this->db->get();
	    $dl = $dl->result_array();
	    return $dl;
	}	
	public function loadHNCT($id)
	{
	    $this->db->select('*');
	    $this->db->from('hoi_nghi');
	    $this->db->join('ds_dangki', 'ds_dangki.hn_id = hoi_nghi.mahn', 'left');
	    $this->db->where('ma_user', $id);
	    $dl = $this->db->get();
	    $dl = $dl->result_array();
	    return $dl;

	}
	public function loadHNCTChuaDuyet($id)
	{
	    $this->db->select('*');
	    $this->db->from('hoi_nghi');
	    $this->db->join('ds_dangki', 'ds_dangki.hn_id = hoi_nghi.mahn', 'left');
	    $this->db->where('ma_user', $id);
	    $this->db->where('duyet', 0);
	    $dl = $this->db->get();
	    $dl = $dl->result_array();
	    return $dl;

	}
	public function loadHNCTDaDuyet($id)
	{
	    $this->db->select('*');
	    $this->db->from('hoi_nghi');
	    $this->db->join('ds_dangki', 'ds_dangki.hn_id = hoi_nghi.mahn', 'left');
	    $this->db->where('duyet', 1);
	    $dl = $this->db->get();
	    $dl = $dl->result_array();
	    return $dl;

	}
	public function searchTen($ten)
	{
	    $this->db->like('tenhn', $ten, 'BOTH');
	    $this->db->order_by('mahn', 'desc');
	    $dl = $this->db->get('hoi_nghi');
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function loadUserByHN($idhn)
	{
	    $this->db->select('*');
	    $this->db->from('ds_dangki');
	    $this->db->join('user_', 'ds_dangki.ma_user = user_.ma_user', 'left');
	    $this->db->where('hn_id', $idhn);
	    $dl = $this->db->get();
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function loadUsers()
	{
	    $this->db->select('*');
	    $this->db->where('level', 0);
	    $dl = $this->db->get('user_');
	    $dl = $dl->result_array();
	    return $dl;
	}
	public function updateChan($id)
	{
	    $this->db->where('ma_user', $id);
	    $dl = array('chan' => 1 );
	    return $this->db->update('user_', $dl);
	}
	public function updateBoChan($id)
	{
	    $this->db->where('ma_user', $id);
	    $dl = array('chan' => 0 );
	    return $this->db->update('user_', $dl);
	}
	
}

/* End of file HN_model.php */
/* Location: ./application/models/HN_model.php */