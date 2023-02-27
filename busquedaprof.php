<html>
<head>
<meta charset="UTF-8"> 
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
include "php/conexion.php";
$sql="select Id, Nombre_del_departamento from departamento";
$resultado=$conn->query($sql);
?>
</script>
</head>
<body>
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
</body>
</html>