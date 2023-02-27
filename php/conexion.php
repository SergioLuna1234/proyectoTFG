<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$conn = mysqli_connect($servidor, $usuario, $password, "proyecto");
if (!$conn) {
 die("Conexion fallida: " . mysqli_connect_error());
}
?>
