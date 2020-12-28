<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Them_HN extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('themHN');
	}

	public function insertHN()
	{
		
		///upload anh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anh"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["anh"]["size"] > 50000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		   // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		

		$ten = $this->input->post('tenHN');
		$mota = $this->input->post('mota');
		$motachitiet = $this->input->post('motachitiet');
		$anh = base_url().'uploads/'.basename($_FILES["anh"]["name"]);
		$dd = $this->input->post('diadiem');
		$thoigian = $this->input->post('thoigian');
		
		//truyen du lieu vao model
		$this->load->model('themHN_model');
		if($this->themHN_model->insert($ten, $mota, $motachitiet, $anh, $dd, $thoigian))
		{
			$this->load->view('themthanhcong');
		}
		else {
			echo "that bai";
		}
	}
}

/* End of file Them_HN.php */
/* Location: ./application/controllers/Them_HN.php */