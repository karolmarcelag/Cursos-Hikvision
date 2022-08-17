<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $id_cursos = $_POST["id_cursos"];
    $arreglo = array();
    $x=0;                   

    $query = "select id_cursos,fecha,hora,cap,div,titulo_capacitacion,region,t_cliente,aforo,nombre_i,correo_i,publicar from cursos_presenciales.cursos where id_cursos = $id_cursos;";                 
    $consulta = mysqli_query($conexion,$query);
    while($tabla = mysqli_fetch_array($consulta))
    {
        $arreglo[$x]["id_cursos"] = $tabla["id_cursos"];
        $arreglo[$x]["fecha"] = $tabla["fecha"];
        $arreglo[$x]["hora"] = $tabla["hora"];
        $arreglo[$x]["cap"] = $tabla["cap"];
        $arreglo[$x]["div"] = $tabla["div"];
        $arreglo[$x]["titulo_capacitacion"] = $tabla["titulo_capacitacion"];
        $arreglo[$x]["region"] = $tabla["region"];
        $arreglo[$x]["t_cliente"] = $tabla["t_cliente"];
        $arreglo[$x]["aforo"] = $tabla["aforo"];
        $arreglo[$x]["nombre_i"] = $tabla["nombre_i"];
        $arreglo[$x]["correo_i"] = $tabla["correo_i"];
        $arreglo[$x]["publicar"] = $tabla["publicar"];         
        $x++;
    }

    if($x == 0)
    {
        echo "-1";
    }
    else
    {
        echo json_encode($arreglo); 
    }    
}
else
{
    header("Location: ../../../index.php");
}