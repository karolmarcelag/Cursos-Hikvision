<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if ($h14 == "autorizado") {

    include "../../../../conexion.php";

    $id_cursos = $_POST["id"];
    $fecha = $_POST["fecha_calendario"];
    $hora = $_POST["hora_curso"];
    $tipo_capacitacion = $_POST["cap"];
    $division = $_POST["div"];
    $titulo_capacitacion = $_POST["titulo_capacitacion"];

    $query = "update cursos_presenciales.cursos set hora_curso='$hora', cap='$tipo_capacitacion', div='$division', titulo_capacitacion='$titulo_capacitacion', region='$region', t_cliente='$tipo_cliente', aforo='$aforo', nombre_i='$nombre_i', correo_i='$correo_i', publicar='$publicar' where id_cursos='$id_cursos';".
    "update cursos_presenciales.calendario_fechas set fecha_calendario='$fecha' where id_cursos='$id_cursos';";
    $conexion->multi_query($query);

    echo "1";
    
} else {
    header("Location: ../../../index.php");
}
