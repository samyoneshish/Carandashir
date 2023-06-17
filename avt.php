<?php
  session_start();
  $username = $_POST['username'];
  $pas = $_POST['password'];
  
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $mysql=new mysqli('localhost','root','','dhs');
  $connect = mysqli_connect('localhost', 'root', '', 'dhs');
  $result = mysqli_query($connect,"SELECT * FROM `Ycheniki` WHERE `LOG` = '$username' AND `PAS` = '$pas'");
  $query= mysqli_query($connect, "SELECT `FIO` FROM `Ycheniki` WHERE `PAS` = '$pas' AND `LOG` = '$username'");
  $user = mysqli_num_rows($result);
  $result1 = mysqli_fetch_array($query);
  if($result1==null){
	  echo"Такой пользователь не найден";
	  exit();
  }
  $_SESSION["name"]=$result1['FIO'];
  
  echo $_SESSION["name"];
  #echo $result1['FIO'];
  header('Location:1.php');
  $mysql->close();

  
?>