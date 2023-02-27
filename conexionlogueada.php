<?php
//variables
//Se mantiene la conexion
session_start();
$servidor = "localhost";
$usuario = $_SESSION['nombre_usuario']['name'];
//$password = $_POST["pass"];

//si no eres admin o jefedeestudios
if($usuario!="admin" && $usuario!="jefedeestudios"){
    //conexion como profesor 
    $conn = mysqli_connect($servidor, "profesor", "ProyectoDAM", "proyecto");
}else if ($usuario==="admin"){
    //conexion como admin
    $conn = mysqli_connect($servidor, $usuario, "ProyectoDAM", "proyecto");
}else{
    //conexion como jefe de estudios
    $conn = mysqli_connect($servidor, $usuario, "ProyectoDAM", "proyecto");
}
// si la conexión ha fallado redireccionamos al index.php
if (!$conn) {
    die(header("location: index.php"));
}

//siempre hay que cerrar una conexión después de usarla
?>