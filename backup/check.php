<?php
	session_start();
	header( 'Content-Type: text/html; charset=utf-8' );
	if(isset($_POST['login_btn']))
	{
		$login = $_POST['login'];
		$pass = $_POST['password'];
		$mysqli = new mysqli('localhost', 'root', '', 'WeddingBD');
		if(!$mysqli)
		{
			printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
			exit; 
		}
		$query = $mysqli->query("SELECT * FROM users WHERE Login = '$login' AND password = '$pass'");
        $date = mysqli_fetch_array($query);
        $date[5] = $_SESSION['m_date'];
		if($query->num_rows == 1)
		{
			$_SESSION['login'] = $login;
			header('location:index.php');
			exit;
		}
		else
		{
			$_SESSION['wrong_login'] = 1;
			header('location:notlogged.php');
			exit;
		}
		$mysqli->close();
	}
	else if(isset($_POST['reg_btn']))
	{
		$login = $_POST['login'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$date = $_POST['date'];
		$mysqli = new mysqli('localhost', 'root', '', 'WeddingBD');
		if(!$mysqli)
		{
			printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
			exit; 
		}
		$qrchecklogin = $mysqli->query("SELECT * FROM users WHERE login = '$login' LIMIT 1");
		$qrcheckemail = $mysqli->query("SELECT * FROM users WHERE Email = '$email' LIMIT 1");
		if($qrchecklogin->num_rows == 1)
		{
			$_SESSION['busyname'] = 1;
			header('location:registration.php');
			exit;
		}
		else if($qrcheckemail->num_rows == 1)
		{
			$_SESSION['busyemail'] = 1;
			header('location:registration.php');
			exit;
		}
		else
		{
			if($mysqli->query("INSERT INTO users (Login, Password, Email, UserName, Marriage_Date) VALUES ('$login', '$pass', '$email', '$username', '$date')"))
			{
				$_SESSION['regsuc'] = 1;
				header('location:notlogged.php');
				exit;
			}
			else 
			{
				$err = $mysqli->error;
				echo $err;
			}
		}
	}
?>