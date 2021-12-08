<?php
include 'conexion.php';
$conn=conectar();
$email=$_GET["email"];
$pass=$_GET["pass"];

$sqlc = "SELECT * FROM usuarios";
if ($result=mysqli_query($conn,$sqlc)) {
    $rowcount=mysqli_num_rows($result);
}
     $nombredb="db".$email; 
     $usuariodb="udb".$email;
     $passdb=generarcontraseña();        
 

$verificaremail = "SELECT * FROM usuarios where email='".$email."';";
if ($result2=mysqli_query($conn,$verificaremail)) {
    $registrado=mysqli_num_rows($result2);    
}

if($registrado>0)
{
   echo "El usuario ingresado ya ha sido registrado";
} else
{
  
    if($rowcount>19)
{
   echo "Lo sentimos, Ya no quedan cuentas disponibles";
} else
{
   $dropuser="drop user ".$usuariodb.";"; 
   $flushpriv="flush privileges;";
    $creardb="create database ".$nombredb.";";
$crearuser="create user '".$usuariodb."'@'%' identified WITH mysql_native_password by '".$passdb."';";
$permisos="GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER ON ".$nombredb.".* TO '".$usuariodb."'@'%';";

if ($conn->query($dropuser) === TRUE) {
  if ($conn->query($flushpriv) === TRUE) {

  }
}

if ($conn->query($crearuser) === TRUE) {
  
  if ($conn->query($creardb) === TRUE) {
    if ($conn->query($permisos) === TRUE) {

      $sql="INSERT INTO usuarios VALUES('".$email."','".$pass."','".$nombredb."','".$usuariodb."','".$passdb."');";
if ($conn->query($sql) === TRUE) { 
  echo '';
  } else {
    echo "Error: ".$conn->error;
  }
  
  $conn->close();
    } else {
      echo "Error deleting record: " . $conn->error;
    }

  } else {
    echo "Error deleting record: " . $conn->error;
  }


  } else {
    echo "Error deleting record: " . $conn->error;
  }

}

}

  function generarcontraseña()
  {
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "/Pp1";
  
    for($i=0;$i<10;$i++) {
       //obtenemos un caracter aleatorio escogido de la cadena de caracteres
       $password .= substr($str,rand(0,62),1);
    }
    //Mostramos la contraseña generada
    return $password;
 }
?>
