<?php
include "../../../../conexion.php";

$arreglo = array();
$x = 0;

$query ="select id,fecha,hora,id_capacitacion,id_sucursal,tipo_cliente,publicar,id_instructor from cursos_hikvision.evento;";
$consulta = mysqli_query($conexion,$query);
while($tabla = mysqli_fetch_array($consulta))
{
    $arreglo[$x]["id"] = $tabla["id"];
    $arreglo[$x]["fecha"] = $tabla["fecha"];
    $arreglo[$x]["hora"] = $tabla["hora"];
    $arreglo[$x]["instructor"] = $tabla["id_instructor"];
    $arreglo[$x]["tipo_capacitacion"] = $tabla["id_capacitacion"];
    $arreglo[$x]["tipo_cliente"] = $tabla["tipo_cliente"];
    $arreglo[$x]["sucursal"] = $tabla["id_sucursal"];
    $arreglo[$x]["publicar"] = $tabla["publicar"];
    $x++;
}

if($x>0)
{
    echo json_encode($arreglo);
}
else
{
    echo "-1";
}