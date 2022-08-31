<?php

require "../../../../conexion.php";

$id = $_POST["id"];

$consulta = "delete from cursos_hikvision.evento where id=$id";
mysqli_query($conexion,$consulta);

echo "1";

?>