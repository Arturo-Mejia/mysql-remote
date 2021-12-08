<?php
include 'conexion.php';                
$id=$_GET["id"];
      $conn = conectar(); 

      $sql="SELECT * FROM usuarios WHERE email='".$id."';";
      $result = $conn->query($sql);
		if ($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        $dbname=$row["dbname"];
        $dbuser=$row["dbuser"];
		}

      $borraruser="delete from mysql.user where user='".$dbuser."';";
      $borrardb="drop database ".$dbname.";";
      if ($conn->query($borraruser) === TRUE) {
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      if ($conn->query($borrardb) === TRUE) {
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
$sql = "DELETE FROM usuarios WHERE email='".$id."';"; 

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
session_start();
session_destroy(); 
?>