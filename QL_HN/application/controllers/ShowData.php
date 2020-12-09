<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('showData_model');
		$dulieu = $this->showData_model->getdatabase();
		$dulieu = array('dulieudata' => $dulieu);
		$this->load->view('showData_view', $dulieu, FALSE);
	}


}

/* End of file showData.php */
/* Location: ./application/controllers/showData.php */