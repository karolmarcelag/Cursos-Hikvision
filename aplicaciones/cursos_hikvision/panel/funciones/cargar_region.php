<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x=0;

    //cargar region
    $x=0;
    $consulta1 = mysqli_query($conexion,"select id, nombre from cursos_hikvision.region order by nombre");
    while($tabla1 = mysqli_fetch_array($consulta1))
    {
        $arreglo["region"][$x]["id"] = $tabla1["id"];
        $arreglo["region"][$x]["nombre"] = $tabla1["nombre"];
        $x++;
    }

    echo json_encode($arreglo);
    
}
else
{
    header("Location: ../../../index.php");
}