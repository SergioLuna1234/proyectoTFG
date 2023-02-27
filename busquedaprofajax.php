<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
</head>
<body>
<?php
$respuesta = $_GET['respuesta'];
$campos = preg_split('/ /', $respuesta, -1, PREG_SPLIT_NO_EMPTY);
$profnom=$campos[0];
$profape=$campos[1];
$profdep=$campos[2];
include "php/conexion.php";
if($profnom=="~"){
    $profnom="";
}
if($profape=="~"){
    $profape="%";
}
if($profdep=="~"){
    $profdep="%";
}
$sql="SELECT Id, DNI, Nombre, Apellidos, Fecha_de_nacimiento, Numero_de_horas, Cod_Departamento FROM profesores WHERE Nombre like '$profnom%' AND Apellidos like '$profape%' AND Cod_Departamento like '$profdep'";
$resultado=$conn->query($sql);
if(mysqli_num_rows($resultado)>0){
echo "<table>
<tr>
<th>ID</th>
<th>DNI</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Fecha de nacimiento</th>
<th>Número de horas</th>
<th>Búsqueda</th>
</tr>";
while($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['Id'] . "</td>";
    echo "<td>" . $fila['DNI'] . "</td>";
    echo "<td>" . $fila['Nombre'] . "</td>";
    echo "<td>" . $fila['Apellidos'] . "</td>";
    echo "<td>" . $fila['Fecha_de_nacimiento'] . "</td>";
    echo "<td>" . $fila['Numero_de_horas'] . "</td>";
    echo "<td><button value='" . $fila['Id'] . "' onclick='enviarValor(this.value)'>Ver horario</td></form>";
    echo "</tr>";
}
echo "</table>";
}
else {
    echo "<table><tr><th>No se ha encontrado nada</th></tr></table>";
}
mysqli_close($conn);
?>
</body>
</html> 