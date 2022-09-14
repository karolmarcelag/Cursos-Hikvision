<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x=0;
    $filtro = $_POST["filtro"];

    $consulta1 = mysqli_query($conexion,"select a.id, a.fecha, b.nombre, b.apellido, c.titulo as 'titulo_capacitacion', d.nombre as 'sucursal'
    from ((cursos_hikvision.evento a inner join cursos_hikvision.instructor b) inner join cursos_hikvision.capacitacion c) inner join cursos_hikvision.sucursal d
    on a.id_instructor = b.id and a.id_capacitacion = c.id and a.id_sucursal = d.id and concat(c.titulo, ' ', d.nombre, ' ') like '%$filtro%'");
    while($tabla1 = mysqli_fetch_array($consulta1))
    {
        $arreglo[$x]["title"] = $tabla1["titulo_capacitacion"].", ".$tabla1["sucursal"];
        $arreglo[$x]["url"] = "?evento=".$tabla1["id"];
        $arreglo[$x]["start"] = $tabla1["fecha"];
        $x++;
    }

    $consulta2 = mysqli_query($conexion,"select fecha1, fecha2, salas from cursos_presenciales.cursos");
    while($tabla2 = mysqli_fetch_array($consulta2))
    {
        $arreglo[$x]["title"] = "NO DISPONIBLE - ".$tabla2["salas"];
        $arreglo[$x]["start"] = $tabla2["fecha1"];
        $arreglo[$x]["end"] = $tabla2["fecha2"];
        $x++;
    }

    echo json_encode($arreglo);
}
else
{
    header("Location: ../../../index.php");
}