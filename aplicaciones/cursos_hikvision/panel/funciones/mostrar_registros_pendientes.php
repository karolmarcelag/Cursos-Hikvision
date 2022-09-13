<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    include "../../../../conexion.php";

    $arreglo = array();
    $x = 0;
    $filtro = $_POST["filtro"];

    $query ="select a.id, a.fecha, a.hora, b.nombre, b.apellido, b.correo, c.titulo as 'titulo_capacitacion', c.tipo_capacitacion, a.tipo_cliente, d.nombre as 'sucursal', a.publicar, a.registrado
    from ((cursos_hikvision.evento a inner join cursos_hikvision.instructor b) inner join cursos_hikvision.capacitacion c) inner join cursos_hikvision.sucursal d
    on a.id_instructor = b.id and a.id_capacitacion = c.id and a.id_sucursal = d.id and a.registrado = 0 and concat(b.nombre, ' ', b.apellido, ' ', c.titulo, ' ', c.tipo_capacitacion, ' ', d.nombre, ' ') like '%$filtro%'
    order by a.fecha;";
    $consulta = mysqli_query($conexion,$query);
    while($tabla = mysqli_fetch_array($consulta))
    {
        $arreglo[$x]["id"] = $tabla["id"];
        $arreglo[$x]["fecha"] = $tabla["fecha"];
        $arreglo[$x]["hora"] = $tabla["hora"];
        $arreglo[$x]["nombre"] = $tabla["nombre"];
        $arreglo[$x]["apellido"] = $tabla["apellido"];
        $arreglo[$x]["correo"] = $tabla["correo"];
        $arreglo[$x]["titulo_capacitacion"] = $tabla["titulo_capacitacion"];
        $arreglo[$x]["tipo_capacitacion"] = $tabla["tipo_capacitacion"];
        $arreglo[$x]["tipo_cliente"] = $tabla["tipo_cliente"];
        $arreglo[$x]["sucursal"] = $tabla["sucursal"];
        $arreglo[$x]["publicar"] = $tabla["publicar"];
        $arreglo[$x]["registrado"] = $tabla["registrado"];
        $x++;
    }

    if($x>0)
    {
        echo json_encode($arreglo);
    }
    else
    {
        echo "-1";
    }
}
else
{
    header("Location: ../../../index.php");
}