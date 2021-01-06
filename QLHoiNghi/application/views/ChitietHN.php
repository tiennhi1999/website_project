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
	<?php if($this->session->has_userdata('email'))
	{
		if ($this->session->userdata('loai') == 1) {
			require 'header_ad.php';
		}
		else
		{
			require 'header_con.php';
		}
	}
	else
	{
		require 'header_cus2.php';
	} ?>
		
	<div class="container">
		<div class="row">		
			<div class="col-sm-9">

				<!-- khoi danh sach tin -->
				<div class="mottinchuan">
					<?php foreach ($dulieutin as $key => $value): ?>
	
							<div class="text-xs-center">
								<h3 class="tieudetin1 fontoswarld"><?php echo $value['TENHN'] ?></h3>
								<hr class="m-y-md">
							</div>
							<img class="" src="<?php echo $value['HINHANH'] ?>" alt="Card image cap">
							<br>
							<br>
							<p ><?php echo $value['MOTANG'] ?></p>
							
							<p class="ngaythang1"> Ngày diễn ra:  <?php echo $value['THOIGIAN'] ?></p>
							
							<br>
							<?php foreach ($diadiem as $key => $ddiem): ?>
							<p ><strong>Địa điểm:</strong>  <?php echo $ddiem['TENDD'] ?></p>
							<p ><strong>Địa chỉ:</strong>  <?php echo $ddiem['DIACHI'] ?></p>
							<?php endforeach ?>
							
							
							
							<p class="card-text"><?php echo $value['MOTA'] ?></p>
						
							

					<?php endforeach ?>
				</div>
			</div>
				
				<!-- het khoi danh sach tin -->
				<div class="col-sm-3">
					<div class="phansearch  wow  fadeInUp">
							 <input type="text" class="form-control phansearchct"  placeholder="Search">
							 
							<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
						
					</div>

					<div class="khoilistlink my-2  wow  fadeInUp">
						<h3 class="fontoswarld">Danh mục </h3>
						<ul class="fontroboto">
									<?php foreach ($cacdanhmuc as $key => $value): ?>
								<li><a href="<?php echo base_url() ?>/tintuc/danhmuc/<?php echo  $value['id'] ?>"> <?php echo $value['tendanhmuc'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</div><!--  	het listlink  -->

					

				</div>  <!-- HET COT 3 -->
			</div>
		</div>
	</div>
</body>
</html>