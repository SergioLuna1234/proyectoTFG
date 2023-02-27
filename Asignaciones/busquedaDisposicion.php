<?php
include "funcionRevertirFormateoHoras.php";
include "buscarCodDep.php";
include "conexionBBDD.php";
include "formateoHoras.php";

$busqueda = $_GET['q'];
$campos = preg_split('/ /', $busqueda, -1, PREG_SPLIT_NO_EMPTY);

$dia=$campos[0];
$hora=$campos[1];
$departamento=$campos[2];


$where = "";
//SI TODOS LOS PARAMETROS RECIBIDOS SON ESTOS, NO HAY WHERE, ES UNA SELECCION GENERAL
if ($hora == "TODOS" && $dia == "TODOS" && $departamento == "TODOS") {
    $where = " WHERE ASIGNATURA.Nombre_de_la_asignatura='Disposicion'";
}else{
    //SI NO ES ASI, ES PORQUE, POR LO MENOS UNO ES UNA CONDICION DE WHERE PARA FILTRAR
    $where = " WHERE ASIGNATURA.Nombre_de_la_asignatura='Disposicion' AND";
    if ($hora != "TODOS"){
        $where .= " HORARIO.Hora = $hora";
        //SI ADEMAS ALGUNO DE LOS RESTANTES PARAMETROS TIENE ALGUN VALOR CONCRETO, HABRA UN "AND"
        if($dia != "TODOS" || $departamento != "TODOS"){
            $where .= " AND ";
        }
    }
    if($dia != "TODOS"){
        $where .= " HORARIO.Dia = '$dia'";
        //SI ADEMAS ALGUNO DE LOS RESTANTES PARAMETROS TIENE ALGUN VALOR CONCRETO, HABRA UN "AND"
        if($departamento != "TODOS"){
            $where .= " AND ";
        }
    }
    if($departamento != "TODOS"){
        $where .= " PROFESORES.Cod_Departamento = ".$departamento;
        //SI ADEMAS ALGUNO DE LOS RESTANTES PARAMETROS TIENE ALGUN VALOR CONCRETO, HABRA UN "AND"
    }
}
$where.= " ORDER BY HORARIO.Hora";
/* SQL QUE FUNCIONA
SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre,
PROFESORES.Id,profesores.Nombre,profesores.Cod_Departamento FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal)
INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig)
ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON
(Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula))
ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof WHERE asignatura.Nombre_de_la_asignatura='Disposicion' */

$sql = "SELECT Rel_Aula_hora_y_asig_cur.Id, HORARIO.Dia, HORARIO.Hora, AULAS.Nombre, ASIGNATURA.Nombre_de_la_asignatura, CURSOS.Curso, CURSOS.Nombre,
PROFESORES.Id,profesores.Nombre,profesores.Apellidos,profesores.Cod_Departamento FROM PROFESORES INNER JOIN ((HORARIO INNER JOIN (((AULAS INNER JOIN CURSOS ON AULAS.Id = CURSOS.Aula_Principal)
INNER JOIN Rel_aula_hora ON AULAS.Id = Rel_aula_hora.Cod_Aula) INNER JOIN (ASIGNATURA INNER JOIN Rel_Prof_Asig ON ASIGNATURA.Id = Rel_Prof_Asig.Cod_Asig)
ON CURSOS.Id = ASIGNATURA.Cod_curso) ON HORARIO.Id = Rel_aula_hora.Cod_hora) INNER JOIN Rel_Aula_hora_y_asig_cur ON
(Rel_Prof_Asig.Id = Rel_Aula_hora_y_asig_cur.Cod_Prof_Asig) AND (Rel_aula_hora.Id = Rel_Aula_hora_y_asig_cur.Cod_Hora_Aula))
ON PROFESORES.Id = Rel_Prof_Asig.Cod_Prof $where";

$resultado = mysqli_query($conn,$sql);

if (mysqli_num_rows($resultado)>0)
{
    echo "<table class='tablainformacion'><tr><th class='thinformacion'>Dia</th><th class='thinformacion'>Hora</th><th class='thinformacion'>Nombre</th><th class='thinformacion'>Apellidos</th><th class='thinformacion'>Departamento</th></tr>";
    while($fila=mysqli_fetch_assoc($resultado))
    {
        echo "<tr>";
        echo "<td class='tdinfo'>".$fila['Dia']."</td><td class='tdinfo'>".formateo($fila['Hora'])."</td><td class='tdinfo'>".$fila['Nombre']."</td><td class='tdinfo'>".$fila['Apellidos']."</td><td class='tdinfo'>".buscarNdep($fila['Cod_Departamento'])."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
