<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class signup_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertUser($ten, $username, $password, $sdt, $email)
	{
	    $dl = array('tenuser' => $ten, 'username' => $username, 'user_pwd' => $password, 'user_email' => $email, 'sdt' => $sdt);
	    $this->db->insert('user_', $dl);
	    return $this->db->insert_id();
	}
}

/* End of file signup_model.php */
/* Location: ./application/models/signup_model.php */