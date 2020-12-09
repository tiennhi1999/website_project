<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Them_dd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('themDD');
	}
	public function themDD_con()
	{
		$ma = $this->input->post('madd');
		$ten = $this->input->post('tendd');
		$dc = $this->input->post('diachidd');
		$sc = $this->input->post('succhua');

		//truyen vao model
		$this->load->model('themDD_model');
		$this->themDD_model->themdd($ma, $ten, $dc, $sc);
		$this->load->view('themddtc');
	}

}

/* End of file Them_dd.php */
/* Location: ./application/controllers/Them_dd.php */