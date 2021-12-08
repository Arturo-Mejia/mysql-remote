<?php
include 'conexion.php';
$conn=conectar();

$correo=$_GET["email"];
$contraseña=$_GET["pass"];

$sql="SELECT * FROM usuarios WHERE email='".$correo."' AND pass='".$contraseña."';";
$result = $conn->query($sql);
		if ($result->num_rows > 0)
        { 
        $row = $result->fetch_assoc();
         echo "".$row["email"];
		 session_start();
		 $_SESSION["idu"]=$row["email"];
		} else 
            {
			 echo "El correo y contraseña no coinciden";  
			}
			$conn->close();  
?>