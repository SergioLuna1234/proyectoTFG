<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
</head>
<body>
<?php
$respuesta = $_GET['respuesta'];
$campos = preg_split('/ /', $respuesta, -1, PREG_SPLIT_NO_EMPTY);
$AulaID=$campos[0];
$Dia=$campos[1];
$Hora=$campos[2];
include "conexionlogueada.php";
if($AulaID=="~"){
    $AulaID="";
}
if($Dia=="~"){
    $Dia="";
}
if($Hora=="~"){
    $Hora="";
}

$sql="SELECT Rel_Aula_hora_y_asig_cur.Id, CURSOS.Curso, CURSOS.Nombre as cursoNombre, ASIGNATURA.Nombre_de_la_asignatura, PROFESORES.Nombre as profesorNombre, PROFESORES.Apellidos
FROM (PROFESORES INNER JOIN (CURSOS INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof) INNER JOIN ((HORARIO INNER JOIN (AULAS INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig
WHERE (((AULAS.Id)='".$AulaID."') AND ((HORARIO.Dia)='".$Dia."') AND ((HORARIO.Hora)='".$Hora."'));
";

$resultado=$conn->query($sql);
if(mysqli_num_rows($resultado)>0){
echo "&nbsp;&nbsp;&nbsp;Curso-Asignatura-Profesor:&nbsp
<select name='CursoProfesorAsignatura' class='miSelect' id='CursoProfesorAsignatura' required>
<option>Seleccionar</option>";
while($fila = mysqli_fetch_assoc($resultado)) {
    echo "<option value='".$fila['Id']."'>".$fila['Curso']."º".$fila['cursoNombre']." ".$fila['Nombre_de_la_asignatura']." - ".$fila['profesorNombre']." ".$fila['Apellidos']."</option>";
}
echo "</select>";
}


else {
    echo "<h6>No se ha encontrado nada</h6>";
}
mysqli_close($conn);
?>
</body>
</html> 