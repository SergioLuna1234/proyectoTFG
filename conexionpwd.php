<?php
//variables
$servidor = "localhost";


    $conn = mysqli_connect($servidor, "admin", "ProyectoDAM", "proyecto");

// si la conexión ha fallado redireccionamos al index.php
if (!$conn) {
    die(header("location: index.php"));
}

//siempre hay que cerrar una conexión después de usarla
?>