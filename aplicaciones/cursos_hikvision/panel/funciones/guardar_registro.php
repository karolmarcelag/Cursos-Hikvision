<?php

require "../../../../conexion.php";

$fecha = $_POST["fecha"]; //lo naranja es lo azul del js, el id del html
$hora = $_POST["hora"]; //lo azul es un nombre nuevo de php
$titulo = $_POST["titulo"];
$sucursal = $_POST["sucursal"];
$tipo_cliente = $_POST["tipo_cliente"];
$publicar = $_POST["publicar"];
$instructor = $_POST["instructor"];

//-------------------------------------------- CONTAR REGISTROS  --------------------------------------------
$registros = mysqli_num_rows(mysqli_query($conexion,"select id from cursos_hikvision.evento where fecha='$fecha' and id_sucursal=$sucursal"));
if ($registros == 0)
{
    $consulta = "insert into cursos_hikvision.evento (fecha,hora,id_capacitacion,id_sucursal,tipo_cliente,publicar,id_instructor) values ('$fecha','$hora:00',$titulo,$sucursal,$tipo_cliente,$publicar,$instructor);";
    mysqli_query($conexion,$consulta);
    echo "1";
}
else
{
    echo "2";
}

?>