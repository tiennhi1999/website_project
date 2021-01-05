<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class 	HoiNghi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HN_model');
	}

	public function index()
	{
		
	}
	public function themhoinghi()
	{
	    $target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check file size
		if ($_FILES["hinhanh"]["size"] > 50000000) {
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
		  if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
		   // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$hinhanh = base_url() .'/uploads/'. basename( $_FILES["hinhanh"]["name"]) ; 
		$tenhn = $this->input->post('tenhn');
		$madd = $this->input->post('madd');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$motang = $this->input->post('motang');
		$mota = $this->input->post('mota');
		$thoigian = $this->input->post('thoigian');
		if($this->HN_model->insertHN($madd, $iddanhmuc,$tenhn,$motang, $mota, $hinhanh, $thoigian))
		{
			$this->load->view('thanhcong');
		}
		
	}
	public function QuanlyTin()
	{
	   	$dl1 = $this->HN_model->loadDanhMuc();
		$dl2 = $this->HN_model->loadDanhSachTin();
		$dl3 = $this->HN_model->loadDiaDiem();
		$dulieu = array('dulieudanhmuc' =>  $dl1,  
						'dulieutin' =>  $dl2,
						'dulieudd' =>  $dl3
					);
	    $this->load->view('QuanlyTin', $dulieu);	
	}
	public function danhMucHoiNghi()
	{
		$dulieu = $this->HN_model->loadDanhMuc();
		$dulieu = array('dulieu' => $dulieu );
	    $this->load->view('danhmucHN', $dulieu);
	}
	public function themdanhmuc()
	{
	    $tendanhmuc =  $this->input->post('tendanhmuc');
	    $this->load->model('HN_model');
	    if($this->HN_model->insertDanhMuc($tendanhmuc))
	    {
	    	echo 'thanh cong';
	    }   
	}
	public function xoaDanhMuc($id)
	{
	    $this->HN_model->delById($id);
	}
	public function addJquery()
	{
	   $tendanhmuc =  $this->input->post('tendanhmuc'); 
	    $this->HN_model->insertDanhMuc($tendanhmuc);
	}
	public function UpdateDulieu()
	{
		$id = $this->input->post('id');
		$tendanhmuc = $this->input->post('tendanhmuc');
	    if($this->HN_model->updateById($id, $tendanhmuc))
	    {
	    	$this->load->view('thanhcong');
	    }
	}
	public function DiaDiemToChuc()
	{
		$dl = $this->HN_model->loadDiaDiem();
		$dl = array('dulieudd' => $dl );

		$this->load->view('diadiem', $dl, FALSE);
	}
	public function ThemDD()
	{
	    $this->load->view('ThemDD_view');
	}
	public function themDDMoi()
	{
	    $tendd = $this->input->post('tendd');
	    $diachidd = $this->input->post('diachidd');
	    $succhua = $this->input->post('succhua');


	    if($this->HN_model->insertDD($tendd, $diachidd, $succhua))
	    {
	    	$this->load->view('thanhcong');
	    }
	}
	public function suaHoiNghi($idnhan)
	{
		$dl1 = $this->HN_model->loadDanhMuc();
	    $dl2 = $this->HN_model->getTinById($idnhan);
	    $dl3 = $this->HN_model->loadDiaDiem();
	   $dulieu = array('dulieudanhmuc' =>  $dl1,  
						'dulieusua' =>  $dl2,
						'dulieudd' =>  $dl3
					);
	    $this->load->view('sua_HN', $dulieu, FALSE);

	}
	public function luutindasua()
	{
	 $anhtincu = $this->input->post('anhtincu');
    $anhtin = $_FILES['hinhanh']['name'];
    if(empty($anhtin))
    {
    	$hinhanh = $anhtincu;
    }
    else
    {
	    $target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check file size
		if ($_FILES["hinhanh"]["size"] > 50000000) {
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
		  if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
		   // echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$hinhanh = base_url() .'/uploads/'. basename( $_FILES["hinhanh"]["name"]) ; 
	}
		$mahn = $this->input->post('mahn');
		$tenhn = $this->input->post('tenhn');
		$madd = $this->input->post('madd');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$motang = $this->input->post('motang');
		$mota = $this->input->post('mota');
		$thoigian = $this->input->post('thoigian');
		if($this->HN_model->updateHN($mahn, $madd, $iddanhmuc,$tenhn,$motang, $mota, $hinhanh, $thoigian))
		{
			$this->load->view('thanhcong2');
		}
		
	}

}

/* End of file HoiNghi.php */
/* Location: ./application/controllers/HoiNghi.php */