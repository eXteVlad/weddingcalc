<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/favicon.ico">	
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/registration.css">
		<title>Регистрация</title>
	</head>
	<body>
		<div id = "main">
			<center>
				<h1>Регистрация</h1>
				<h2>Введите необходимые данные в поля для регистрации.</h2>
				<form action = "check.php" method = "post">
					<p>Логин:</p>
					  <input name = "login" type="text" id="inputLogin" placeholder="Логин">
					  <?php
						if(isset($_SESSION['busyname']))
						{
							echo "<p style = 'color: red'>Такой логин уже занят.</p>";
							unset($_SESSION['busyname']);
							session_destroy();
						}
					  ?>
					<p>Пароль:</p>
					 <input name = "password" type="password" id="inputPassword" placeholder="Пароль">
					<p>E-mail:</p>
					  <input name = "email" type="text" id="inputEmail" placeholder="Email">
					  <?php
						if(isset($_SESSION['busyemail']))
						{
							echo "<p style = 'color: red'>Такой E-mail уже занят.</p>";
							unset($_SESSION['busyemail']);
							session_destroy();
						}
					  ?>
					<p>Имя:</p>
					  <input name = "username" type="text" id="inputLogin" placeholder="Имя">
					<p>Дата свадьбы:</p>
					  <input name = "date" type="date" id="inputDate">
					  </br>
					  <button name = "reg_btn" type="submit" class="btn btn-primary">Создать</button>
				</form>
				<a href = "index.php"><button class = "btn btn-warning">Назад</button></a>
			</center>
		</div>
	</body>
</html>