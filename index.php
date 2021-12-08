<?php
  session_start();
  if(empty($_SESSION["idu"]))
  {
    header("Location:login.html");
    die();
  } else
  {
    header("Location:main.php");
die();
  }  
 
?>