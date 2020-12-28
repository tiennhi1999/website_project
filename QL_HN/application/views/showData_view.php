<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trung tâm quản lý hội nghị</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	
	 <header>
	<nav class="navbar navbar-dark ">
	<div class="container">
			<div class="row">
				<div class="col-sm-12">
				<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
				&#9776;
				</button>
				<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<div class="logo"><a href="<?php echo base_url(); ?>showData">JoinCo.vn</a></div>
				<ul class="nav navbar-nav thanhmenu">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url(); ?>showData"><i class="fa fa-home"></i> HOME <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>Them_HN">ADD CON</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>ShowAdd">PLACE</a>
					</li>
				</ul>
				</div>
				</div>
			</div>
		</div>
	</nav>	
	</header>

	 	<div class="banner-area">
	 		<div class="text-xs-center">
			<h3>WELCOME TO JOINCO</h3>
			</div>
			
		<hr>
	 	
	 	</div>
	<div class="container pt-3">
		<div class="text-xs-center">
			<h2>DANH SÁCH HỘI NGHỊ</h2>
			<hr>
		</div>
		<div class="row">
			<?php foreach ($manghoinghi as $key => $value): ?>
 				<div class="col-sm-4">
	 			<div class="row">
	 				<img class="card-img-top img-fluid" src="<?php echo $value['anh'] ?>" alt="Card image cap">
	 				<div class="card-block">
	 					<h4 class="card-title ten">Tên: <?php echo $value['tenHN'] ?> </h4>
	 					<p class="card-text sdt">Chi tiết:<?php echo $value['motachitiet'] ?></p>
	 					<p class="card-text fb">Mã địa điểm : <?php echo $value['diadiem'] ?></p>
	 					<p class="card-text fb">Thời gian : <?php echo $value['thoigian'] ?></p>

	 					<p class="card-text editns">
	 						<small><a  href="<?php echo base_url(); ?>showData/xemChiTiet/<?php echo $value['id'] ?>" class="btn btn-warning">Xem chi tiết <i class ='fa fa-info'></i></a></small> 
	 					</p>
	 					
	 					<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	 				</div>
	 			</div>
 			    </div>
 			<?php endforeach ?>
		</div>
	</div>
</body>
</html>