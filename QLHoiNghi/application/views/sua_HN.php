<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sửa hội nghị</title>
			<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
 	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">
 	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
</head>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-10 push-sm-1">
				<div class="jumbotron text-xs-center">
					<h1 class="display-3">SỬA HỘI NGHỊ</h1>
					<p class="lead">SỬA HỘI NGHỊ.</p>
					<hr class="m-y-md">
				</div>
				<?php foreach ($dulieusua as $key => $value): ?>
				<div class="formthemmoi">
					<form action="<?php echo base_url() ?>Admin/luutindasua" method="POST" enctype = 'multipart/form-data'>
						<input type="hidden" name="mahn" value="<?php echo $value['MAHN'] ?>">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tên hội nghị</label>
							<input name="tenhn" type="text" class="form-control" id="tieude" value="<?php echo $value['TENHN'] ?>">
						</fieldset>
						<fieldset class="form-group">
								<img src="<?php echo $value['HINHANH'] ?>" alt="" class="img-fluid">
								<input type="hidden" value="<?php echo $value['HINHANH'] ?>" name="anhtincu">
								<label for="formGroupExampleInput">Ảnh hội nghị</label>
								<input name="hinhanh" type="file" class="form-control">
						</fieldset>
						<fieldset class="form-group">
								<label for="formGroupExampleInput">Mô tả ngắn</label>
								<input name="motang" type="text" class="form-control" value="<?php echo $value['MOTANG'] ?>">
						</fieldset>
						<fieldset class="form-group">
								<label for="formGroupExampleInput">Thời gian</label>
								<input name="thoigian" type="datetime" class="form-control" value="<?php echo $value['THOIGIAN'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Địa điểm hội nghị</label>
							<select name="madd" id="madd" class="form-controll">
								<option value="<?php echo $value['MADD'] ?>"> <?php echo $value['TENDD'] ?></option>
								<?php foreach ($dulieudd as $key => $diadiem): 
									if ($value['MADD'] != $diadiem['MADD']) { ?>
										<option value="<?php echo $diadiem['MADD'] ?>"> <?php echo $diadiem['TENDD'] ?></option>
									<?php } ?>
								<?php endforeach ?>

							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Danh mục tin</label>
							<select name="iddanhmuc" id="iddanhmuc" class="form-controll">
									<option value="<?= $value['IDDANHMUC'] ?>">
										<?php echo $value['tendanhmuc']; ?>
									</option>
									<?php foreach ($dulieudanhmuc as $key => $danhmuc): 
									if ($value['MADD'] != $danhmuc['MADD']) { ?>
										<option value="<?php echo $danhmuc['id'] ?>"> <?php echo $danhmuc['tendanhmuc'] ?></option>
									<?php } ?>
								<?php endforeach ?>
								
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Mô tả chi tiết</label>
							<textarea name="mota" id="noidungtin" cols="30" rows="10">
								<?php echo $value['MOTA'] ?>
							</textarea>
						</fieldset>
						<fieldset class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<input type="submit" value="LƯU" class="btn btn-outline-info btn-block btn-lg">
								</div>
	
							</div>
		
						</fieldset>
						<?php endforeach ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>	
		CKEDITOR.replace( 'noidungtin', {
	    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
	    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
	     filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
   	 	filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
   	 	filebrowserWindowWidth : '1000',
    	filebrowserWindowHeight : '700',
   		 language: "en"
	});
	</script>
</body>
</html>