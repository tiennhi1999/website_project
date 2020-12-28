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
		$dulieu = array('manghoinghi' => $dulieu);
		$this->load->view('showData_view', $dulieu, FALSE);
	}
	public function xemChiTiet($idnhan)	
	{
	    $this->load->model('showData_model');
	    $dulieu = $this->showData_model->getDataById($idnhan);
	    $dulieu = array('dulieunhan' => $dulieu);
	    $this->load->view('chiTietHN', $dulieu, FALSE);
	}


}

/* End of file showData.php */
/* Location: ./application/controllers/showData.php */