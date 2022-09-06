<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    require_once ("../../../conexion.php");
    ?>
    <html>
        <head>
            <title>Cursos Hikvision</title>
            <link rel="stylesheet" type="text/css" href="../css/vuelos.css" media="all"/>
            <link href="../css/estilo.css" rel="stylesheet">
            <link rel="icon" type="image/ico" href="/favicon.ico"/>
            <script src="../javascript/jquery-3.3.1.js"></script>
            <script src="../javascript/jquery-3.3.1.min.js"></script>
            <script src="../javascript/calendario.js"></script>
        </head>
       <body onload='cargar_region(2)'>
            <?php include "menu_p.php";?>
            <div class="contenido">
            <?php include "menu.php";?>
            </div>

            <div class='buscar'>
                <div class='buscador' style="margin-top:55px; position:relative; right:6%; display:block;">
                    <input id="buscar" type="text" name="buscar" placeholder="Instructor, título de capacitación o sucursal." style="width:75%; text-align:left; padding:5px; margin-right:21%">
                    <button id='boton_buscar' class='input_boton' style='width:20%; cursor:hand' onclick='mostrar_registros_pendientes()'>Buscar</button>
                </div>
            </div>

            <div id='formulario' class='agregar_calendario' style='display: none;'>
                <img src='../imagenes/eliminar.png' style='width:15px; position:absolute; top:0; right:0; margin-right:5px; margin-top:5px; cursor:hand;' onclick='cerrar_formulario()'>
                <br>      
                <div style='float:left; margin-right:10px;'>
                    Fecha:<br>
                    <input type='date' id='fecha' style='width:170px;'>
                </div>
                <div style='float:left; margin-right:10px;'>
                    Hora Inicio:<br>
                    <input type='time' id='hora' style='width:170px;'>
                </div>  
                <div style='float:left;'>
                    Tipo de Capacitación:<br>
                    <select id='tipo_capacitacion' style='width:170px;' onchange='campos_capacitacion()'>
                        <option value='0'>Seleccione una opción..</option>
                        <option value='1'>Plática Comercial</option>
                        <option value='2'>Certificación</option>
                    </select>
                </div>
                <div style='float:left; margin-top:10px; margin-right:10px'>
                    Titulo de Capacitación:<br>
                    <select id='titulo' style='width:170px'>
                    </select>
                </div>    
                <div style='float:left; margin-top:10px; margin-right:10px;'>
                    Región:<br>
                    <select id='region' style='width:170px' onchange='campos_sucursal_instructor()'>
                    </select>
                </div>
                <div style='float:left; margin-top:10px;'>
                    Sucursal:<br>
                    <select id='sucursal' style='width:170px' onchange='campo_aforo()'>
                    </select>
                </div>
                <div style='float:left; margin-top:10px; margin-right:10px;'>
                    Aforo:<br>
                    <input type='number' style='width:170px; padding: 5px;' id='aforo' readonly>
                </div>
                <div style='float:left; margin-top:10px; margin-right:10px;'>
                    Tipo de Cliente:<br>
                    <select id='tipo_cliente' style='width:170px'>
                        <option value='0'>Seleccione una opción..</option>
                        <option value='1'>Clientes en General</option>
                        <option value='2'>DPP</option>
                    </select>
                </div>
                <div style='float:left; margin-top:10px;'>
                    Se publica en SYSCOM.MX?<br>
                    <select id='publicar' style='width:170px'>
                        <option value='0'>Seleccione una opción..</option>
                        <option value='1'>Si</option>
                        <option value='2'>No</option>
                    </select>
                </div>
                <div style='float:left; margin-top:10px; margin-right:10px'>
                    Instructor:<br>
                    <select id='instructor' style='width:170px' onchange='campo_correo()'>
                    </select>
                </div>
                <div style='float:left; margin-top:10px'>
                    Correo del Instructor:<br>
                    <input type='text' style='width:350px; padding:5px;' id='correo' maxlength='50' readonly>
                </div>
                <div style='float:left;'>
                    <button id='guardar' class='input_boton' style='position:relative; margin-top:50px; left:215px; width:100px; cursor:hand;' onclick='mostrar_registros_pendientes()'>Agregar</button>            
                </div>
                <br>
            </div>
            <span id="tabla"></span>
            <div id="mensaje1" style="background:#467a49e0; color:#fff">Curso eliminado correctamente</div>
        </body>
    </html>
<?php
}
else
{
    header("Location: ../../index.php");
}