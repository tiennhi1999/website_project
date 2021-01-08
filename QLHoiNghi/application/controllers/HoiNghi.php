<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoinghi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HN_model');
		$this->load->model('ThamGia_model');
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
		$email = $this->session->userdata('email');
		$iduser = $this->ThamGia_model->loadID($email);
		$kiemtra = $this->HN_model->kiemtradangki($iduser, $idnhan);
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2, 'diadiem' => $dl3, 'kiemtra' => $kiemtra);
		$this->load->view('chiTietHN', $dulieu);
	}
	public function danhmuc($iddanhmuc)
	{
	    $dl = $this->HN_model->loadTinDanhMuc($iddanhmuc);
		$dl2 = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2);
		$this->load->view('Hoi_nghi', $dulieu);
	}
	public function hoiNghiCuaToi()
	{
	    $email = $this->session->userdata('email');
		$iduser = $this->ThamGia_model->loadID($email);
		$dl = $this->HN_model->loadHNCT($iduser);
		$dl2 = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2);
		$this->load->view('HoinghiCT', $dulieu);
	}
	public function dangDuyet()
	{
	    $email = $this->session->userdata('email');
		$iduser = $this->ThamGia_model->loadID($email);
		$dl = $this->HN_model->loadHNCTChuaDuyet($iduser);
		$dl2 = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2);
		$this->load->view('HoinghiCT', $dulieu);
	}
	public function daDuyet()
	{
	    $email = $this->session->userdata('email');
		$iduser = $this->ThamGia_model->loadID($email);
		$dl = $this->HN_model->loadHNCTDaDuyet($iduser);
		$dl2 = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2);
		$this->load->view('HoinghiCT', $dulieu);
	}
	public function timKiem()
	{
	    $tieude = $this->input->post('tieude');
	    $dl = $this->HN_model->searchTen($tieude);
	    $dl2 = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieutin' => $dl, 'cacdanhmuc' => $dl2);
		$this->load->view('Hoi_nghi', $dulieu);
	}
	
}

/* End of file Hoinghi.php */
/* Location: ./application/controllers/Hoinghi.php */