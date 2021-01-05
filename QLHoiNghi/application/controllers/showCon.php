<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showCon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HN_model');
	}

	public function index()
	{
		$dl = $this->HN_model->loadDanhSach2Tin();
		$dl = array('dulieutin' => $dl);
		$this->load->view('homepage', $dl);
	}
}

/* End of file showCon.php */
/* Location: ./application/controllers/showCon.php */