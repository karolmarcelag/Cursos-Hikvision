<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x=0;
    $id = $_POST["sucursal"];

    //cargar aforo
    $consulta1 = mysqli_query($conexion,"select aforo from cursos_hikvision.sucursal where id=$id");
    $tabla1 = mysqli_fetch_array($consulta1);
    $arreglo["sucursal"][0]["aforo"] = $tabla1["aforo"];

    echo json_encode($arreglo); 

}
else
{
    header("Location: ../../../index.php");
}