<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>ShowAdd">SIGN UP</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>ShowAdd">SIGN IN</a>
					</li>
				</ul>
				</div>
				</div>
			</div>
		</div>
	</nav>	
	</header>
	<div class="row">
		<div class="banner-area">
	 		<div class="text-xs-center">
			<h3>WELCOME TO JOINCO</h3>
			</div>	
			<hr>	
		</div>
	</div>
	<div class="jumbotron text-xs-center">
		<h1>Chào mừng đến trang web quan lý hội nghị!</h1>
		<p>Đây là một trang web để phục vụ cho việc quản lý tổ chức và tham gia hội nghị</p>
		<hr class="m-y-md">
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($dulieutin as $key => $value): ?>
				
			<?php endforeach ?>
			<div class="col-sm-6">
				<div class="card-deck">
					<div class="card">
						<img class="card-img-top img-fluid" src="<?php echo $value['HINHANH'] ?>" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title"><?php echo $value['TENHN'] ?></h4>
							<p class="card-text"><?php echo $value['MOTANG'] ?></p>
							<p class="card-text text-xs-center"><small class="text-muted ">Ngày diễn ra:  <?php echo $value['THOIGIAN'] ?></small></p>
						</div>
					</div>
				</div>
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