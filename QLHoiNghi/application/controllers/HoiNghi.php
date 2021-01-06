<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoinghi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HN_model');
	}

	public function index()
	{
		$dl = $this->HN_model->loadDanhSachTin();
		$dl2 = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2);
		$this->load->view('Hoi_nghi', $dulieu);
	}
	public function chiTietHN($idnhan)
	{
	    $dl = $this->HN_model->loadByID($idnhan);
		$dl2 = $this->HN_model->loadDanhMuc();
		$dl3 = $this->HN_model->loadDiaDiemTheoHN($idnhan);

		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2, 'diadiem' => $dl3);
		$this->load->view('chiTietHN', $dulieu);
	}


}

/* End of file Hoinghi.php */
/* Location: ./application/controllers/Hoinghi.php */