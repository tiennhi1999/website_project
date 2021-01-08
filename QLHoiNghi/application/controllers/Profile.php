<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('ProfileM');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$this->load->model('ThamGia_model');
		$iduser = $this->ThamGia_model->loadID($email);

		$dl = $this->ProfileM->loadInfo($iduser);
		$dl = array('thongtin' => $dl );
		$this->load->view('profile_view', $dl);
	}
	public function suaThongTin()
	{
		$mauser = $this->input->post('ma_user');
	    $tenuser = $this->input->post('tenuser');
	    $username = $this->input->post('username');
	    $passw = $this->input->post('passw');
	    $email = $this->input->post('email');
	    $sdt = $this->input->post('sdt');
	    if ($this->ProfileM->updateUser($mauser, $tenuser, $username, $passw, $sdt, $email)) {
	    	$this->load->view('dangKiTC');
	    }

	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */