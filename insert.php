<?php  
session_start();
    if(!isset($_SESSION['login']))
    {
        header('location:notlogged.php');
        exit;
    }
 $connect = mysqli_connect("localhost", "root", "", "WeddingBD");  
 $login = $_SESSION['login'];
 $sql = "INSERT INTO guests(login_p, FIO) VALUES('$login', '".$_POST["FIO"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Гость добавлен!';  
 }  
 ?> 