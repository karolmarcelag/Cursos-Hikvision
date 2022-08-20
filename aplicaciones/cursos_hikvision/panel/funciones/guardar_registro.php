<?php

require "../../../../conexion.php";

$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$tipo_capacitacion = $_POST["tipo_capacitacion"];
$titulo = $_POST["titulo"];
$region = $_POST["region"];
$sucursal = $_POST["sucursal"];
$aforo = $_POST["aforo"];
$tipo_cliente = $_POST["tipo_cliente"];
$publicar = $_POST["publicar"];
$instructor = $_POST["instructor"];
$correo = $_POST["correo"];

$consulta = "insert into cursos_hikvision.evento (fecha,hora,tipo_capacitacion,titulo,region,sucursal,aforo,tipo_cliente,publicar,instructor,correo) values ($fecha,$hora,$tipo_capacitacion,'$titulo',$region,'$sucursal','$aforo','$tipo_cliente','$publicar','$instructor','$correo')";
mysqli_query($conexion,$consulta);

echo "1";

?>