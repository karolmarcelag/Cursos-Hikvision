<?php

require "../../../../conexion.php";

$id = $_POST["id"];

//-------------------------------------------- CONSULTA UPDATE --------------------------------------------
$consulta = "update cursos_hikvision.evento set registrado = 1 where id = $id";
mysqli_query($conexion,$consulta);

echo "1";

?>