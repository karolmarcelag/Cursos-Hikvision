<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    require "../../../../conexion.php";

    $fecha = $_POST["fecha"]; //lo naranja es lo azul del js, el id del html
    $hora = $_POST["hora"]; //lo azul es un nombre nuevo de php
    $titulo = $_POST["titulo"];
    $sucursal = $_POST["sucursal"];
    $tipo_cliente = $_POST["tipo_cliente"];
    $publicar = $_POST["publicar"];
    $instructor = $_POST["instructor"];
    $nombre_sucursal = $_POST["nombre_sucursal"];

    //-------------------------------------------- CONTAR REGISTROS  --------------------------------------------
    $query = "select id from cursos_hikvision.evento where fecha='$fecha' and id_sucursal=$sucursal";
    $registros = mysqli_num_rows(mysqli_query($conexion,$query));
    if ($registros == 0)
    {
        $query2 = "select id from cursos_presenciales.evento where fecha1='$fecha' and salas=$nombre_sucursal";
        $registros2 = mysqli_num_rows(mysqli_query($conexion,$query2));
        if($registros2 == 0)
        {
            $consulta = "insert into cursos_hikvision.evento (fecha,hora,id_capacitacion,id_sucursal,tipo_cliente,publicar,id_instructor) values ('$fecha','$hora:00',$titulo,$sucursal,$tipo_cliente,$publicar,$instructor);";
            mysqli_query($conexion,$consulta);
            echo "1";
        }
        else
        {
            echo "3";
        }
        
    }
    else
    {
        echo "2";
    }
}
else
{
    header("Location: ../../../index.php");
}