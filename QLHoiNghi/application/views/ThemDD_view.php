<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm địa điểm</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<?php require 'header_con.php'; ?>
	<div class="jumbotron text-xs-center">
		<h1 class="display-5">Thêm địa điểm</h1>
		<p class="lead">Thêm một địa điểm tổ chức hội nghị mới</p>
		<hr class="m-y-md">
		
	</div>
	<div class="container">
		<div class="col-sm-8 push-sm-2">
			<form action="<?php echo base_url(); ?>HoiNghi/themDDMoi" method="POST" enctype="multidata/form-data">
			<fieldset class="form-group">
				<label for="tendd">Tên địa điểm</label>
				<input name="tendd" type="text" class="form-control" id="tendd" placeholder="Khách sạn Majestic">
			</fieldset>
			<fieldset class="form-group">
				<label for="diachidd">Địa chỉ</label>
				<input name="diachidd" type="text" class="form-control" id="diachidd" placeholder=" 1 Đồng Khởi Quận 1 TPHCM">
			</fieldset>
			<fieldset class="form-group">
				<label for="succhua">Sức chứa</label>
				<input name="succhua" type="text" class="form-control" id="succhua" placeholder="450">
			</fieldset>
			<input type="submit" class="btn btn-success btn-block" value="Thêm địa điểm">
		</form>
		</div>
	</div>
</body>
</html>