<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
// Creamos la conexion y la guardamos en una variable
$conn = mysqli_connect($servidor, $usuario, $password, "proyecto");
// si la conexión ha fallado mostrarmos un error sino
// mandamos un mecnsaje diciendo que la conexión ha ido ok
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
//siempre hay que cerrar una conexión después de usarla
?>
