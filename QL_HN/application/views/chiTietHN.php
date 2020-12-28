<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chi tiết hội nghị</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<?php require 'header_con.php'; ?> 
	<div class="container">
		<div class="row">
				<?php foreach ($dulieunhan as $key => $value): ?>
					<img class="card-img-top img-fluid" src="<?php echo $value['anh']; ?>" alt="">	
					<div class="row" style="padding-top: 50px">
							<div class="col-md-6">
								<h4 class="text-xs-center"><?php echo $value['tenHN'] ?></h4>
								<p class="card-text"><?php echo $value['motachitiet'] ?> Lorem, ipsum dolor, sit amet consectetur adipisicing elit. Autem perferendis harum eius culpa molestiae! Veritatis earum cumque laborum mollitia itaque magni iure beatae nobis sapiente, harum ratione illum, voluptatibus. Unde!</p>
							</div>
							<div class="col-md-6">
								<p class="card-text">Địa điểm: <?php echo $value['diadiem'] ?></p>
								<p class="card-text">Thời gian: <?php echo $value['thoigian'] ?></p>
							</div>
					</div>
		</div>
					
				<?php endforeach ?>
	</div>
		</div>
	</div>		
</body>
</html>