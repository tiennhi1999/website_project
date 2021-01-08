<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangKiTG extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ThamGia_model');
		if(!$this->session->has_userdata('email'))
		{
			redirect('Login','refresh');
		}
	}

	public function Them($idhn)
	{
		$email = $this->session->userdata('email');
		$iduser = $this->ThamGia_model->loadID($email);

		if ($this->ThamGia_model->insertTG($iduser, $idhn)) {
			$this->load->view('dangKiTC');
		}
	}
	public function Huy($idhn)
		{
			$email = $this->session->userdata('email');
			$iduser = $this->ThamGia_model->loadID($email);


		if ($this->ThamGia_model->deleteTG($iduser, $idhn)) {
			$this->load->view('dangKiTC');
			}
		}
		public function duyet($idds)
		{
		   $this->ThamGia_model->updateTG($idds);
		}

}
