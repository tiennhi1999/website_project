 <!DOCTYPE html>
<html lang="en"><head>
	<title> Đăng Ký </title>
	<meta charset="utf-8">
	   <script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
    <script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>signup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<?php require 'header_cus2.php' ?>
</head>
<body>
        <div class="to">
            <form class="form" action="<?php echo base_url(); ?>/dang_ky/XacNhan/" method='post'>
                <h2>Đăng ký tài khoản</h2>
                <i class="bolder"></i>
                <label style="margin-left: -340px;">Họ và tên</label>
                <input type="text" name="hoten" required>
                <label style="margin-left: -340px;">Username</label>
                <input type="text" name="username" required>
                <label style="margin-left: -340px;">Password</label>
                <input type="password" name="password" required>
                <label style="margin-left: -320px;">Số điện thoại</label>
                <input type="text" name="sdt" required>    
                <label style="margin-left: -370px;">Email</label>
                <input type="text" name="email" required> 
                <input id="submit" type="submit" name="submit" value="Đăng ký">
            </form>            
        </div>
</body>

</html>