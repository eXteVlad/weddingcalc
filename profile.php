<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/favicon.ico">	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/profile.css">
		<title>Профиль</title>
	</head>
	<body>
	<header class = "page_header">
		<div id = "hello">
			Здравствуй, <?php echo $_SESSION['login']; ?>!
			<a href = "exit.php"><button class = "btn btn-danger">Выйти</button></a>
		</div>
		<div id = "menu">
		<nav>
			<ul>
				<li class = "active">
					<a href = "#">Главная</a>
				</li>
				<li><a href = "#"> Разработка </a></li>
				<li><a href = "#"> Разработка </a></li>
				<li><a href = "#"> Разработка </a></li>
				<li><a href = "#"> Разработка </a></li>
				<li><a href = "#"> Разработка </a></li>
			</ul>
		</nav>
		</div>
	</header>
	<div id = "content">
			<p>sdgasgfadsgdfsgd</p>
			<p>dsfsfasgasgdbdfvafvad</p>
			<h1>sdafadsf</h1>
			<p>sdgsdgadfsgdfgsdsaf</p>
			<p>sdgasgfadsgdfsgd</p>
			<p>dsfsfasgasgdbdfvafvad</p>
			<h1>sdafadsf</h1>
			<p>sdgsdgadfsgdfgsdsaf</p>
			<p>sdgasgfadsgdfsgd</p>
			<p>dsfsfasgasgdbdfvafvad</p>
			<h1>sdafadsf</h1>
			<p>sdgsdgadfsgdfgsdsaf</p>
			
	</div>
	</body>
</html>