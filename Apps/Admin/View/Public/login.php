<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> - 登录</title>
<link rel="stylesheet" type="text/css" href="__ADMIN_PUBLIC__css/login.css">
<style type="text/css">
.tb960x90 {display:none!important;display:none}</style>
</head>
<body>
<div class="wrapper">
	<div class="container">
		<h1>米格实验室</h1>
		<h3>后台管理系统</h3>
		<form class="form" action="{:U('login/index')}" method="post">
			<input type="text" name="username" value="admin" placeholder="用户名" required>
			<input type="password" name="password" value="admin888" placeholder="密码" required>
			<input type="hidden" name="login_check_code" value="<?= $_SESSION['login_check_code'];?>">
			<button type="submit" name="submit" id="login-button">登录</button>
		</form>
	</div>
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

<!-- <script type="text/javascript" src="<?= $style_url;?>js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript">
$('#login-button').click(function(event){
	event.preventDefault();
	$('form').fadeOut(500);
	$('.wrapper').addClass('form-success');
});
</script> -->

</body>
</html>