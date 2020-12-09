<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowAdd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('showAdd_model');
		$dulieu = $this->showAdd_model->getdatabase();
		$dulieu = array('dulieumang' => $dulieu);
		$this->load->view('showAdd_view', $dulieu, FALSE);
	}

}

/* End of file ShowAdd.php */
/* Location: ./application/controllers/ShowAdd.php */