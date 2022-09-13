<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    require "../../../../conexion.php";

    $id = $_POST["id"];

    //-------------------------------------------- CONSULTA UPDATE --------------------------------------------
    $consulta = "update cursos_hikvision.evento set registrado = 1 where id = $id";
    mysqli_query($conexion,$consulta);

    echo "1";
}
else
{
    header("Location: ../../../index.php");
}