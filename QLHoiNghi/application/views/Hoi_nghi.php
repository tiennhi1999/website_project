<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quan ly tin</title>
		<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
 	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">
 	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
</head>
<body>
	<?php require 'header_con.php'; ?> 
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<div class="text-xs-center">
					<h1 class="display-3">Danh sách hội nghị</h1>
					<p class="lead">Danh sách các hội nghị.</p>
					<hr class="m-y-md">
				</div>
			</div>
		
		</div>
	</div>
	<div class="container">
		<div class="row">		
			<div class="col-sm-8">

				<!-- khoi danh sach tin -->
				<div class="row">
					<?php foreach ($dulieutin as $key => $value): ?>
					<div class="col-sm-6">
						<div class="card-group">
							<div class="card">
								<img class="card-img-top img-fluid" src="<?php echo $value['HINHANH'] ?>" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title"><?php echo $value['TENHN'] ?></h4>
									<p class="card-text"><?php echo $value['MOTANG'] ?></p>
									<p class="card-text"><small class="text-muted">Ngày diễn ra:  <?php echo $value['THOIGIAN'] ?></small></p>
									<a href="<?php echo base_url() ?>/Admin/suaHoiNghi/<?php echo $value['MAHN']?>" class="btn btn-outline-success sua"><i class="fa fa-pencil"></i></a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					</div>
				</div>
				
				<!-- het khoi danh sach tin -->
			</div>
		</div>
	</div>
</body>
</html>