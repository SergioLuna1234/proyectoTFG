<head>
  <style>
  table,tr,th,td{
    border: 1 px solid black;
    border-collapse: collapse;
  }
  </style>
</head>
<?php
include 'conexion.php'; //incluye el codigo del fichero

$dia = 'martes';

  $sql = "SELECT PROFESORES.Id, AULAS.Nombre, HORARIO.Dia, HORARIO.Hora, CURSOS.Curso, CURSOS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, PROFESORES.Nombre, PROFESORES.Apellidos, PROFESORES.Id
FROM (PROFESORES
  INNER JOIN (CURSOS INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig) ON CURSOS.Id = ASIGNATURA.Cod_curso) ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof) INNER JOIN ((HORARIO INNER JOIN (AULAS INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula) ON Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig
WHERE (((PROFESORES.Id)=2) AND ((HORARIO.Dia)='$dia') AND ((HORARIO.Hora)=1));
";
  $resultado = $conn->query($sql);

  if ($resultado->num_rows > 0) {

    $campo=mysqli_fetch_fields($resultado);
    echo "<table><tr>";

    echo "<th>Nombre del producto</th><th>Precio de la unidad</th><th>ID del producto</th><th>ID Proveedor</th><th>ID Categoria</th>";
    /*foreach ($campo as $valor) {
      echo "<th>".$valor->name."</th>";
    }*/
    echo "</tr>";

    while ($fila=$resultado->fetch_assoc()) {
      $nombre = $fila['Nombre'];
      echo "<tr><td>$nombre</td></tr>";
    }

  }

  mysqli_close($conn);
?>
