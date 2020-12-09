<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Them_HN extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('themHN');
	}
	public function insertHN()
	{
		$ten = $this->input->post('tenHN');
		$mota = $this->input->post('mota');
		$dd = $this->input->post('diadiem');
		$thoigian = $this->input->post('thoigian');


		//truyen du lieu vao model
		$this->load->model('themHN_model');
		if($this->themHN_model->insert($ten, $mota, $dd, $thoigian))
		{
			$this->load->view('themthanhcong');
		}
		else {
			echo "that bai";
		}
	}

}

/* End of file Them_HN.php */
/* Location: ./application/controllers/Them_HN.php */