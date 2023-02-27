<?php
function buscarNdep($Id){
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
    $nombre=0;
    $sql= "SELECT Nombre_del_departamento from departamento WHERE Id='".$Id."'";
    $resultado = mysqli_query($conn,$sql);

    if (mysqli_num_rows($resultado)>0)
    {
        $etc=mysqli_fetch_assoc($resultado);
        $nombre = $etc['Nombre_del_departamento'];
    }
    return $nombre;
}

?>

