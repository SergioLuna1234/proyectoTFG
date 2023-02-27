<?php
//mantenemos la sesion
include('conexionlogueada.php');

//verificamos si la sesion se mantiene
if(isset($_SESSION['nombre_usuario']))
{
    //incluimos el tiempo para sacar al usuario a los 5 min por defecto
    include('tiempo.php');
}
else{
    //redireccionamos al index en caso de que la sesion no exista
    header("Location: index.php"); 
}  
//echo "<script> alert('".$_SESSION["nombre_usuario"]["name"]."');</script>";
if($_SESSION["nombre_usuario"]["name"]==="admin" || $_SESSION["nombre_usuario"]["name"]==="jefedeestudios")
{
    
}else{
  
    header("Location: menu.php"); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Menú</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link  href="css/miCss.css" rel="stylesheet" type="text/css">
    <link  href="css/cssHorario.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="menu.php">
          <img src="img/logoLope.png" class="logo">
        <div class="sidebar-brand-text mx-3">CES Lope de Vega</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
        <?php
        if($_SESSION["nombre_usuario"]["name"]==="admin" || $_SESSION["nombre_usuario"]["name"]==="jefedeestudios")
        {
            echo '<li class="nav-item active">';
            echo '<a class="nav-link" href="menu.php">';
            echo '<i class="fas fa-fw fa-tachometer-alt"></i>';
            echo '<span>ADMINISTRACIÓN</span></a>';
            echo '</li>';
        

            echo '<!-- Divider -->';
            echo '<hr class="sidebar-divider">';
            echo '<li class="nav-item active">';
            echo '<a class="nav-link" href="actualizarpwd.php">';
            echo '<i class="fas fa-exclamation-triangle"></i>';
            echo '<span>CAMBIAR CONTRASEÑA</span></a>';
            echo '</li>';
        

            echo '<!-- Divider -->';
            echo '<hr class="sidebar-divider">';
        }
          ?>

      <!-- NAV ITEM PROFESORES -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-chalkboard-teacher"></i>
          <span class="indice">Profesores</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="localizar.php">Localizar profesor</a>
            <a class="collapse-item" href="consultarProfesor.php">Horario profesores</a>
            <?php
            if($_SESSION["nombre_usuario"]["name"]==="admin" || $_SESSION["nombre_usuario"]["name"]==="jefedeestudios")
            {
            echo '<a class="collapse-item" href="gestionarProfesores.php">Gestionar profesores</a>';
            }
            ?>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-school"></i>
          <span class="indice">Cursos</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="horarioCursos.php">Horario cursos</a>
            <a class="collapse-item" href="gestionarCursos.php">Gestionar cursos</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-door-closed"></i>
          <span class="indice">Aulas</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="estadoAula.php">Estado aula</a>
            <a class="collapse-item" href="victor/equipamientoAulaFormulario.php">Equipamiento aula</a>
            <a class="collapse-item" href="victor/planosAulaFormulario.php">Planos PDF</a>
          </div>
        </div>
      </li>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <?php
            if($_SESSION["nombre_usuario"]["name"]==="admin" || $_SESSION["nombre_usuario"]["name"]==="jefedeestudios")
            { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-file"></i>
          <span class="indice">Horarios</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="insertar_horario.php">Insertar horario</a>
            <a class="collapse-item" href="eliminar_horario.php">Eliminar horario</a>
            
          </div>
        </div>
      </li>
        <?php }
              ?>
        
        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          <i class="fas fa-clipboard-check"></i>
          <span class="indice">Asignaturas</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="consultarAsignaturas.php">Consultar asignaturas</a>
            <?php
            if($_SESSION["nombre_usuario"]["name"]==="admin" || $_SESSION["nombre_usuario"]["name"]==="jefedeestudios")
            { ?>
            <a class="collapse-item" href="insertar_asignatura.php">Insertar asignaturas</a>
            <a class="collapse-item" href="eliminar_asignatura.php">Eliminar asignaturas</a>
            <?php }
              ?>
          </div>
        </div>
      </li>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i> -->
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-danger badge-counter"></span>
              </a> -->
              <!-- Dropdown - Alerts -->
              <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Centro de alertas
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
              </div>
            </li> -->

            <!-- Nav Item - Messages -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages -->
                <!-- <span class="badge badge-danger badge-counter"></span>
              </a> -->
              <!-- Dropdown - Messages -->
              <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Centro de mensajería
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">Leer mas mensajes</a>
              </div>
            </li> -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Mi perfil</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="perfil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mi perfil
                </a>
              <!--
                  <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ajustes
                </a>
              -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.html" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- CONTENIDO DE LA PAGINA -->
            <h1>Eliminar horario</h1>
            <br>
            <?php
           
            $aulaID=$_REQUEST['AulaID'];
            $dia=$_REQUEST['Dia'];
            $hora=$_REQUEST['Hora'];
            $cursoprofAsig=$_REQUEST['CursoProfesorAsignatura'];
            
            $sqlvariables="SELECT PROFESORES.Id as profID, AULAS.Id as aulaID, CURSOS.Id as cursoID
FROM (PROFESORES INNER JOIN (CURSOS INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof) INNER JOIN ((HORARIO INNER JOIN (AULAS INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig
WHERE (((Rel_Aula_hora_y_asig_cur.Id)=".$cursoprofAsig."))";
            
            $resultadovariables = $conn->query($sqlvariables);
            
                if ($resultadovariables->num_rows > 0) 
                {

                    $campo=mysqli_fetch_fields($resultadovariables);
                    while ($fila=$resultadovariables->fetch_assoc()) 
                    {
                        $curso=$fila['cursoID'];
                        $profID=$fila['profID'];
                        $aulaID=$fila['aulaID'];
                    }
                }
            /*echo $aulaID."<br>";
            echo $dia."<br>";
            echo $hora."<br>";
            echo $curso."<br>";
            echo $profAsig."<br>";*/
            
            $sqlaulahora = 'SELECT Rel_aula_hora.Id AS Rel_aula_hora_Id
                    FROM AULAS INNER JOIN (HORARIO INNER JOIN Rel_aula_hora ON HORARIO.Id = Rel_aula_hora.Cod_hora) ON AULAS.Id = Rel_aula_hora.Cod_Aula
                    WHERE AULAS.Id='.$aulaID.' AND HORARIO.Dia="'.$dia.'" AND HORARIO.Hora='.$hora;
                $resultadoaulahora = $conn->query($sqlaulahora);
            
                if ($resultadoaulahora->num_rows > 0) 
                {

                    $campo=mysqli_fetch_fields($resultadoaulahora);
                    while ($fila=$resultadoaulahora->fetch_assoc()) 
                    {
                        $aulahora=$fila['Rel_aula_hora_Id'];
                    }
                }
            
               
            
           // echo $aulahora;
            ?>
            
            <?php
           
            $sqleliminar ="DELETE FROM `rel_aula_hora_y_asig_cur` WHERE (rel_aula_hora_y_asig_cur.Id=".$cursoprofAsig.")";
            if ($conn->query($sqleliminar) === TRUE) {
            echo "<h3>Se ha realizado con existo</h3><br><h4>Se pueden ver los cambios en las tablas de abajo</h4><br>";
            } else {
                 
            echo "Error: " . $sql . "<br>" . $conn->error;
                
            }
            ?>
            <!-- Todas los cambios se reflejaran en los siguientes div-->
            <div id="curso">
                <?php
             
                $sqltitulocurso= 'SELECT *
                    FROM CURSOS
                    WHERE Id='.$curso;
                $resultadotitulocurso = $conn->query($sqltitulocurso);
            
                if ($resultadotitulocurso->num_rows > 0) 
                {

                    $campo=mysqli_fetch_fields($resultadotitulocurso);
                    while ($fila=$resultadotitulocurso->fetch_assoc()) 
                    {
                        echo "<center><h4>".$fila['Curso']."º ".$fila['Nombre']."</h4></center><br>";
                    }
                }
                
    include "horarioFernando/formateoHoras.php";
    include "horarioFernando/nombreProfesor.php";
    $id = $curso;
    $horas='';
    $lunes='';
    $martes='';
    $miercoles='';
    $jueves='';
    $viernes='';
    $auxhora="";


$sqlLunes ="SELECT horario.Dia, horario.Hora, asignatura.Nombre_de_la_asignatura, Rel_Prof_Asig.Cod_Prof, aulas.Nombre, Rel_Aula_hora_y_asig_cur.Id
FROM cursos INNER JOIN ((asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON cursos.Id = asignatura.Cod_curso
WHERE (((cursos.Id)=$id)) and horario.Dia = 'LUNES' ORDER BY HORARIO.Dia, HORARIO.Hora";

$resultadoLunes = mysqli_query($conn,$sqlLunes);

if (mysqli_num_rows($resultadoLunes)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoLunes))
    {
        if ($fila['Hora']!=$auxhora) {
            $lunes .="!".formateo($fila['Hora']) . "_" . $fila['Nombre_de_la_asignatura'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else{
            $lunes .="_" . $fila['Nombre_de_la_asignatura'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
        }
    }
}

//---------------------------MARTES------------------------------
$sqlMartes ="SELECT horario.Dia, horario.Hora, asignatura.Nombre_de_la_asignatura, Rel_Prof_Asig.Cod_Prof, aulas.Nombre, Rel_Aula_hora_y_asig_cur.Id
FROM cursos INNER JOIN ((asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON cursos.Id = asignatura.Cod_curso
WHERE (((cursos.Id)=$id)) and horario.Dia = 'MARTES' ORDER BY HORARIO.Dia, HORARIO.Hora";

$resultadoMartes = mysqli_query($conn,$sqlMartes);

if (mysqli_num_rows($resultadoMartes)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoMartes))
    {
        if ($fila['Hora']!=$auxhora){
            $martes.="!".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $martes.="_".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }

}

//---------------------------MIERCOLES------------------------------
$sqlMiercoles ="SELECT horario.Dia, horario.Hora, asignatura.Nombre_de_la_asignatura, Rel_Prof_Asig.Cod_Prof, aulas.Nombre, Rel_Aula_hora_y_asig_cur.Id
    FROM cursos INNER JOIN ((asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON cursos.Id = asignatura.Cod_curso
    WHERE (((cursos.Id)=$id)) and horario.Dia = 'MIERCOLES' ORDER BY HORARIO.Dia, HORARIO.Hora";

$resultadoMiercoles = mysqli_query($conn,$sqlMiercoles);

if (mysqli_num_rows($resultadoMiercoles)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoMiercoles))
    {
        if ($fila['Hora']!=$auxhora){
            $miercoles.="!".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $miercoles.="_".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }

}

//---------------------------JUEVES------------------------------
$sqlJueves ="SELECT horario.Dia, horario.Hora, asignatura.Nombre_de_la_asignatura, Rel_Prof_Asig.Cod_Prof, aulas.Nombre, Rel_Aula_hora_y_asig_cur.Id
        FROM cursos INNER JOIN ((asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON cursos.Id = asignatura.Cod_curso
        WHERE (((cursos.Id)=$id)) and horario.Dia = 'JUEVES' ORDER BY HORARIO.Dia, HORARIO.Hora";

$resultadoJueves = mysqli_query($conn,$sqlJueves);

if (mysqli_num_rows($resultadoJueves)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoJueves))
    {
        if ($fila['Hora']!=$auxhora){
            $jueves.="!".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $jueves.="_".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }
}


//---------------------------VIERNES------------------------------
$sqlViernes ="SELECT horario.Dia, horario.Hora, asignatura.Nombre_de_la_asignatura, Rel_Prof_Asig.Cod_Prof, aulas.Nombre, Rel_Aula_hora_y_asig_cur.Id
            FROM cursos INNER JOIN ((asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON cursos.Id = asignatura.Cod_curso
            WHERE (((cursos.Id)=$id)) and horario.Dia = 'VIERNES' ORDER BY HORARIO.Dia, HORARIO.Hora";

$resultadoViernes = mysqli_query($conn,$sqlViernes);

if (mysqli_num_rows($resultadoViernes)>0)
{

    while($fila=mysqli_fetch_assoc($resultadoViernes))
    {
        if ($fila['Hora']!=$auxhora){
            $viernes.="!".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $viernes.="_".$fila['Nombre_de_la_asignatura']."_"."<br>".buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }
}
//! y _ funcionan en el split
$arrayLunes = preg_split('/!/', $lunes, 0, PREG_SPLIT_NO_EMPTY);
$arrayMartes = preg_split('/!/', $martes, 0, PREG_SPLIT_NO_EMPTY);
$arrayMiercoles = preg_split('/!/', $miercoles, 0, PREG_SPLIT_NO_EMPTY);
$arrayJueves = preg_split('/!/', $jueves, 0, PREG_SPLIT_NO_EMPTY);
$arrayViernes = preg_split('/!/', $viernes, 0, PREG_SPLIT_NO_EMPTY);

for ($i=0;$i<count($arrayLunes);$i++) {$arrayLunes[$i] = preg_split('/_/', $arrayLunes[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayMartes);$i++) {$arrayMartes[$i] = preg_split('/_/', $arrayMartes[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayMiercoles);$i++) {$arrayMiercoles[$i] = preg_split('/_/', $arrayMiercoles[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayJueves);$i++) {$arrayJueves[$i] = preg_split('/_/', $arrayJueves[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayViernes);$i++) {$arrayViernes[$i] = preg_split('/_/', $arrayViernes[$i], 0, PREG_SPLIT_NO_EMPTY);}
$i=0;

$tabla="<table class='horarioCursos'><th></th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th>";

for ($i=0;$i<count($arrayLunes);$i++)
{
    $tabla.="<tr>"."<td class='horas'>" . $arrayLunes[$i][0] . "</td>";
    $tabla.="<td class='lunes'>";
    //LUNES
    for($j=1;$j<count($arrayLunes[$i]);$j++)
    {
        $tabla .= $arrayLunes[$i][$j] . "<br>";
    }$tabla.="</td>";


    //MARTES
    if ($i<count($arrayMartes)) {
        $tabla.="<td class='martes'>";
        for($j=0;$j<count($arrayMartes[$i]);$j++)
        {
            $tabla .= $arrayMartes[$i][$j] . "<br>";
        }$tabla.="</td>";}

    //MIERCOLES
    if ($i<count($arrayMiercoles)) {
        $tabla.="<td class='miercoles'>";
        for($j=0;$j<count($arrayMiercoles[$i]);$j++)
        {
            $tabla .= $arrayMiercoles[$i][$j] . "<br>";
        }$tabla.="</td>";}

    //JUEVES
    if ($i<count($arrayJueves)) {
        $tabla .= "<td class='jueves'>";
        for ($j = 0; $j < count($arrayJueves[$i]); $j++) {
            $tabla .= $arrayJueves[$i][$j] . "<br>";
        }
        $tabla .= "</td>";
    }

    //VIERNES
    if ($i<count($arrayViernes)) {
        $tabla.="<td class='viernes' style='border-right: none'>";
        for($j=0;$j<count($arrayViernes[$i]);$j++)
        {
            $tabla .= $arrayViernes[$i][$j] . "<br>";
        }$tabla.="</td>";

        $tabla.="</tr>";
    }}
$tabla.="</table>";
echo "<center><div>$tabla</div></center>";

                ?>
            </div>
                        <div id="profesor">
                <?php
                            
                
                            
                $sqltituloprofesor= 'SELECT PROFESORES.Nombre, PROFESORES.Apellidos, PROFESORES.Id as profId 
                FROM PROFESORES INNER JOIN Rel_Prof_Asig ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof 
                WHERE PROFESORES.Id='.$profID;
                $resultadotituloprofesor = $conn->query($sqltituloprofesor);
            
                if ($resultadotituloprofesor->num_rows > 0) 
                {

                    $campo=mysqli_fetch_fields($resultadotituloprofesor);
                    while ($fila=$resultadotituloprofesor->fetch_assoc()) 
                    {
                        echo "<br><center><h4>".$fila['Nombre']." ".$fila['Apellidos']."</h4></center><br>";
                        $idabuscar= $fila['profId'];
                        break;
                    }
                }
 
   
                $dias=[];
                $horas=[];
                $n_asignatura=[];
                $cod_prof=[];
                $n_curso=[];
                $g_curso=[];
                $id=[];
               
                $sqlLunes="SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre, PROFESORES.Id FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal) INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON (Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula)) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE (((PROFESORES.Id)=".$idabuscar.")) and horario.Dia = 'LUNES' ORDER BY HORARIO.Dia, HORARIO.Hora;";

                $auxcurso="";
                $auxnombre="";
                $auxhora=0;
                $resultadoLunes = mysqli_query($conn,$sqlLunes);

                if (mysqli_num_rows($resultadoLunes)>0)
                {
                    while($fila=mysqli_fetch_assoc($resultadoLunes))
                    {
                        if($fila['Hora']!=$auxhora){
                            array_push($horas, $fila['Hora']);
                            array_push($dias, $fila['Dia']);
                            array_push($n_asignatura, $fila['Nombre_de_la_asignatura']);
                            array_push($cod_prof, $fila['Id']);
                            array_push($g_curso, $fila['Curso']);
                            array_push($n_curso, $fila['Nombre']);
                            array_push($id, $fila['Id']);
                            $auxhora=$fila['Hora'];
                        }
                        else{
                            $auxcurso=$fila['Curso'];
                            $g_curso[count($horas)-1].="/".$auxcurso;
                            $auxnombre=$fila['Nombre'];
                            $n_curso[count($horas)-1].="/".$auxnombre;
                        }
                    }
                }
                $auxhora=0;
                $sqlMartes="SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre, PROFESORES.Id FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal) INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON (Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula)) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE (((PROFESORES.Id)=$idabuscar)) and horario.Dia = 'MARTES' ORDER BY HORARIO.Dia, HORARIO.Hora";

                $resultadoMartes = mysqli_query($conn,$sqlMartes);

                if (mysqli_num_rows($resultadoMartes)>0)
                {
                    while($fila=mysqli_fetch_assoc($resultadoMartes))
                    {
                        if($fila['Hora']!=$auxhora){
                            array_push($horas, $fila['Hora']);
                            array_push($dias, $fila['Dia']);
                            array_push($n_asignatura, $fila['Nombre_de_la_asignatura']);
                            array_push($cod_prof, $fila['Id']);
                            array_push($g_curso, $fila['Curso']);
                            array_push($n_curso, $fila['Nombre']);
                            array_push($id, $fila['Id']);
                            $auxhora=$fila['Hora'];
                        }
                        else{
                            $auxcurso=$fila['Curso'];
                            $g_curso[count($horas)-1].="/".$auxcurso;
                            $auxnombre=$fila['Nombre'];
                            $n_curso[count($horas)-1].="/".$auxnombre;
                        }
                    }
                }
                $auxhora=0;
                $sqlMiercoles="SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre, PROFESORES.Id FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal) INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON (Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula)) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE (((PROFESORES.Id)=$idabuscar)) and horario.Dia = 'MIERCOLES' ORDER BY HORARIO.Dia, HORARIO.Hora";

                $resultadoMiercoles = mysqli_query($conn,$sqlMiercoles);

                if (mysqli_num_rows($resultadoMiercoles)>0)
                {
                    while($fila=mysqli_fetch_assoc($resultadoMiercoles))
                    {
                        if($fila['Hora']!=$auxhora){
                            array_push($horas, $fila['Hora']);
                            array_push($dias, $fila['Dia']);
                            array_push($n_asignatura, $fila['Nombre_de_la_asignatura']);
                            array_push($cod_prof, $fila['Id']);
                            array_push($g_curso, $fila['Curso']);
                            array_push($n_curso, $fila['Nombre']);
                            array_push($id, $fila['Id']);
                            $auxhora=$fila['Hora'];
                        }
                        else{
                            $auxcurso=$fila['Curso'];
                            $g_curso[count($horas)-1].="/".$auxcurso;
                            $auxnombre=$fila['Nombre'];
                            $n_curso[count($horas)-1].="/".$auxnombre;
                        }
                    }
                }
                $auxhora=0;
                $sqlJueves="SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre, PROFESORES.Id FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal) INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON (Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula)) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE (((PROFESORES.Id)=$idabuscar)) and horario.Dia = 'JUEVES' ORDER BY HORARIO.Dia, HORARIO.Hora";

                $resultadoJueves = mysqli_query($conn,$sqlJueves);

                if (mysqli_num_rows($resultadoJueves)>0)
                {
                    while($fila=mysqli_fetch_assoc($resultadoJueves))
                    {
                        if($fila['Hora']==$auxhora){
                            $auxcurso=$fila['Curso'];
                            $g_curso[count($horas)-1].="/".$auxcurso;
                            $auxnombre=$fila['Nombre'];
                            $n_curso[count($horas)-1].="/".$auxnombre;}
                        else{
                            array_push($horas, $fila['Hora']);
                            array_push($dias, $fila['Dia']);
                            array_push($n_asignatura, $fila['Nombre_de_la_asignatura']);
                            array_push($cod_prof, $fila['Id']);
                            array_push($g_curso, $fila['Curso']);
                            array_push($n_curso, $fila['Nombre']);
                            array_push($id, $fila['Id']);
                            $auxhora=$fila['Hora'];
                        }
                    }
                }
                $auxhora=0;
                $sqlViernes="SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre, PROFESORES.Id FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal) INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON (Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula)) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE (((PROFESORES.Id)=$idabuscar)) and horario.Dia = 'VIERNES' ORDER BY HORARIO.Dia, HORARIO.Hora";

                $resultadoViernes = mysqli_query($conn,$sqlViernes);

                if (mysqli_num_rows($resultadoViernes)>0)
                {
                    while($fila=mysqli_fetch_assoc($resultadoViernes))
                    {
                        if($fila['Hora']==$auxhora){
                            $auxcurso=$fila['Curso'];
                            $g_curso[count($horas)-1].="/".$auxcurso;
                            $auxnombre=$fila['Nombre'];
                            $n_curso[count($horas)-1].="/".$auxnombre;
                        }
                        else{
                            array_push($horas, $fila['Hora']);
                            array_push($dias, $fila['Dia']);
                            array_push($n_asignatura, $fila['Nombre_de_la_asignatura']);
                            array_push($cod_prof, $fila['Id']);
                            array_push($g_curso, $fila['Curso']);
                            array_push($n_curso, $fila['Nombre']);
                            array_push($id, $fila['Id']);
                            $auxhora=$fila['Hora'];
                        }
                    }
                }
                $tabla="<center><table>";
                $stringlinea1="<tr><th></th><th>LUNES</th><th>MARTES</th><th>MIERCOLES</th><th>JUEVES</th><th>VIERNES</th>";
                $stringlinea2="<tr><td>8:00 - 9:00</td>";
                $stringlinea3="<tr><td>9:00 - 10:00</td>";
                $stringlinea4="<tr><td>10:00 - 11:00</td>";
                $stringlinea5="<tr><td>11:30 - 12:30</td>";
                $stringlinea6="<tr><td>12:30 - 13:30</td>";
                $stringlinea7="<tr><td>13:30 - 14:30</td>";
                $stringlinea8="<tr><td>15:15 - 16:10</td>";
                $stringlinea9="<tr><td>16:10 - 17:00</td>";
                $stringlinea10="<tr><td>17:00 - 17:55</td>";
                $stringlinea11="<tr><td>18:15 - 19:10</td>";
                $stringlinea12="<tr><td>19:10 - 20:05</td>";
                $stringlinea13="<tr><td>20:05 - 21:00</td>";


                $lunes=[false,false,false,false,false,false,false,false,false,false,false,false];
                $martes=[false,false,false,false,false,false,false,false,false,false,false,false];
                $miercoles=[false,false,false,false,false,false,false,false,false,false,false,false];
                $jueves=[false,false,false,false,false,false,false,false,false,false,false,false];
                $viernes=[false,false,false,false,false,false,false,false,false,false,false,false];
                $dia=false;
                $tarde=false;


                for($i=0;$i<count($dias);$i++){
                    if($dias[$i]=="LUNES"){
                        switch($horas[$i])
                        {
                            case 1:{
                                $stringlinea2.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[0]=true;
                                $dia=true;
                                break;
                            }
                            case 2:{
                                $stringlinea3.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[1]=true;
                                $dia=true;
                                break;
                            }
                            case 3:{
                                $stringlinea4.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[2]=true;
                                $dia=true;
                                break;
                            }
                            case 4:{
                                $stringlinea5.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[3]=true;
                                $dia=true;
                                break;
                            }
                            case 5:{
                                $stringlinea6.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[4]=true;
                                $dia=true;
                                break;
                            }
                            case 6:{
                                $stringlinea7.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[5]=true;
                                $dia=true;
                                break;
                            }
                            case 7:{
                                $stringlinea8.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[6]=true;
                                $tarde=true;
                                break;
                            }
                            case 8:{
                                $stringlinea9.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[7]=true;
                                $tarde=true;
                                break;
                            }
                            case 9:{
                                $stringlinea10.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[8]=true;
                                $tarde=true;
                                break;
                            }
                            case 10:{
                                $stringlinea11.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[9]=true;
                                $tarde=true;
                                break;
                            }
                            case 11:{
                                $stringlinea12.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[10]=true;
                                $tarde=true;
                                break;
                            }
                            case 12:{
                                $stringlinea13.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $lunes[11]=true;
                                $tarde=true;
                                break;
                            }
                        }
                    }
                    else if($dias[$i]=="MARTES"){
                        for($j=1;$j<=12;$j++){
                            if(!$lunes[$j-1]){
                                switch($j){
                                    case 1:{
                                        $stringlinea2.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 2:{
                                        $stringlinea3.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 3:{
                                        $stringlinea4.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 4:{
                                        $stringlinea5.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 5:{
                                        $stringlinea6.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 6:{
                                        $stringlinea7.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 7:{
                                        $stringlinea8.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 8:{
                                        $stringlinea9.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 9:{
                                        $stringlinea10.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 10:{
                                        $stringlinea11.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 11:{
                                        $stringlinea12.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                    case 12:{
                                        $stringlinea13.="<td></td>";
                                        $lunes[$j-1]=true;
                                        break;
                                    }
                                }
                            }
                        }
                        switch($horas[$i])
                        {
                            case 1:{
                                $stringlinea2.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[0]=true;
                                $dia=true;
                                break;
                            }
                            case 2:{
                                $stringlinea3.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[1]=true;
                                $dia=true;
                                break;
                            }
                            case 3:{
                                $stringlinea4.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[2]=true;
                                $dia=true;
                                break;
                            }
                            case 4:{
                                $stringlinea5.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[3]=true;
                                $dia=true;
                                break;
                            }
                            case 5:{
                                $stringlinea6.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[4]=true;
                                $dia=true;
                                break;
                            }
                            case 6:{
                                $stringlinea7.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[5]=true;
                                $dia=true;
                                break;
                            }
                            case 7:{
                                $stringlinea8.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[6]=true;
                                $tarde=true;
                                break;
                            }
                            case 8:{
                                $stringlinea9.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[7]=true;
                                $tarde=true;
                                break;
                            }
                            case 9:{
                                $stringlinea10.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[8]=true;
                                $tarde=true;
                                break;
                            }
                            case 10:{
                                $stringlinea11.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[9]=true;
                                $tarde=true;
                                break;
                            }
                            case 11:{
                                $stringlinea12.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[10]=true;
                                $tarde=true;
                                break;
                            }
                            case 12:{
                                $stringlinea13.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $martes[11]=true;
                                $tarde=true;
                                break;
                            }
                        }
                    }
                    else if($dias[$i]=="MIERCOLES"){
                        for($j=1;$j<=12;$j++){
                            if(!$martes[$j-1]){
                                switch($j){
                                    case 1:{
                                        $stringlinea2.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 2:{
                                        $stringlinea3.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 3:{
                                        $stringlinea4.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 4:{
                                        $stringlinea5.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 5:{
                                        $stringlinea6.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 6:{
                                        $stringlinea7.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 7:{
                                        $stringlinea8.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 8:{
                                        $stringlinea9.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 9:{
                                        $stringlinea10.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 10:{
                                        $stringlinea11.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 11:{
                                        $stringlinea12.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                    case 12:{
                                        $stringlinea13.="<td></td>";
                                        $martes[$j-1]=true;
                                        break;
                                    }
                                }
                            }
                        }
                        switch($horas[$i])
                        {
                            case 1:{
                                $stringlinea2.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[0]=true;
                                $dia=true;
                                break;
                            }
                            case 2:{
                                $stringlinea3.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[1]=true;
                                $dia=true;
                                break;
                            }
                            case 3:{
                                $stringlinea4.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[2]=true;
                                $dia=true;
                                break;
                            }
                            case 4:{
                                $stringlinea5.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[3]=true;
                                $dia=true;
                                break;
                            }
                            case 5:{
                                $stringlinea6.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[4]=true;
                                $dia=true;
                                break;
                            }
                            case 6:{
                                $stringlinea7.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[5]=true;
                                $dia=true;
                                break;
                            }
                            case 7:{
                                $stringlinea8.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[6]=true;
                                $tarde=true;
                                break;
                            }
                            case 8:{
                                $stringlinea9.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[7]=true;
                                $tarde=true;
                                break;
                            }
                            case 9:{
                                $stringlinea10.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[8]=true;
                                $tarde=true;
                                break;
                            }
                            case 10:{
                                $stringlinea11.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[9]=true;
                                $tarde=true;
                                break;
                            }
                            case 11:{
                                $stringlinea12.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[10]=true;
                                $tarde=true;
                                break;
                            }
                            case 12:{
                                $stringlinea13.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $miercoles[11]=true;
                                $tarde=true;
                                break;
                            }
                        }
                    }
                    else if($dias[$i]=="JUEVES"){
                        for($j=1;$j<=12;$j++){
                            if(!$miercoles[$j-1]){
                                switch($j){
                                    case 1:{
                                        $stringlinea2.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 2:{
                                        $stringlinea3.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 3:{
                                        $stringlinea4.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 4:{
                                        $stringlinea5.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 5:{
                                        $stringlinea6.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 6:{
                                        $stringlinea7.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 7:{
                                        $stringlinea8.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 8:{
                                        $stringlinea9.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 9:{
                                        $stringlinea10.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 10:{
                                        $stringlinea11.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 11:{
                                        $stringlinea12.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                    case 12:{
                                        $stringlinea13.="<td></td>";
                                        $miercoles[$j-1]=true;
                                        break;
                                    }
                                }
                            }
                        }
                        switch($horas[$i])
                        {
                            case 1:{
                                $stringlinea2.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[0]=true;
                                $dia=true;
                                break;
                            }
                            case 2:{
                                $stringlinea3.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[1]=true;
                                $dia=true;
                                break;
                            }
                            case 3:{
                                $stringlinea4.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[2]=true;
                                $dia=true;
                                break;
                            }
                            case 4:{
                                $stringlinea5.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[3]=true;
                                $dia=true;
                                break;
                            }
                            case 5:{
                                $stringlinea6.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[4]=true;
                                $dia=true;
                                break;
                            }
                            case 6:{
                                $stringlinea7.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[5]=true;
                                $dia=true;
                                break;
                            }
                            case 7:{
                                $stringlinea8.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[6]=true;
                                $tarde=true;
                                break;
                            }
                            case 8:{
                                $stringlinea9.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[7]=true;
                                $tarde=true;
                                break;
                            }
                            case 9:{
                                $stringlinea10.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[8]=true;
                                $tarde=true;
                                break;
                            }
                            case 10:{
                                $stringlinea11.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[9]=true;
                                $tarde=true;
                                break;
                            }
                            case 11:{
                                $stringlinea12.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[10]=true;
                                $tarde=true;
                                break;
                            }
                            case 12:{
                                $stringlinea13.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $jueves[11]=true;
                                $tarde=true;
                                break;
                            }
                        }
                    }
                    else if($dias[$i]=="VIERNES"){
                        for($j=1;$j<=12;$j++){
                            if(!$jueves[$j-1]){
                                switch($j){
                                    case 1:{
                                        $stringlinea2.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 2:{
                                        $stringlinea3.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 3:{
                                        $stringlinea4.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 4:{
                                        $stringlinea5.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 5:{
                                        $stringlinea6.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 6:{
                                        $stringlinea7.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 7:{
                                        $stringlinea8.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 8:{
                                        $stringlinea9.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 9:{
                                        $stringlinea10.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 10:{
                                        $stringlinea11.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 11:{
                                        $stringlinea12.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                    case 12:{
                                        $stringlinea13.="<td></td>";
                                        $jueves[$j-1]=true;
                                        break;
                                    }
                                }
                            }
                        }
                        switch($horas[$i])
                        {
                            case 1:{
                                $stringlinea2.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[0]=true;
                                $dia=true;
                                break;
                            }
                            case 2:{
                                $stringlinea3.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[1]=true;
                                $dia=true;
                                break;
                            }
                            case 3:{
                                $stringlinea4.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[2]=true;
                                $dia=true;
                                break;
                            }
                            case 4:{
                                $stringlinea5.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[3]=true;
                                $dia=true;
                                break;
                            }
                            case 5:{
                                $stringlinea6.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[4]=true;
                                $dia=true;
                                break;
                            }
                            case 6:{
                                $stringlinea7.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[5]=true;
                                $dia=true;
                                break;
                            }
                            case 7:{
                                $stringlinea8.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[6]=true;
                                $tarde=true;
                                break;
                            }
                            case 8:{
                                $stringlinea9.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[7]=true;
                                $tarde=true;
                                break;
                            }
                            case 9:{
                                $stringlinea10.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[8]=true;
                                $tarde=true;
                                break;
                            }
                            case 10:{
                                $stringlinea11.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[9]=true;
                                $tarde=true;
                                break;
                            }
                            case 11:{
                                $stringlinea12.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[10]=true;
                                $tarde=true;
                                break;
                            }
                            case 12:{
                                $stringlinea13.="<td>$n_asignatura[$i] $g_curso[$i]$n_curso[$i]</td>";
                                $viernes[11]=true;
                                $tarde=true;
                                break;
                            }
                        }
                    }
                }
                for($j=1;$j<=12;$j++){
                    if(!$viernes[$j-1]){
                        switch($j){
                            case 1:{
                                $stringlinea2.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 2:{
                                $stringlinea3.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 3:{
                                $stringlinea4.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 4:{
                                $stringlinea5.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 5:{
                                $stringlinea6.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 6:{
                                $stringlinea7.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 7:{
                                $stringlinea8.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 8:{
                                $stringlinea9.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 9:{
                                $stringlinea10.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 10:{
                                $stringlinea11.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 11:{
                                $stringlinea12.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                            case 12:{
                                $stringlinea13.="<td></td>";
                                $viernes[$j-1]=true;
                                break;
                            }
                        }
                    }
                }
                $tabla.=$stringlinea1;
                $tabla.="</tr>";
                if($dia)
                {
                    $tabla.=$stringlinea2;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea3;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea4;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea5;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea6;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea7;
                    $tabla.="</tr>";
                }
                if($tarde)
                {
                    $tabla.=$stringlinea8;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea9;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea10;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea11;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea12;
                    $tabla.="</tr>";
                    $tabla.=$stringlinea13;
                    $tabla.="</tr>";
                }
                $tabla.="</table></center>";
                echo $tabla;

                ?>
            </div>
            
            <div id="aula">
            <?php
                
                
                $sqltituloaula= 'SELECT Id,Nombre
                FROM aulas 
                WHERE Id='.$aulaID;
                $resultadotituloaula = $conn->query($sqltituloaula);
            
                if ($resultadotituloaula->num_rows > 0) 
                {

                    $campo=mysqli_fetch_fields($resultadotituloaula);
                    while ($fila=$resultadotituloaula->fetch_assoc()) 
                    {
                        echo "<br><center><h4>".$fila['Nombre']."</h4></center><br>";
                        
                    }
                }
 
$horas='';
$lunes='';
$martes='';
$miercoles='';
$jueves='';
$viernes='';
$auxhora="";  





                $id=$aulaID;
$sqlLunes ="SELECT horario.Dia, horario.Hora,PROFESORES.Id as Cod_Prof, Rel_Aula_hora_y_asig_cur.Id, cursos.Curso, cursos.Nombre as nombreCurso
FROM PROFESORES INNER JOIN ((cursos INNER JOIN (asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) ON cursos.Id = asignatura.Cod_curso) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE (((horario.Dia)='LUNES') AND ((aulas.Id)=".$id."))
ORDER BY horario.Dia, horario.Hora;";

$resultadoLunes = mysqli_query($conn,$sqlLunes);

if (mysqli_num_rows($resultadoLunes)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoLunes))
    {
        if ($fila['Hora']!=$auxhora) {
            $lunes .="!".formateo($fila['Hora']) . "_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else{
            $lunes .="_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
        }
    }
}

//---------------------------MARTES------------------------------
$sqlMartes ="SELECT horario.Dia, horario.Hora,PROFESORES.Id as Cod_Prof, Rel_Aula_hora_y_asig_cur.Id, cursos.Curso, cursos.Nombre as nombreCurso
FROM PROFESORES INNER JOIN ((cursos INNER JOIN (asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) ON cursos.Id = asignatura.Cod_curso) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE (((horario.Dia)='MARTES') AND ((aulas.Id)=".$id."))
ORDER BY horario.Dia, horario.Hora;";

$resultadoMartes = mysqli_query($conn,$sqlMartes);

if (mysqli_num_rows($resultadoMartes)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoMartes))
    {
        if ($fila['Hora']!=$auxhora){
            $martes.="!". "_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $martes.="_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }

}

//---------------------------MIERCOLES------------------------------
$sqlMiercoles ="SELECT horario.Dia, horario.Hora,PROFESORES.Id as Cod_Prof, Rel_Aula_hora_y_asig_cur.Id, cursos.Curso, cursos.Nombre as nombreCurso
FROM PROFESORES INNER JOIN ((cursos INNER JOIN (asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) ON cursos.Id = asignatura.Cod_curso) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE (((horario.Dia)='MIERCOLES') AND ((aulas.Id)=".$id."))
ORDER BY horario.Dia, horario.Hora;";

$resultadoMiercoles = mysqli_query($conn,$sqlMiercoles);

if (mysqli_num_rows($resultadoMiercoles)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoMiercoles))
    {
        if ($fila['Hora']!=$auxhora){
            $miercoles.="!". "_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $miercoles.="_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }

}

//---------------------------JUEVES------------------------------
$sqlJueves ="SELECT horario.Dia, horario.Hora,PROFESORES.Id as Cod_Prof, Rel_Aula_hora_y_asig_cur.Id, cursos.Curso, cursos.Nombre as nombreCurso
FROM PROFESORES INNER JOIN ((cursos INNER JOIN (asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) ON cursos.Id = asignatura.Cod_curso) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE (((horario.Dia)='JUEVES') AND ((aulas.Id)=".$id."))
ORDER BY horario.Dia, horario.Hora;";

$resultadoJueves = mysqli_query($conn,$sqlJueves);

if (mysqli_num_rows($resultadoJueves)>0)
{
    while($fila=mysqli_fetch_assoc($resultadoJueves))
    {
        if ($fila['Hora']!=$auxhora){
            $jueves.="!". "_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $jueves.="_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }
}


//---------------------------VIERNES------------------------------
$sqlViernes ="SELECT horario.Dia, horario.Hora,PROFESORES.Id as Cod_Prof, Rel_Aula_hora_y_asig_cur.Id, cursos.Curso, cursos.Nombre as nombreCurso
FROM PROFESORES INNER JOIN ((cursos INNER JOIN (asignatura INNER JOIN Rel_Prof_Asig ON asignatura.Id = Rel_Prof_Asig.Cod_Asig) ON cursos.Id = asignatura.Cod_curso) INNER JOIN ((horario INNER JOIN (aulas INNER JOIN Rel_aula_hora ON aulas.Id = Rel_aula_hora.Cod_Aula) ON horario.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE (((horario.Dia)='VIERNES') AND ((aulas.Id)=".$id."))
ORDER BY horario.Dia, horario.Hora;";

$resultadoViernes = mysqli_query($conn,$sqlViernes);

if (mysqli_num_rows($resultadoViernes)>0)
{

    while($fila=mysqli_fetch_assoc($resultadoViernes))
    {
        if ($fila['Hora']!=$auxhora){
            $viernes.="!". "_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
        else
        {
            $viernes.="_" . $fila['Curso'].$fila['nombreCurso'] . "_" . "<br>" . buscarNombre($fila['Cod_Prof']);
            $auxhora = $fila['Hora'];
        }
    }
}
//! y _ funcionan en el split
$arrayLunes = preg_split('/!/', $lunes, 0, PREG_SPLIT_NO_EMPTY);
$arrayMartes = preg_split('/!/', $martes, 0, PREG_SPLIT_NO_EMPTY);
$arrayMiercoles = preg_split('/!/', $miercoles, 0, PREG_SPLIT_NO_EMPTY);
$arrayJueves = preg_split('/!/', $jueves, 0, PREG_SPLIT_NO_EMPTY);
$arrayViernes = preg_split('/!/', $viernes, 0, PREG_SPLIT_NO_EMPTY);

for ($i=0;$i<count($arrayLunes);$i++) {$arrayLunes[$i] = preg_split('/_/', $arrayLunes[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayMartes);$i++) {$arrayMartes[$i] = preg_split('/_/', $arrayMartes[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayMiercoles);$i++) {$arrayMiercoles[$i] = preg_split('/_/', $arrayMiercoles[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayJueves);$i++) {$arrayJueves[$i] = preg_split('/_/', $arrayJueves[$i], 0, PREG_SPLIT_NO_EMPTY);}
for ($i=0;$i<count($arrayViernes);$i++) {$arrayViernes[$i] = preg_split('/_/', $arrayViernes[$i], 0, PREG_SPLIT_NO_EMPTY);}
$i=0;

$tabla="<table class='horarioCursos'><th></th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th>";

for ($i=0;$i<count($arrayLunes);$i++)
{
    $tabla.="<tr>"."<td class='horas'>" . $arrayLunes[$i][0] . "</td>";
    $tabla.="<td class='lunes'>";
    //LUNES
    for($j=1;$j<count($arrayLunes[$i]);$j++)
    {
        $tabla .= $arrayLunes[$i][$j] . "<br>";
    }$tabla.="</td>";


    //MARTES
    if ($i<count($arrayMartes)) {
        $tabla.="<td class='martes'>";
        for($j=0;$j<count($arrayMartes[$i]);$j++)
        {
            $tabla .= $arrayMartes[$i][$j] . "<br>";
        }$tabla.="</td>";}

    //MIERCOLES
    if ($i<count($arrayMiercoles)) {
        $tabla.="<td class='miercoles'>";
        for($j=0;$j<count($arrayMiercoles[$i]);$j++)
        {
            $tabla .= $arrayMiercoles[$i][$j] . "<br>";
        }$tabla.="</td>";}

    //JUEVES
    if ($i<count($arrayJueves)) {
        $tabla .= "<td class='jueves'>";
        for ($j = 0; $j < count($arrayJueves[$i]); $j++) {
            $tabla .= $arrayJueves[$i][$j] . "<br>";
        }
        $tabla .= "</td>";
    }

    //VIERNES
    if ($i<count($arrayViernes)) {
        $tabla.="<td class='viernes' style='border-right: none'>";
        for($j=0;$j<count($arrayViernes[$i]);$j++)
        {
            $tabla .= $arrayViernes[$i][$j] . "<br>";
        }$tabla.="</td>";

        $tabla.="</tr>";
    }}
$tabla.="</table>";
echo "<div><center>".$tabla."</center></div>";
?>
                
                
                ?>
            </div>
    
          </div>
          
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Primera promoción D.A.M. &copy; <i>2018-2020</i></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Quieres cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pulsa "Cerrar sesión" abajo is estás listo para terminar la sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="logout.php">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>