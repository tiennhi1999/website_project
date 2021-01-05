<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Địa điểm tổ chức hội nghị</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<?php require 'header_ad.php'; ?> 
	<div class="container">
		<br>
		<h3 class="text-xs-center">Địa điểm tổ chức hội nghị</h3>
	</div>
	<div class="container">
		<hr>
		<div class="row">
			<?php foreach ($dulieudd as $value): ?>
			<div class="col-sm-6">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title"><?= $value['TENDD'] ?></h4>
					<p class="card-text">Địa chỉ: <?= $value['DIACHI'] ?></p>
					<p class="card-text">Sức chứa: <?= $value['SUCCHUA'] ?></p>
				</div>
			</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<div class="container">
		<hr>
		<a href="<?php echo base_url(); ?>Admin/ThemDD" class="btn btn-primary"><i class="fa fa-plus"></i></a>
	</div>
</body>
</html>