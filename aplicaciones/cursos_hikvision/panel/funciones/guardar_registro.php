<?php

require "../../../../conexion.php";

$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$instructor = $_POST["instructor"];
$tipo_capacitacion = $_POST["tipo_capacitacion"];
$tipo_cliente = $_POST["tipo_cliente"];
$sucursal = $_POST["sucursal"];
$publicar = $_POST["publicar"];

$consulta = "insert into cursos_hikvision.evento (fecha,hora,id_capacitacion,id_sucursal,tipo_cliente,publicar,id_instructor) values ('$fecha','$hora:00',$tipo_capacitacion,$sucursal,$tipo_cliente,$publicar,$instructor);";
mysqli_query($conexion,$consulta);

echo "1";

?>