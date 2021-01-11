<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quan ly tin</title>
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
		if ($this->session->userdata('loai') == 1) {
			require 'header_ad.php';
		}
		
	} ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<div class="text-xs-center"  style="color: #2c3e50">
					<h1 class="display-5">QUẢN LÝ NGƯỜI DÙNG</h1>
					
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
					
					<table class="table table-responsive table-inverse">
						<thead>
							<tr>
								<th>STT</th>
								<th>Họ và tên</th>
								<th>Username</th>
								<th>Email</th>
								<th>Số điện thoại</th>
								<th>Chặn</th>
							</tr>
						</thead>
						<tbody>
							
								
								<?php 	$i = 1 ?>
							<?php foreach ($danhsach  as $key => $value): ?>
									
								<tr>
								<td><?php echo $i; $i++?></td>	
								<td><?php echo $value['TENUSER'] ?></td>
								<td><?php echo $value['USERNAME'] ?></td>
								<td><?php echo $value['USER_EMAIL'] ?></td>
								<td><?php echo $value['SDT'] ?></td>
								<?php if ($value['CHAN'] == 1) {?>
									<td>
										<div class="xulybochan">
										<a class="nutBo" data-href="<?php  echo $value['MA_USER'] ?>" >
										<button  class="btn-warning dachan" style="color: white">Bỏ chặn</button>
										</a>
										<a class="nutChan" data-href="<?php  echo $value['MA_USER'] ?>" >
										<button  class="btn-danger chan hidden-xs-up" style="color: white">Chặn</button>
										</a>
										</div>
										
										
									</td>
								<?php }
								else {?>
									<td>
										<div class="xulychan">
									<a class="nutChan" data-href="<?php  echo $value['MA_USER'] ?>" >
										<button  class="btn-danger chan" style="color: white">Chặn</button>
										
									</a>
									<a class="nutBo" data-href="<?php  echo $value['MA_USER'] ?>" >
										<button  class="btn-warning dachan hidden-xs-up" style="color: white">Bỏ chặn</button>
										
									</a>
										</div>
									
									
								</td>
								<?php } ?>

								</tr>
								<?php endforeach ?>
								
							
								
							
							
						</tbody>
					</table>
					
					</div>
				</div> <!-- het cot 9 -->
				<div class="col-sm-3">
					<div class="phansearch  wow  fadeInUp">
						<form action="<?php echo base_url(); ?>Admin/timkiemuser" method="post">
							 <input name="tenuser" type="text" class="form-control phansearchct"  placeholder="Search">
							 
							<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
						</form>
					</div>

					<div class="khoilistlink my-2  wow  fadeInUp">
						<h3 class="fontoswarld">LỌC </h3>
						<ul class="fontroboto">
								<li><a href="<?php echo base_url() ?>Admin/locuser/1"> Đã chặn</a></li>
								<li><a href="<?php echo base_url() ?>Admin/locuser/2"> Không chặn</a></li>
								
						</ul>
					</div><!--  
						het listlink  -->

					<div class="khoilistlink my-2  wow  fadeInUp">
							<h3 class="fontoswarld">SẮP XẾP THEO TÊN</h3>
							<ul class="fontroboto">

									<li><a  href="<?php echo base_url()  ?>Admin/sapxepuser/1"> Tăng dần </a></li>

									<li><a  href="<?php echo base_url()  ?>Admin/sapxepuser/2"> Giảm dần </a></li>
							</ul>
					</div><!--  
							het listlink  -->

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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php require 'footer.php'; ?>
<script>
	$(function(){
		duongdan = '<?php echo base_url() ?>';
		$('body').on('click', '.nutBo', function(event) {
				event.preventDefault();

				$(this).children('.dachan').addClass('hidden-xs-up');
				$(this).parent().find('.nutChan').children('.chan').removeClass('hidden-xs-up');
				idnhan = $(this).data('href');
				$.ajax({
					url: duongdan + 'Admin/bochan/' + idnhan,
					type: 'post',
					dataType: 'json'
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");	
				});
			});
		$('body').on('click', '.nutChan', function(event) {
				event.preventDefault();
				$(this).children('.chan').addClass('hidden-xs-up');
				$(this).parent().find('.nutBo').children('.dachan').removeClass('hidden-xs-up');
				idnhan = $(this).data('href');
				$.ajax({
					url: duongdan + 'Admin/chan/' + idnhan,
					type: 'post',
					dataType: 'json'
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");	
				});
			});

	})
</script>

</html>