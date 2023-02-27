
<?php
include 'conexion.php';
include 'funcionFormateoHoras.php';
include 'funcionRevertirFormateoHoras.php';

echo "<form action='#' method='post'>";
// SELECT PARA PROFESORES
$sql = "SELECT * FROM profesores";
$resultado = $conn->query($sql);

echo "Profesor: ";
echo "<select name='id'>
<option>TODOS</option>";

if ($resultado->num_rows > 0) {

$campo=mysqli_fetch_fields($resultado);
while ($fila=$resultado->fetch_assoc()) {
$nombre = $fila['Nombre'];
$apellidos = $fila['Apellidos'];
$id = $fila['Id'];
echo "<option value='$id'>$nombre $apellidos</option>";
}

}

echo "</select>";

// SELECT PARA LAS HORAS
echo "Horas: ";
echo "<select name='hora'>";

$sql2 = "SELECT DISTINCT Hora FROM HORARIO";
$resultado2 = $conn->query($sql2);

if($resultado2->num_rows > 0){
echo "<option>TODAS</option>";
while ($fila = $resultado2->fetch_assoc()) {
$hora = $fila['Hora'];
echo "<option value=$hora>" . formateo($hora) . "</option>";
}
}

echo "</select>";

// SELECT CON LOS DIAS DE LA SEMANA
echo "Dias: ";
echo "<select name='dia'>
<option>TODOS</option>
<option>Lunes</option>
<option>Martes</option>
<option>Miercoles</option>
<option>Jueves</option>
<option>Viernes</option>
</select>";

echo "<br><input type='submit' name='submit'>";
echo "</form>";

if(isset($_POST['submit'])){
$profesorParam = $_POST['id'];
$diaParam = $_POST['dia'];
$horaParam = $_POST['hora'];

// Datos del sistema
$diaActual = date("l");
$horaActual = date("G");
$minutosActuales = date("i");

if($minutosActuales < 30){
$horaActual = $horaActual . ':00';
}
else{
  $horaActual = $horaActual . ':30';
}

switch($diaActual){
  case 'Monday': $diaActual = 'lunes';
  break;
  case 'Tuesday': $diaActual = 'martes';
  break;
  case 'Wednesday': $diaActual = 'miercoles';
  break;
  case 'Thursday': $diaActual = 'jueves';
  break;
  case 'Friday': $diaActual = 'viernes';
  break;
}

$sql3 = "SELECT AULAS.Id, CURSOS.Curso, CURSOS.Nombre AS Formacion, HORARIO.Dia, HORARIO.Hora, ASIGNATURA.Nombre_de_la_asignatura, PROFESORES.Nombre, PROFESORES.Apellidos
        FROM (PROFESORES INNER JOIN ((CURSOS INNER JOIN ASIGNATURA ON CURSOS.Id = ASIGNATURA.Cod_curso)
        INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof)
        INNER JOIN ((HORARIO INNER JOIN (AULAS INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) ON HORARIO.Id = Rel_aula_hora.Cod_hora)
        INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig
        WHERE (((PROFESORES.Id)=$profesorParam) AND ((HORARIO.Dia)='$diaParam') AND ((HORARIO.Hora)=$horaParam))";

  $resultado = $conn->query($sql3);

echo "\nhoy es " . $diaActual . " y son las " . $horaActual;

  if ($resultado->num_rows > 0) {

      while ($fila = $resultado->fetch_assoc()) {
          $nombreProfesor = $fila['Nombre'];
          $curso = $fila['Curso'];
          $nombreCurso = $fila['Formacion'];
          echo $nombreProfesor . " esta en " . $curso . "º de " . $nombreCurso;
  }

}
else{
  echo "El profesor no tiene asignado ningun curso el " . $diaParam . " a las " . $horaParam;
}
  $conn->close();
}

  ?>
