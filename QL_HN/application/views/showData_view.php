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
	<?php require 'header_con.php'; ?>
	<div class="container">
			<h3 class="text-xs-center">WELCOME TO JOINCO</h3>
			<hr>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($dulieudata as $value): ?>
				<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"> Tên hội nghị:<?= $value['tenHN'] ?></h4>
						<p class="card-text"> <?= $value['mota'] ?></p>
						<p class="card-text">Địa điểm: <?= $value['diadiem'] ?></p>
						<p class="card-text">Địa chỉ: <?= $value['thoigian'] ?></p>
						<a href="#" class="btn btn-primary"><i class="fa fa-info"></i></a>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</body>
</html>