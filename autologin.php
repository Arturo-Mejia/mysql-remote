<?php
  session_start();
  if(empty($_SESSION["idu"]))
  {
      echo "";
  } else
  {
      echo "".$_SESSION["idu"];
  }  
 
?>