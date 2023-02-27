<?php 
$server = "localhost";
$user = $_POST["nombre"];
$contra = $_POST["pass"];
// Creamos la conexion y la guardamos en una variable
if($user == "admin" || $user == "jefedeestudios"){
    $connec = mysqli_connect($server, $user, $contra, "proyecto");
}
// si la conexión ha fallado mostrarmos un error sino
// mandamos un mensaje diciendo que la conexión ha ido ok
if (!$connec) {
    die(header("location: index.php"));
}

//siempre hay que cerrar una conexión después de usarla
?>