<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x=0;
    $id = $_POST["region"];

    //cargar sucursal
    $x=0;
    $consulta1 = mysqli_query($conexion,"select id, nombre, aforo from cursos_hikvision.sucursal where id_region=$id");
    while($tabla1 = mysqli_fetch_array($consulta1))
    {
        $arreglo["sucursal"][$x]["id"] = $tabla1["id"];
        $arreglo["sucursal"][$x]["nombre"] = $tabla1["nombre"];
        $x++;
    }

    //cargar instructor
    $x=0;
    $consulta2 = mysqli_query($conexion,"select id, nombre, apellido, correo from cursos_hikvision.instructor where id_region=$id");
    while($tabla2 = mysqli_fetch_array($consulta2))
    {
        $arreglo["instructor"][$x]["id"] = $tabla2["id"];
        $arreglo["instructor"][$x]["nombre"] = $tabla2["nombre"];
        $arreglo["instructor"][$x]["apellido"] = $tabla2["apellido"];
        $x++;
    }

    echo json_encode($arreglo); 

}
else
{
    header("Location: ../../../index.php");
}