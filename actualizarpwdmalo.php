<?php
//mantenemos la sesion iniciada
session_start();

if(isset($_POST['nombre']) && isset($_POST['pass'])){

//requerimos la conexion php
require('conexion.php');

if($_SESSION['nombre_usuario'] == "admin" || $_SESSION['nombre_usuario'] == "jefedeestudios")
{
    $error="";
    $contrasena1=$_POST["pass"];
    $contrasena2=$_POST["pass2"];
    $usuario=$_POST["nombre"];
    
    if($contrasena1 == $contrasena2){
        
        //opciones del cifrado
        $opciones = [
                        'cost' => 12,
                    ];

        //variable que guarda la clave cifrada
        $clave_cifrada = password_hash($contrasena1, PASSWORD_BCRYPT, $opciones);

        //guardamos el sql
        $sql="UPDATE profesores SET contrasena = '".$clave_cifrada."' WHERE usuario = '".$usuario."'";

        //ejecucion de la sql            
        if(mysqli_query($conn, $sql)){
            echo "Registro actualizado.";
        } 
        else {
            echo "ERROR: No se ejecuto $sql. " . mysqli_error($conn);
        }
    }//fin del if contraseñas
    else{
        $error="Fallo en las credenciales.";
    }
}//fin del if SESSION    
    
// Cierra la conexion
mysqli_close($conn);
    
}//fin de los IF ISSET
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cambiar contraseña</title>
    
</head>
<body>
<div class="container">
    <div class="container-login">
        <h2><b>Cambiar Contraseña</b></h2><h2><b>Manuel murillo tiene la polla tan dura como un ladrillo</b></h2>
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" placeholder="Usuario" name="nombre" class="nombre" required>
            <input type="password" placeholder="Contraseña" name="pass" class="pass" required>
            <input type="password" placeholder="Contraseña" name="pass2" class="pass" required>
            <input type="submit" class="submit" value="Cambiar contraseña">
        </form>
        <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
    </div>
</div>
</body>
</html>
