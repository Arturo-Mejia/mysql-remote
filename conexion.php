<?php
    function conectar()
    {
        // Nombre de la base de datos
        $database = "remotedb";
        // Host
        $hostname = "amhweb.ddns.net";
        // Nombre de usuario
        $username = "portafolio";
        // Clave de usuario
        $mysqli = new mysqli($hostname,$username,"Asdf/123",$database);
        if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
        return $mysqli; 
    } 
     
?>