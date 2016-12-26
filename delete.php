<?php  
session_start();
    if(!isset($_SESSION['login']))
    {
        header('location:notlogged.php');
        exit;
    }
 $connect = mysqli_connect("localhost", "root", "", "WeddingBD");  
 $login = $_SESSION['login'];
 $sql = "DELETE FROM guests WHERE login_p = '$login' AND FIO = '".$_POST["FIO"]."' LIMIT 1";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Гость удалён!';  
 }  
 ?>