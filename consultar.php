<?php
include 'conexion.php';

$email=$_GET["email"];
$pass=$_GET["pass"];

$datos["dbremota"]=array(); 
$conn=conectar();
$sql = "SELECT * FROM usuarios where email='".$email."' AND pass='".$pass."';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($datos["dbremota"],$row);
     }

     echo json_encode($datos); 
} else {
 echo "Sin resultados";  
}
$conn->close();

?>