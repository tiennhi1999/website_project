<!DOCTYPE html>
<html lang="en"><head>
	<title> Login </title>
	<meta charset="utf-8">
	<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
    <script src="https://kit.fontawesome.com/98a2e27e25.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body class="login">
    <?php require 'header_cus2.php' ?>
    <div class="loginbox">
        <h1>ĐĂNG NHẬP TÀI KHOẢN</h1>
        <form action="<?php echo base_url(); ?>/Login/XacNhan" method ="post">
            <p>Email Đăng Nhập</p>
            <input type="text" name="email" placeholder="example@gmail.com">
            <p>Mật khẩu</p>
            <input type="password" name="matkhau" placeholder="Mật khẩu" >
            <input type="submit"  value="Đăng nhập">
            <a href="forgotpass.html">Bạn quên mật khẩu?</a><br>
            <a href="<?= base_url() ?>Dang_ky">Bạn chưa có tài khoản đăng nhập?</a>
        </form>      
    </div>
</body>

</html>
