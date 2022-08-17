<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $id_cursos = $_POST["id_cursos"];
    
    $query = "delete from cursos_presenciales.cursos where id_cursos='$id_cursos';";
    $conexion->multi_query($query);    

    echo "1";
    
}
else
{
    header("Location: ../../../index.php");
}
