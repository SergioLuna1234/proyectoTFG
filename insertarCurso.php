<?php
//mantenemos la sesion
session_start();

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
if(!$_SESSION["nombre_usuario"]["name"]==="admin" || !$_SESSION["nombre_usuario"]["name"]==="jefedeestudios")
{
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

  <style>
  .titulo{
    margin-left: 33%;
    color: black;
    font-weight: bold;
    margin-bottom: 50px;
  }
  table{
    margin-left: 28%;
  }

  table,tr,td,th{
    border: 3px solid lightgrey;
    font-size: 14pt;
    padding: 10px;
    background-color: #AFDDC2;
    color: black;
  }

  th{
    text-align: center;
    background-color: #519C70;
    color: white;
  }

  .tdboton{
    text-align: center;
  }


  .hidden{
    visibility: hidden;
    height: 0px;
  }

  </style>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link  href="css/miCss.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="menu.php">
          <img src="img\logoLope.png" class="logo">
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
              <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
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
            </li> -->

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
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mi perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ajustes
                </a>
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
            <!-- PHP -->
<!-- HTML -->
<div class="container">


      <form action='insertarCurso2.php' method='post'>
      <div class='tabla2'><table><tr><th class='tdboton' colspan='2'>Crear nuevo Curso</th></tr>

      <tr><td>Número de curso</td><td><select name='numero'>
          <option value='1'>1º</option>
          <option value='2'>2º</option></select></td></tr>

      <tr><td>Nombre de curso</td><td><input type='text' name='nombre'></td></tr>

      <tr><td>Enseñanza</td><td><select name='enseñanza'>
          <option value='CFGM'>Ciclo formativo de grado medio</option>
          <option value='CFGS'>Ciclo formativo de grado superior</option>
          <option value='BACHILLER'>Bachillerato</option></select></td></tr>

      <tr><td>Horario</td><td><select name='horario'>
          <option value='MAÑANA'>Mañana</option>
          <option value='TARDE'>Tarde</option></select></td></tr>

      <tr><td>Delegado</td><td><input type='text' name='delegado'></td></tr>


      <tr><td>Subdelegado</td><td><input type='text' name='subdelegado'></td></tr>
      <tr><td>Aula</td><td><select name='aula'>
      <?php
      include "php/conexion.php";
      $sqlaulas = "SELECT Id,Nombre from aulas";
      $resultadoAulas = mysqli_query($conn, $sqlaulas);
      if (mysqli_num_rows($resultadoAulas) > 0) {
          while($fila=mysqli_fetch_assoc($resultadoAulas)){
          echo "<option value='".$fila['Id']."'>".$fila['Nombre']."</option>";
          }
      }
      ?>
      </select></td></tr>

      <tr><td>Profesor</td><td><select name='profesor'>
      <?php
      include "php/conexion.php";
      $arrayProfesores = array();
       $sqlprofesores = "SELECT Id,Nombre, Apellidos from profesores";
       $resultadoprofesores = mysqli_query($conn, $sqlprofesores);
       if (mysqli_num_rows($resultadoprofesores) > 0) {
           while($fila=mysqli_fetch_assoc($resultadoprofesores)){
           array_push($arrayProfesores,$fila['Id']);
           }
       }

       $arrayTutores = array();
        $sqlprofesores = "SELECT Tutor from cursos";
        $resultadoprofesores = mysqli_query($conn, $sqlprofesores);
        if (mysqli_num_rows($resultadoprofesores) > 0) {
            while($fila=mysqli_fetch_assoc($resultadoprofesores)){
            array_push($arrayTutores,$fila['Tutor']);
            }
        }

        $arrayProfesores = array_diff($arrayProfesores, $arrayTutores);

        $arrayProfesores = array_values($arrayProfesores);

        for ($i=0; $i < count($arrayProfesores); $i++) {
          $sqlprofesores = "SELECT Id,Nombre, Apellidos from profesores WHERE Id = $arrayProfesores[$i]";
          $resultadoprofesores = mysqli_query($conn, $sqlprofesores);
          if (mysqli_num_rows($resultadoprofesores) > 0) {
              while($fila=mysqli_fetch_assoc($resultadoprofesores)){
              echo "<option value='".$fila['Id']."'>".$fila['Nombre']." ".$fila['Apellidos']."</option>";
              }
          }
        }

      ?>
      </select></td></tr>

      <tr><td colspan='2' class="tdboton"><input type="submit" value="Crear curso"></td></tr></table></div>


        <script src="js/main.js"></script>

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
