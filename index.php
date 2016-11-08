<?php
	session_start();
	if(isset($_SESSION['login']))
	{
			header('location:profile.php');
			exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="img/favicon.ico">	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/index.css">
		<title>Свадебный калькулятор</title>
	</head>
	<body>
		<div id = "main">
			<center>
				<h1>Добро пожаловать!</h1>
				<h2>С помощью данного портала подготовка к вашей свадьбе пройдёт </br> значительно проще!</h2>
				<div id = "form_authoris">
				<form action = "check.php" class="form-horizontal" method = "post">
				  <div class="control-group">
					<p>Логин:</p>
					  <input name = "login" type="text" id="inputLogin" placeholder="Логин">
				  </div>
				  <div class="control-group">
					<p>Пароль:</p>
					 <input name = "password" type="password" id="inputPassword" placeholder="Пароль">
				  </div>
				  <div class="control-group">
					  <button name = "login_btn" type="submit" class="btn btn-info">Войти</button>&emsp;<a href = "registration.php"><ins>Нет аккаунта?</ins></a>
				  </div>
				</form>
				<?php 
					if(isset($_SESSION['wrong_login']))
					{
						echo "<p style = 'color: red'>Неверный логин/пароль.</p>"; 
						unset($_SESSION['wrong_login']);
						session_destroy();
					}
				?>
				<?php 
					if(isset($_SESSION['regsuc']))
					{
						echo "<p style = 'color: green'>Регистрация успешно завершена. Теперь вы можете авторизоваться.</p>"; 
						unset($_SESSION['regsuc']);
						session_destroy();
					}
				?>
				</div>
			</center>
		</div>
	</body>
</html>