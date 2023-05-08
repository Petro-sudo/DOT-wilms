<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "wilms";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect the DataBase:' .mysql_error());
        }
?>