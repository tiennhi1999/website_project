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
	<?php require 'header_ad.php'; ?> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 themmoi">
				<div class="jumbotron text-xs-center">
					<h1 class="display-3">Thêm mới hội nghị</h1>
					<p class="lead">Thêm mới hội nghị</p>
					<hr class="m-y-md">
				</div>
				<div class="formthemmoi">
					<form action="<?php echo base_url() ?>Admin/themhoinghi" method="POST" enctype = 'multipart/form-data'>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tên Hội Nghị</label>
							<input name="tenhn" type="text" class="form-control" id="tenhn" placeholder="Example input">
						</fieldset>
						<fieldset class="form-group">
								<label for="formGroupExampleInput">Hình ảnh</label>
								<input name="hinhanh" type="file" class="form-control" placeholder="Ảnh hội nghị">
						</fieldset>
						<fieldset class="form-group">
								<label for="formGroupExampleInput">Mô tả ngắn</label>
								<input name="motang" type="text" class="form-control" placeholder="Mô tả ngắn">
						</fieldset>
						<fieldset class="form-group">
								<label for="formGroupExampleInput">Thời gian</label>
								<input name="thoigian" type="datetime-local" class="form-control" placeholder="Thời gian ">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Địa điểm hội nghị</label>
							<select name="madd" id="madd" class="form-controll">
								<?php foreach ($dulieudd as $key => $value): ?>
								<option value="<?php echo $value['MADD'] ?>"> <?php echo $value['TENDD'] ?></option>
								<?php endforeach ?>
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Danh mục hội nghị</label>
							<select name="iddanhmuc" id="iddanhmuc" class="form-controll">
								<?php foreach ($dulieudanhmuc as $key => $value): ?>
									<option value="<?php echo $value['id'] ?>"> <?php echo $value['tendanhmuc'] ?></option>
								<?php endforeach ?>
									
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Mô tả chi tiết</label>
							<textarea name="mota" id="mota" cols="30" rows="10">
								
							</textarea>
						</fieldset>
						<fieldset class="form-group">
							<input type="submit" value="Thêm tin">
						</fieldset>
					</form>
				</div>
			</div>			
			<div class="col-sm-6 danhsach">
				<div class="jumbotron text-xs-center">
					<h1 class="display-3">Danh sách hội nghị</h1>
					<p class="lead">Danh sách các hội nghị.</p>
					<hr class="m-y-md">
				</div>

				<!-- khoi danh sach tin -->
				<div class="row">
					<?php foreach ($dulieutin as $key => $value): ?>
					<div class="col-sm-4">
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
	<script>	
		CKEDITOR.replace( 'mota', {
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