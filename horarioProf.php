<?php
include "php/conexion.php";
$dias=[];
$horas=[];
$n_asignatura=[];
$cod_prof=[];
$n_curso=[];
$g_curso=[];
$id=[];
$idabuscar=$_REQUEST['ID'];
$sqlProfesor="SELECT PROFESORES.Nombre, PROFESORES.Apellidos FROM PROFESORES  WHERE (((PROFESORES.Id)=$idabuscar)) ";
$resultadoProfesor = mysqli_query($conn,$sqlProfesor);
if (mysqli_num_rows($resultadoProfesor)>0)
    {
    while($fila=mysqli_fetch_assoc($resultadoProfesor))
      {
        echo "<center><h1>".$fila['Nombre']." ".$fila['Apellidos']."</h1><center>";
      }
    }
$sqlLunes="SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre, PROFESORES.Id FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal) INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON (Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula)) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE (((PROFESORES.Id)=$idabuscar)) and horario.Dia = 'LUNES' ORDER BY HORARIO.Dia, HORARIO.Hora";

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
$tabla="<table class='horario'>";
$stringlinea1="<tr><th></th><th>LUNES</th><th>MARTES</th><th>MIERCOLES</th><th>JUEVES</th><th>VIERNES</th>";
$stringlinea2="<tr><td>1º</td>";
$stringlinea3="<tr><td>2º</td>";
$stringlinea4="<tr><td>3º</td>";
$stringlinea5="<tr><td>4º</td>";
$stringlinea6="<tr><td>5º</td>";
$stringlinea7="<tr><td>6º</td>";
$stringlinea8="<tr><td>1º</td>";
$stringlinea9="<tr><td>2º</td>";
$stringlinea10="<tr><td>3º</td>";
$stringlinea11="<tr><td>4º</td>";
$stringlinea12="<tr><td>5º</td>";
$stringlinea13="<tr><td>6º</td>";


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
            $stringlinea2.="<td>$n_asignatura[$i] $g_curso[$i]  $n_curso[$i]</td>";
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
$tabla.="</table>";
echo $tabla;
?>