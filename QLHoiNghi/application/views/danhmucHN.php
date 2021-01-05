<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
 	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">
</head>
<body>
	<?php require 'header_con.php'; ?> 
	<div class="container-fluid">
		<div class="row">
			 <div class="col-sm-6">
			 	 <!-- <form action="themdanhmuc" method="post">  -->
			 		<div class="jumbotron jumbotron-fluid text-xs-center">
			 			<div class="container">
			 				<h1 class="display-5">Thêm danh mục</h1>
			 				<p class="lead">Form này cho phép thêm danh mục ghi vào csdl</p>
			 			</div>
			 		</div>
			 		<fieldset class="form-group">
			 			<label for="formGroupExampleInput">Tên danh mục</label>
			 			<input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" placeholder="Example input">
			 		</fieldset>
			 		<fieldset class="form-group">
			 			<input type="button" class="form-control btn btn-outline-info" id="nutThemDanhMuc" value="Thêm">
			 		</fieldset>
			 	<!-- </form> -->
			 </div> 
			 <div class="col-sm-6 cacdanhmuc">
			 	<div class="jumbotron jumbotron-fluid">
			 		<div class="container">
			 			<h1 class="display-5">Danh sách danh mục hội nghị</h1>
			 			<p class="lead">Các danh mục tin đã thêm.</p>
			 		</div>
			 	</div>
			 	<?php foreach ($dulieu as $key => $value): ?>
				 	<div class="card card-inverse card-primary mb-3 text-center">
				 		<div class="card-block">
				 			<div class="thaotac text-xs-right">
				 				<a  data-href="<?php  echo $value['id'] ?>" class="nutedit btn btn-danger"><i class="fa fa-pencil"></i></a>
				 				<a  data-href="<?php  echo $value['id'] ?>" class="nutxoa btn btn-warning"><i class="fa fa-remove"></i></a>
				 			</div>
				 			<div class="button_jquery text-xs-right hidden-xs-up">
				 				
				 				<a  href="" class="btn btn-success nutluu">Lưu</i></a>
				 			</div>

				 			<h4 class="card-blockquote">
				 					<fieldset class="form-group jtendanhmuc hidden-xs-up">
				 						<input type="hidden" class="form-control id" value="  <?= $value['id']; ?>">
				 						<input type="text" class="form-control tendanhmucsua"  value="<?php echo $value['tendanhmuc'] ?>">
				 					</fieldset>
				 				<div class="noidung">
				 				<?php echo $value['tendanhmuc'] ?>
				 				</div>
				 			</h4>
				 		</div>
				 	</div>
			 	<?php endforeach ?>
			 
			 </div>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
 	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
	<script>
		$(function() {
			duongdan = '<?php echo base_url() ?>';
			$('body').on('click', '.nutedit', function(event) {
				
				/* Act on the event */
				$(this).parent().addClass('hidden-xs-up');
				$(this).parent().next().next().find('.noidung').addClass('hidden-xs-up');
				$(this).parent().next().removeClass('hidden-xs-up');
				$(this).parent().next().next().find('.jtendanhmuc').removeClass('hidden-xs-up');
				event.preventDefault();
			});	

				$('body').on('click', '.nutluu', function(event) {
				
				/* Act on the event */

				phantu1 = $(this).parent().addClass('hidden-xs-up');
				phantu2 = $(this).parent().next().children('.jtendanhmuc').addClass('hidden-xs-up');
				//Lay gia tri ve
				noidung = $(this).parent().next().children('.jtendanhmuc').children('.tendanhmucsua').val();
 				giatriid = $(this).parent().next().children('.jtendanhmuc').children('.id').val();
 				hienthi1 = $(this).parent().prev().removeClass('hidden-xs-up');
 				hienthi2 = $(this).parent().next().children('.noidung').html(noidung)
 				.removeClass('hidden-xs-up');

 			 	$.ajax({
					url: duongdan + '/HoiNghi/UpdateDulieu',
					type: 'post',
					dataType: 'json',
					data: {tendanhmuc: noidung,
						id: giatriid}
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function(res) {
					//console.log(res);
					//dung jquery de ve ra noi dung

				});
				
 			 	event.preventDefault();
			});	
			
			$('#nutThemDanhMuc').click(function() {
				
				// var tendanhmuc = $('#tendanhmuc').val();
				// console.log(tendanhmuc);
				$.ajax({
					url: duongdan + '/HoiNghi/addJquery',
					type: 'post',
					dataType: 'json',
					data: {tendanhmuc: $('#tendanhmuc').val()}
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function(res) {
					//console.log(res);
					//dung jquery de ve ra noi dung
					noidung = '<div class="card card-inverse card-primary mb-3 text-center">';
					noidung += '<div class="card-block">';
					noidung += '<div class="thaotac text-xs-right">';
					noidung += '<a data-href="'+res+'" class="nutedit btn btn-danger"> <i class="fa fa-pencil"></i></a>';
 					noidung += ' <a data-href="'+res+'" class="nutxoa btn btn-warning"> <i class="fa fa-remove"></i></a>';
					noidung += '</div>';
					noidung += '<h4 class="card-blockquote">';
					noidung += '<div>';
					noidung += $('#tendanhmuc').val();
					noidung += '</div>';
					noidung += '</h4>';
					noidung += '</div>';
					noidung += '</div>';
					$('.cacdanhmuc').append(noidung);
					$('#tendanhmuc').val('');

				});
				
			}); //het qu1

			$('body').on('click', '.nutxoa', function(event) {
				event.preventDefault();
				idnhan = $(this).data('href');
				doituongxoa = $(this).parent().parent().parent();
				$.ajax({
					url: duongdan + '/HoiNghi/xoaDanhMuc/' + idnhan,
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
					doituongxoa.remove();
				});
			});

		})
	</script>
</body>
</html>