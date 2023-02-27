<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
</head>
<body>
<?php
$respuesta = $_GET['respuesta'];
include "conexionlogueada.php";
$sql="SELECT ASIGNATURA.Nombre_de_la_asignatura, PROFESORES.Nombre, PROFESORES.Apellidos, Rel_Prof_Asig.Id
FROM PROFESORES INNER JOIN ((CURSOS INNER JOIN ASIGNATURA ON CURSOS.Id = ASIGNATURA.Cod_curso) INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE CURSOS.Id=
".$respuesta;
$resultado=$conn->query($sql);
if(mysqli_num_rows($resultado)>0){
echo "&nbsp;&nbsp;&nbsp;Asignatura-Profesor:&nbsp
<select name='asignatura' class='miSelect' id='asignatura' required>
<option>Seleccionar</option>";
while($fila = mysqli_fetch_assoc($resultado)) {
    echo "<option value='".$fila['Id']."'>".$fila['Nombre_de_la_asignatura']." - ".$fila['Nombre']." ".$fila['Apellidos']."</option>";
}
echo "</select>";
}

mysqli_close($conn);
?>
</body>
</html> 