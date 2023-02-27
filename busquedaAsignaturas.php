<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
</head>
<body>
<?php
include "conexionlogueada.php";
$respuesta = $_REQUEST['respuesta'];
    

    
$sql="SELECT ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre as cursoNombre, PROFESORES.Nombre as profesorNombre, PROFESORES.Apellidos, CURSOS.Id
FROM PROFESORES INNER JOIN (CURSOS INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof
WHERE CURSOS.Id=
".$respuesta;
if($respuesta!="Seleccionar"){
$resultado=$conn->query($sql);
if(mysqli_num_rows($resultado)>0){
echo "<center><table><tr><th>Nombre de la asignatura</th><th>Curso</th><th>Profesor/a</th></tr>";
while($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr><td>".$fila['Nombre_de_la_asignatura']."</td><td>".$fila['Curso']."º ".$fila['cursoNombre']."</td><td>".$fila['profesorNombre']." ".$fila['Apellidos']."</td></tr>";
}
echo "</table></center>";
}}

mysqli_close($conn);
?>
</body>
</html> 