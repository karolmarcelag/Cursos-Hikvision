<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x=0;
    $id = $_POST["tipo_capacitacion"];

    //cargar tipo y título capacitación
    $x=0;
    $consulta1 = mysqli_query($conexion,"select id, tipo_capacitacion, titulo from cursos_hikvision.capacitacion where tipo_capacitacion=$id");
    while($tabla1 = mysqli_fetch_array($consulta1))
    {
        $arreglo["capacitacion"][$x]["id"] = $tabla1["id"];
        $arreglo["capacitacion"][$x]["tipo_capacitacion"] = $tabla1["tipo_capacitacion"];
        $arreglo["capacitacion"][$x]["titulo"] = $tabla1["titulo"];
        $x++;
    }

    echo json_encode($arreglo); 

}
else
{
    header("Location: ../../../index.php");
}