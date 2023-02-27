<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
</head>
<body>
<?php
include "conexionlogueada.php";
$respuesta = $_GET['respuesta'];

$sql="SELECT ASIGNATURA.Id as asigID, ASIGNATURA.Nombre_de_la_asignatura, PROFESORES.Nombre, PROFESORES.Apellidos, Rel_Prof_Asig.Id as relID, CURSOS.Id
FROM PROFESORES INNER JOIN ((CURSOS INNER JOIN ASIGNATURA ON CURSOS.Id = ASIGNATURA.Cod_curso) INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE CURSOS.Id=
".$respuesta;
$resultado=$conn->query($sql);
if(mysqli_num_rows($resultado)>0){
echo "&nbsp;&nbsp;&nbsp;Asignaturas del curso:&nbsp
<select name='asignatura' class='miSelect' id='asignatura' required>
<option>Seleccionar</option>";
while($fila = mysqli_fetch_assoc($resultado)) {
    echo "<option value='".$fila['asigID']."'>".$fila['Nombre_de_la_asignatura']." - ".$fila['Nombre']." ".$fila['Apellidos']."(".$fila['relID'].")</option>";
}
echo "</select>";
}

mysqli_close($conn);
?>
</body>
</html> 