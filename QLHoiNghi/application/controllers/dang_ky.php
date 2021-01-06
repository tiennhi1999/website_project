<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dang_ky extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('signup_model');
	}

	public function index()
	{
		$this->load->view('signup');
	}
	public function XacNhan()
	{
	    $ten = $this->input->post('hoten');
	    $username = $this->input->post('username');
	    $password = $this->input->post('password');
	    $sdt = $this->input->post('sdt');
	    $email = $this->input->post('email');

	    if($this->signup_model->insertUser($ten, $username, $password, $sdt, $email))
	    {
	    	$this->load->view('thanhcong4');
	    }
	}

}

/* End of file dang_ky.php */
/* Location: ./application/controllers/dang_ky.php */