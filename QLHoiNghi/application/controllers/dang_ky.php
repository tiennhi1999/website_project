<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dang_ky extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('signup');
	}
	public function XacNhan()
	{
	    
	}

}

/* End of file dang_ky.php */
/* Location: ./application/controllers/dang_ky.php */