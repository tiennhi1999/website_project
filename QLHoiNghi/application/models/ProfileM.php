<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileM extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function loadInfo($id)
	{
	   $this->db->select('*');
	   $this->db->where('ma_user', $id);
	   $dl = $this->db->get('user_');
	   $dl = $dl->result_array();
	   return $dl;
	}
	public function updateUser($mauser, $ten, $username, $password, $sdt, $email)
	{
	    $dl = array('ma_user' =>$mauser , 'tenuser' => $ten, 'username' => $username, 'user_pwd' => $password, 'user_email' => $email, 'sdt' => $sdt);
	    $this->db->where('ma_user', $mauser);
	    return $this->db->update('user_', $dl);
	    
	}

}

/* End of file ProfileM.php */
/* Location: ./application/models/ProfileM.php */