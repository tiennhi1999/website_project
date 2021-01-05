<!DOCTYPE html>
<html lang="en"><head>
	<title> Login </title>
	<meta charset="utf-8">
    <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>login.css">
</head>
<body >
    <div class="loginbox">
        <h1>ĐĂNG NHẬP TÀI KHOẢN</h1>
        <form>
            <p>Tên đăng nhập</p>
            <input type="text" name="" placeholder="Tên đăng nhập">
            <p>Mật khẩu</p>
            <input type="password" name="" placeholder="Mật khẩu">
            <input type="submit" name="" value="Đăng nhập">
            <a href="forgotpass.html">Bạn quên mật khẩu?</a><br>
            <a href="signup.html">Bạn chưa có tài khoản đăng nhập?</a>
        </form>      
    </div>
</body>
</html>
