<?php
//variables
$servidor = "localhost";
$usuario = $_POST["nombre"];
$password = $_POST["pass"];

//si no eres admin o jefedeestudios
if($usuario!="admin" && $usuario!="jefedeestudios"){
    //conexion como profesor 
    $conn = mysqli_connect($servidor, "profesor", "ProyectoDAM", "proyecto");
}else{
    //conexion como admin o jefa de estudios
    $conn = mysqli_connect($servidor, $usuario, $password, "proyecto");
}
// si la conexión ha fallado redireccionamos al index.php
if (!$conn) {
    die(header("location: index.php"));
}

//siempre hay que cerrar una conexión después de usarla
?>