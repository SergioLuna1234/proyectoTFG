<?php 
//comprobamos que la sesion del usuario existe
if(isset($_SESSION['nombre_usuario'])) {
    //guardamos la duracion predeterminada del usuario en la variable duracion
    $duration = $_SESSION["nombre_usuario"]["duration"];
    //guardamos en start el comienzo de la sesion del usuario
    $start = $_SESSION["nombre_usuario"]["start"];
    
    //si el usuario lleva sin tocar una tecla 5 minutos(por defecto) se va al index
    if((time()-$start)>$duration){
        header("Location: index.php");
    }  
}
// Actualizamos el tiempo de sesion del usuario para que funcione correctamente el bloque de codigo anterior
$_SESSION['nombre_usuario']["start"] = time();
?>