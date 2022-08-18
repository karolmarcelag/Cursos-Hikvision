<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x=0;
    $id = $_POST["instructor"];

    //cargar correo
    $consulta1 = mysqli_query($conexion,"select correo from cursos_hikvision.instructor where id=$id");
    $tabla1 = mysqli_fetch_array($consulta1);
    $arreglo["instructor"][0]["correo"] = $tabla1["correo"];

    echo json_encode($arreglo); 

}
else
{
    header("Location: ../../../index.php");
}