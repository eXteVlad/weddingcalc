<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header('location:notlogged.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>  
      <head>  
           <title>Список гостей</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <a href="index.php"><button class = "btn btn-danger">Назад</button></a>
                    <h3 align="center">Список Ваших гостей:</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var fio = $('#FIO').text();  
           if(fio == '')  
           {  
                alert("Введите ФИО гостя.");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data: {FIO:fio}, 
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var fio=$(this).data("id3"); 
           if(confirm("Вы уверены, что хотите удалить этого гостя?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data: {FIO:fio},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>