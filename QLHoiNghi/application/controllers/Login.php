<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{

		$this->load->view('login');
		
	}
	public function XacNhan()
	{
	    $email = $this->input->post('email');
	    $matkhau = $this->input->post('matkhau');
	    $loai = $this->Login_model->dangnhap($email, $matkhau);
	    if($loai != null)
	    {
	    	$dulieu = array('email' => $email, 'matkhau' => $matkhau, 'loai' => $loai );
	    	$this->session->set_userdata($dulieu);
	    	if($loai == 0)
	    	{
	    		redirect('Trangchu','refresh');
	    	}
	    	else
	    	{
	    		redirect('Admin','refresh');
	    	}
	    	
	    }
	    else
	    {
	    	redirect('Dangnhap','refresh');
	    }
	}
	public function dangxuat()
	{
	    $dulieu = array('email', 'matkhau', 'loai');
	    $this->session->unset_userdata($dulieu);
	    redirect('Trangchu','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */