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
		else
		{
			require 'header_con.php';
		}
	}
	else
	{
		redirect('Trangchu','refresh');
	} ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<div class="text-xs-center"  style="color: #2c3e50">
					<h1 class="display-5">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h1>
					
					<hr class="m-y-md">
				</div>
			</div>
		
		</div>
	</div>
	<div class="container">
		<div class="row">		
			<div class="col-sm-9 push-sm-2">

				<!-- khoi danh sach tin -->
		
				<?php foreach ($thongtin as $key => $value): ?>
				<form action="<?php echo base_url(); ?>Profile/suaThongtin" method= "post">
					<fieldset class="form-group">
						<label for="tenuser">Họ và tên:</label>
						<input type="hidden" name="ma_user" value="<?php echo $value['MA_USER'] ?>">
						<input name="tenuser" type="text" class="form-control" id="tenuser" value="<?php echo $value['TENUSER'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="username">Tên người dùng:</label>
						<input name="username" type="text" class="form-control" id="username" value="<?php echo $value['USERNAME'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="passw">Mật khẩu:</label>
						<input name="passw" type="password" class="form-control" id="passw" value="<?php echo $value['USER_PWD'] ?>">
					</fieldset>
					
					<fieldset class="form-group">
						<label for="email">Email: </label>
						<input name="email" type="text" class="form-control" id="email" value="<?php echo $value['USER_EMAIL'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="sdt">Email: </label>
						<input name="sdt" type="text" class="form-control" id="sdt" value="<?php echo $value['SDT'] ?>">
					</fieldset>

					<fieldset class="form-group">

						<input type="submit" value="Lưu" class="btn btn-outline-success btn-block btn-lg">
					</fieldset>
					
				</form>
					<?php endforeach ?>
				
			</div>
				
				<!-- het khoi danh sach tin -->
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