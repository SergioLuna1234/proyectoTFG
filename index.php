<?php
//recogemos lo valores de los campos....
if(isset($_POST['nombre']) && isset($_POST['pass'])){

    //duracion de la sesion del usuario, minutos * segundos
    $duration=15*60;  

    //requerimos la conexion PHP
    require('conexion.php');

    //inicio de sesion con los valores introducidos
    session_start();

    //si existe la sesion del ususario lo mandamos al menu
    if(isset($_SESSION["nombre_usuario"]))
    {
            header("Location: menu.php");
    }

    //si los valores no son vacios
    if(!empty($_POST))
    {
        //variable error, contendra el mensaje de error
        $error = '';

        //si el usuario no es admin o jefe de estudios
        if($usuario!="admin" && $usuario!="jefedeestudios")
        {
            //guardamos la consulta y guardamos el resultado
            $sql="SELECT usuario, contrasena FROM profesores WHERE usuario = '$usuario'";
            $result=$conn->query($sql);

            //contamos el numero de filas
            $rows = $result->num_rows;

            //recogemos la fila del resultado
            $row = $result->fetch_assoc();

            //guardamos en validacion la evaluacion de las contraseñas
            //devolvera 0 si las contraseñas con coinciden, y 1 en caso contrario
            $validacion=password_verify($password, $row['contrasena']);
                
            //si el resultado es positivo, es decir, ha encontrado una coincidencia
            if($rows > 0 && $validacion == 1) 
            {
                //creamos una sesion con el nombre del usuario
                $_SESSION['nombre_usuario'] = array (
                    "start"=>time(), //contador de segundos de sesion iniciada
                    "duration"=>$duration, //lo que va a durar la sesion
                    "name"=>$row['usuario'] //nombre del usuario
                    );
                
                //enviamos al usuario a la pagina principal
                header("location: menu.php");

                } 
                else {
                    $error = "El nombre o contraseña son incorrectos";
                }
            }//fin del if profesores
            else if($usuario=="jefedeestudios" || $usuario=="admin")
            {
                require('conexion_mysql.php');

                //consulta guardada
                $sql = "SELECT Password,User FROM mysql.user WHERE User = '$user'";

                //la ejecutamos y guardamos el resultado
                $result=$connec->query($sql);
                $rows = $result->num_rows;

                //si el resultado es positivo, es decir, ha encontrado una coincidencia
                if($rows > 0) 
                {
                    //recogemos la fila del resultado
                    $row = $result->fetch_assoc();

                    //sesion del usuario
                    $_SESSION['nombre_usuario'] = array (
                        "start"=>time(), //contador de segundos de sesion iniciada
                        "duration"=>$duration, //lo que va a durar la sesion
                        "name"=>$row['User'] //nombre del usuario
                    );

                    //cerramos la conexion con la base de datos de mysql
                    mysqli_close($connec);

                    //mandamos al usuario al menu
                    header("location: menu.php");
                }  
                else {
                    $error = "El nombre o contrasena son incorrectos";
                }
            }//fin del else admin y jefedeestudios 
    }//fin del empty POST
}//fin del if POST doble
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="css/cssIndex.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <style>
        /* Contenedor del PoPUP */
        .popup {
          position: relative;
          display: inline-block;
          cursor: pointer;
        }

        /* Lo que vamos a ver cuando salte el po-pup */
        .popup .popuptext {
          visibility: hidden;
          width: 375px;
          background-color: #555;
          color: #fff;
          text-align: center;
          border-radius: 6px;
          padding: 8px 0;
          position: absolute;
          z-index: 1;
          bottom: 125%;
          left: 50%;
          margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
          content: "";
          position: absolute;
          top: 100%;
          left: 50%;
          margin-left: -5px;
          border-width: 5px;
          border-style: solid;
          border-color: #555 transparent transparent transparent;
        }

        /* Para mostrar y esconder el poPUP */
        .popup .show {
          visibility: visible;
          -webkit-animation: fadeIn 1s;
          animation: fadeIn 1s
        }

        /* animacion del poPUP */
        @-webkit-keyframes fadeIn {
          from {opacity: 0;}
          to {opacity: 1;}
        }

        @keyframes fadeIn {
          from {opacity: 0;}
          to {opacity:1 ;}
        }
    </style>
    <script>
    // Funcion para ejecutar el poPUP
    function AbrirPoPup() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }
    </script>
</head>
<body>
<div class="container">
    <div class="container-login">
        <h2><b>Iniciar sesión</b></h2>
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" placeholder="Usuario" name="nombre" class="nombre" required>
            <input type="password" placeholder="Contraseña" name="pass" class="pass" required>
            <input type="submit" class="submit" value="INICIAR SESIÓN">
        </form>
        <div class="popup" onclick="AbrirPoPup()">¿Olvidaste tu contraseña?
            <span class="popuptext" id="myPopup">Debe comunicarselo a jefatura o al admin de la web</span>
        </div>
        <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
    </div>
</div>
</body>
</html>
