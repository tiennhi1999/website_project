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
		$dl = array('dulieutin' => $dl);
		$this->load->view('Hoi_nghi', $dl);
	}

}

/* End of file Hoinghi.php */
/* Location: ./application/controllers/Hoinghi.php */