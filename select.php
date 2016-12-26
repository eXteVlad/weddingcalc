<?php  
 session_start();
    if(!isset($_SESSION['login']))
    {
        header('location:notlogged.php');
        exit;
    } 
 $connect = mysqli_connect("localhost", "root", "", "WeddingBD");  
 $output = '';  
 $login = $_SESSION['login'];
 $sql = "SELECT * FROM guests WHERE login_p = '$login'";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">Фамилия</th>   
                     <th width="1%">Удалить/Добавить</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>   
                     <td class="FIO" data-id1="'.$row["FIO"].'">'.$row["FIO"].'</td>   
                     <td><button type="button" name="delete_btn" data-id3="'.$row["FIO"].'" class="btn btn-xs btn-danger btn_delete">x</button>
                     </td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>   
                <td id="FIO" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Пока гостей нет.</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>