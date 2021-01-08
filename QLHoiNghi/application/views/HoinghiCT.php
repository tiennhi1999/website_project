<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hội nghị của tôi</title>
		<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
 	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
 	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">
 	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
</head>
<body>
	<?php if($this->session->has_userdata('email'))
	{
			require 'header_con.php';
	}
	else {
		redirect('Trangchu','refresh');
	} ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<div class="text-xs-center">
					<h1 class="display-5">HỘI NGHỊ CỦA TÔI</h1>
					<br>
					<hr class="m-y-md">
				</div>
			</div>
		
		</div>
	</div>
	<div class="container">
		<div class="row">		
			<div class="col-sm-9">

				<!-- khoi danh sach tin -->
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
							<?php if($value['duyet'] == 0) {?>
								<div class="alert alert-danger" role="alert">
									<p class="card-text text-xs-center" >Đang đợi duyệt</p>
								</div>
							<?php }
							else {?>
								<div class="alert alert-success" role="alert">
									<p class="card-text text-xs-center" style="color: green">Đã duyệt</p>
								</div>
							
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
					<?php endforeach ?>
					</div>
				</div>
				
				<!-- het khoi danh sach tin -->
				<div class="col-sm-3">
					<div class="phansearch  wow  fadeInUp">
							 <form action="<?php echo base_url(); ?>HoiNghi/timkiem" method="post">
							 <input name="tieude" type="text" class="form-control phansearchct"  placeholder="Search">
							 
							<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
						</form>
						
					</div>

					<div class="khoilistlink my-2  wow  fadeInUp" id="myDIV">
						<h3 class="fontoswarld">Danh mục </h3>
						<ul class="fontroboto" >
					
						<li><a  href="<?php echo base_url() ?>/HoiNghi/dangDuyet">Đang đợi duyệt</li>
						<li><a  href="<?php echo base_url() ?>/HoiNghi/daDuyet">Đã duyệt</li>
							
						</ul>
					</div><!--  	het listlink  -->

					

				</div>  <!-- HET COT 3 -->
			</div>
		</div>
	</div>
</body>
<br>
<br>
<br>
<br>
<br>
<?php require 'footer.php'; ?>
<script>
// Add active class to the current button (highlight it)
	$(function(){
		$('body').on('click', '.nut', function(event) {
			event.preventDefault();
			$(this).parent().find('activing').removeClass('btn');
			$(this).parent().find('activing').removeClass('activing');
			$(this).addClass('btn');
			$(this).addClass('activing');
			
			

			
		});
	})
</script>

</html>