<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script>
        function mostrarProf(resultado, opcion) {
            switch(opcion){
                case 1:{
                    nombre=resultado;
                    if(document.getElementById("profape").value==""){
                        apellido="~";
                    }
                    else{
                        apellido=document.getElementById("profape").value;
                    }
                    if(document.getElementById("profdep").value==""){
                        departamento="~";
                    }
                    else{
                        departamento=document.getElementById("profdep").value;
                    }
                    break;
                }
                case 2:{
                    apellido=resultado;
                    if(document.getElementById("profnom").value==""){
                        nombre="~";
                    }
                    else{
                        nombre=document.getElementById("profnom").value;
                    }
                    if(document.getElementById("profdep").value==""){
                        departamento="~";
                    }
                    else{
                        departamento=document.getElementById("profdep").value;
                    }
                    break;
                }
                case 3:{
                    departamento=resultado;
                    if(document.getElementById("profape").value==""){
                        apellido="~";
                    }
                    else{
                        apellido=document.getElementById("profape").value;
                    }
                    if(document.getElementById("profnom").value==""){
                        nombre="~";
                    }
                    else{
                        departamento=document.getElementById("profnom").value;
                    }
                    break;
                }
            }
            nombre+=" ";
            apellido+=" ";
            departamento+=" ";
            if (resultado=="") {
                document.getElementById("prof").innerHTML="";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp=new XMLHttpRequest();
            } else {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("prof").innerHTML="";
                    document.getElementById("prof").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","busquedaprofajax.php?respuesta="+nombre+apellido+departamento,true);
            xmlhttp.send();
        }
        function enviarValor(idprof){
            document.getElementById("ID").value=idprof;
            document.busqueda.submit();

        }
        <?php
        include "../horarioFernando/conexionBBDD.php";
        $sql="select Id, Nombre_del_departamento from departamento";
        $resultado=$conn->query($sql);
        ?>
    </script>
    <title>Horario Profesor</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link  href="../css/miCss.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.html">
            <img src="../img/logoLope.png" class="logo">
            <div class="sidebar-brand-text mx-3">CES Lope de Vega</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="menu.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>ADMINISTRACI??N</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- NAV ITEM PROFESORES -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="indice">Profesores</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="../localizar.php">Localizar profesor</a>
                    <a class="collapse-item" href="../consultarProfesor.php">Horario profesores</a>
                    <a class="collapse-item" href="../consultarProfesor.php">Gestionar profesores</a>
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
                    <a class="collapse-item" href="../horarioCursos.php">Horario cursos</a>
                    <a class="collapse-item" href="../gestionarCursos.php">Gestionar cursos</a>
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
                    <a class="collapse-item" href="#">Horario aulas</a>
                    <a class="collapse-item" href="#">Gestionar aulas</a>
                    <a class="collapse-item" href="#">Localizar aula</a>
                    <a class="collapse-item" href="../estadoAula.php">Estado aula</a>
                    <a class="collapse-item" href="../victor/equipamientoAulaFormulario.php">Equipamiento aula</a>
                    <a class="collapse-item" href="../victor/planosAulaFormulario.php">Planos PDF</a>
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
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

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
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter"></span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Centro de alertas
                            </h6>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las alertas</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter"></span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Centro de mensajer??a
                            </h6>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Leer mas mensajes</a>
                        </div>
                    </li>

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
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar sesi??n
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- CONTENIDO DE LA PAGINA -->
                <form action="horarioProf.php" method=post name="busqueda">
                    <input type="hidden" id="ID" name="ID" value="valor">
                </form>
                <table>
                    <form>
                        <tr><th colspan="2">Escribe el profesor que quieras buscar:</th></tr>
                        <tr><td>Nombre: </td><td><input type="text" name="profnom" id="profnom" onkeyUp="mostrarProf(this.value, 1)"></td></tr>
                        <tr><td>Apellido: </td><td><input type="text" name="profape" id="profape" onkeyUp="mostrarProf(this.value, 2)"></td></tr>
                        <tr><td>Departamento: </td>
                            <td><select name="profdep" id="profdep" onchange="mostrarProf(this.value, 3)">
                                    <?php
                                    while($fila=mysqli_fetch_assoc($resultado)){
                                        echo "<option value=".$fila['Id'].">".$fila['Nombre_del_departamento']."</option>";
                                    }
                                    ?>
                                </select></td></tr>
                    </form>
                </table>
                <br>
                <div id="prof"></div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Primera promoci??n D.A.M. &copy; <i>2018-2020</i></span>
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
                <h5 class="modal-title" id="exampleModalLabel">Quieres cerrar sesi??n?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <div class="modal-body">Pulsa "Cerrar sesi??n" abajo is est??s listo para terminar la sesi??n actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="../index.html">Cerrar sesi??n</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>

