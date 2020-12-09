<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Them hoi nghi</title>
	<!-- load bootstraps va css -->
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
		<?php require 'header_con.php'; ?>
	<div class="container">
		<div class="h3 text-xs-center">Thêm hội nghị</div>
	</div>
	<div class="container">
		<form action="them_HN/insertHN" method="POST" enctype="multidata/form-data">
			<fieldset class="form-group">
				<label for="tenHN">Nhâp tên hội nghị</label>
				<input name="tenHN" type="text" class="form-control" id="tenHN" placeholder="Hội nghị công nghệ">
			</fieldset>
			<fieldset class="form-group">
				<label for="mota">Mô tả</label>
				<input name="mota" type="text" class="form-control" id="mota" placeholder="Cuộc cách mạng công nghệ">
			</fieldset>
			<fieldset class="form-group">
				<label for="diadiem">Địa điểm</label>
				<input name="diadiem" type="text" class="form-control" id="diadiem" placeholder="Cuộc cách mạng công nghệ">
			</fieldset>
				<fieldset class="form-group">
				<label for="thoigian">Thời gian</label>
				<input name="thoigian" type="date" class="form-control" id="thoigian" placeholder="thời gian">
			</fieldset>
			<input type="submit" class="input btn btn-primary btn-block" value="THÊM">
		</form>
	</div>
</body>
</html>
