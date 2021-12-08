
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="estilologin.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript' src='script.js'></script>
    <title>MiDB</title>
    <link rel="shortcut icon" href="assets/img/db.png">
</head>
<body onload="autolog();">
<input id="logid" type="hidden" value="" />
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="assets/img/db.png" class="iconm" id="iconm" alt="User Icon" />
            <h5>MySqlDB Remote</h5>
          </div>
      <?php
      include 'conexion.php';
      $conn=conectar();
      session_start();
      $sql="SELECT * FROM usuarios WHERE email='".$_SESSION["idu"]."';";
      $result = $conn->query($sql);
		if ($result->num_rows > 0)
        { 
        $row = $result->fetch_assoc();
         echo "".$row["email"];
		} else 
      ?>
           <div class="card border-success mb-3" style="margin: 10px;">
          <div class="card-header">Mi base de datos remota</div>
          <div class="card-body text-success">
          <h5 class="card-title">Información</h5>
          <p class="txt-c">Host del servidor:  <p class="text-dark">amhweb.ddns.net</p> </p>
          <p class="txt-c">Nombre de la base de datos: </p>
          <p class="card-text text-dark"><?php echo "".$row["dbname"]; ?></p>
          <p class="txt-c">Usuario:</p>
          <p class="card-text text-dark"><?php echo "".$row["dbuser"]; ?></p>
          <p class="txt-c">Contraseña:</p>
          <p class="card-text text-dark"><?php echo "".$row["dbpass"]; ?></p>
          <?php
			$conn->close();  
      ?>
      
        </div>
        
        <button type="button" onclick="cerrarsesion();" class="boton btn btn-primary">Cerrar sesión</button>
        <button type="button" onclick="eliminarcuenta()" class="boton btn btn-secondary">Eliminar cuenta</button>    
        </div>
      </div>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

