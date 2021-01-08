<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function dangnhap($email, $matkhau)
	{
	    $this->db->select('*');
	    $this->db->where('user_email', $email);
	    $this->db->where('user_pwd', $matkhau);
	    $dl = $this->db->get('user_');
	    $dl = $dl->result_array();
	    if(!empty($dl))
	    {
	    	
	   		$dl = $dl[0]['level'];
	   
	    }
	    else
	    {
	     $dl = '';
	    }
	    return $dl;
	}
	public function getChan($email, $matkhau)
		{
		    $this->db->select('*');
		    $this->db->where('user_email', $email);
		    $this->db->where('user_pwd', $matkhau);
		    $dl = $this->db->get('user_');
		    $dl = $dl->result_array();
		    if(!empty($dl))
		    {
		    	
		   		$dl = $dl[0]['CHAN'];
		   
		    }
		    else
		    {
		     $dl = '';
		    }
		    return $dl;
		}

}	

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */