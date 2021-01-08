<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang chủ</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
 	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	 <header>
	<?php if($this->session->has_userdata('email'))
	{
		if ($this->session->userdata('loai') == 1) {
			require 'header_ad2.php';
		}
		else
		{
			require 'header_user.php';
		}
	
	}
	else
	{
		require 'header_cus.php';
	} ?>
	</header>
	<div class="row">
		<div class="banner-area">
	 		<div class="text-xs-center">
			<h3>WELCOME TO JOINCO</h3>
			</div>	
			<hr>	
		</div>
	</div>
	<div class="jumbotron text-xs-center" style="color: #2c3e50">
		<h1     >Chào mừng đến trang web quản lý hội nghị!</h1>
		<p>Đây là một trang web để phục vụ cho việc quản lý tổ chức và tham gia hội nghị</p>
		<hr class="m-y-md">
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($dulieutin as $key => $value): ?>
				
			
			<div class="col-sm-6">
				<div class="card-deck">
					<div class="card">
						<a href="<?php echo base_url(); ?>HoiNghi/chiTietHN/<?php echo $value['MAHN'] ?>"><img class="card-img-top img-fluid rounded" src="<?php echo $value['HINHANH'] ?>" alt="Card image cap"></a>
						<div class="card-body">
							<a class="tieudetin" href="<?php echo base_url(); ?>HoiNghi/chiTietHN/<?php echo $value['MAHN'] ?>"><h4 class="card-title"><?php echo $value['TENHN'] ?></h4></a>
							<p class="card-text"><?php echo $value['MOTANG'] ?></p>
							<p class="card-text text-xs-center"><small class="text-muted ">Ngày diễn ra:  <?php echo $value['THOIGIAN'] ?></small></p>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
		<hr>
			<div class="text-xs-center">
				<br>
				<a href="<?= base_url() ?>HoiNghi" class="btn">Xem hết các hội nghị... </i>
				</a>
				<br>
				<br>
			</div>
			

			
	</div>
	</div>
	
</body>
<footer class="bg-black py-5">
		<div class="container">
			<div class="text-xs-center">
				<a href="https://www.facebook.com/au.ou.9889"><i class="fa fa-facebook"></i></a>
				<a href="https://www.facebook.com/au.ou.9889"> <i class="fa fa-instagram"></i></i></a>
			</div>
			<div class="small text-xs-center text-muted">Nhom 8 @ </div>
		</div>
	</footer>
</html>