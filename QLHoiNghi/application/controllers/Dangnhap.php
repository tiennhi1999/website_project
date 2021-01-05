<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dangnhap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('dang_nhap');
	}

}

/* End of file Dang-nhap.php */
/* Location: ./application/controllers/Dang-nhap.php */