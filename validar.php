<?php
require('conexion.php');

session_start();
	
if(isset($_SESSION["id_usuario"]))
{
		header("Location: menu.php");
}
	
if(!empty($_POST))
{
    $error = '';
		
    if($usuario=="profesor")
    {
        $sql = "SELECT usuario FROM profesores WHERE usuario = '$usuario' AND contrasena = '$password'";
        $result=$conn->query($sql);
        $rows = $result->num_rows;

        if($rows > 0) 
        {
        $row = $result->fetch_assoc();
        $_SESSION['nombre_usuario'] = $row['nombre'];

        header("location: menu.php");
        } 
        else {
            $error = "El nombre o password son incorrectos";
        }
    }//fin del if profesores
    else
    {
        header("location: menu.php");
    }
}//fin del empty POST
?>