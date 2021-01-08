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
					<h1 class="display-5">DUYỆT THAM GIA HỘI NGHỊ</h1>
					
					<hr class="m-y-md">
				</div>
			</div>
		
		</div>
	</div>
	<div class="container">
		<div class="row">		
			<div class="col-sm-9 push-sm-2">

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
								<th>Duyệt</th>
							</tr>
						</thead>
						<tbody>
							
								
								
							<tr>
								<?php for ($i=1; $i < count($danhsach)+1; $i++) { ?>
									<td><?php echo $i ?></td>
								<?php } ?>

								<?php foreach ($danhsach  as $key => $value): ?>
								
								<td><?php echo $value['TENUSER'] ?></td>
								<td><?php echo $value['USERNAME'] ?></td>
								<td><?php echo $value['USER_EMAIL'] ?></td>
								<td><?php echo $value['SDT'] ?></td>
								<?php if ($value['duyet'] == 1) {?>
									<td><i class="fa fa-check-circle"></i></td>
								<?php }
								else {?>
									<td>
									<a class="nutDuyet" data-href="<?php  echo $value['MA_DSDK'] ?>" >
										<button  class="btn-danger duyet" style="color: white">Duyệt</button>
										<i class="fa fa-check-circle daDuyet hidden-xs-up"></i>
									</a>
								</td>
								<?php } ?>
								
								<?php endforeach ?>
							</tr>
							
								
							
							
						</tbody>
					</table>
					
					</div>
				</div>
				

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
		$('body').on('click', '.nutDuyet', function(event) {
				event.preventDefault();

				$(this).children('.duyet').addClass('hidden-xs-up');
				$(this).children('.daDuyet').removeClass('hidden-xs-up');
				idnhan = $(this).data('href');
				$.ajax({
					url: duongdan + 'DangKiTG/duyet/' + idnhan,
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