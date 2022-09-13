<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    require_once ("../../../conexion.php");?>
    <!DOCTYPE html>
    <html lang="en-US">
        <head>
            <title>Cursos Hikvision</title>
            <link rel="stylesheet" type="text/css" href="../css/vuelos.css" media="all"/>
            <link href="../css/estilo.css" rel="stylesheet">
            <link rel="icon" type="image/ico" href="/favicon.ico"/>
            <script src="../javascript/jquery-3.3.1.js"></script>
            <script src="../javascript/jquery-3.3.1.min.js"></script>
            <script src="../javascript/calendario.js"></script>
            <link href='../css/fullcalendar.css' rel='stylesheet' />
            <script src='../javascript/fullcalendar.js'></script>
        </head>
        <body onload='cargar_region(3)'>
            <?php include "menu_p.php";?>
            <div class="contenido">
            <?php include "menu.php";?>
            </div>

            <div class='buscar' style='margin-top:60px'>
                <button id='boton_agregar' class='input_boton' style='float:left; position:relative; left:5%; width:10%; cursor:hand; display:block;' onclick='abrir_formulario()'>Agregar Curso</button>
                <div class='buscador' style="margin-top:55px; position:relative; right:6%; display:block;">
                    <input id="buscar" type="text" name="buscar" placeholder="Título de capacitación o sucursal." style="width:75%; text-align:left; padding:5px; margin-right:21%">
                    <button id='boton_buscar' class='input_boton' style='width:20%; cursor:hand' onclick='cargar_eventos()'>Buscar</button>
                </div>
            </div>

            <div id='formulario' class='agregar_calendario' style='display: none;'>
                <img src='../imagenes/eliminar.png' style='width:15px; position:absolute; top:0; right:0; margin-right:5px; margin-top:5px; cursor:hand;' onclick='cerrar_formulario()'>
                <br>      
                <div style='float:left; margin-right:10px;'>
                    Fecha:<br>
                    <input type='date' id='fecha' style='width:170px;'>
                </div>
                <div style='float: left;margin-right: 10px;'>
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
                <div style='float:left; margin-top:10px;margin-right:10px'>
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
                    <input type='number' style='width:170px; padding:5px;' id='aforo' readonly>
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
                <div style='float:left; margin-top:10px;margin-right:10px'>
                    Instructor:<br>
                    <select id='instructor' style='width:170px' onchange='campo_correo() '>
                    </select>
                </div>
                <div style='float:left; margin-top:10px'>
                    Correo del Instructor:<br>
                    <input type='text' style='width:350px; padding:5px;' id='correo' maxlength='50' readonly>
                </div>
                <div style='float:left;'>
                    <button id='guardar' class='input_boton' style='position:relative; margin-top:50px; left:215px; width:100px; cursor:hand;' onclick='mostrar_registros()'>Agregar</button>            
                </div>
                <br>
            </div>
            <div id='calendar'></div>

            <?php
            if(isset($_GET["evento"]))
            {
                $query = "select a.id, a.fecha, a.hora, b.nombre, b.apellido, b.correo, c.titulo as 'titulo_capacitacion', c.tipo_capacitacion, a.tipo_cliente, d.nombre as 'sucursal', a.publicar 
                from ((cursos_hikvision.evento a inner join cursos_hikvision.instructor b) inner join cursos_hikvision.capacitacion c) inner join cursos_hikvision.sucursal d
                on a.id_instructor = b.id and a.id_capacitacion = c.id and a.id_sucursal = d.id and a.id = ".$_GET["evento"];
                $consulta = mysqli_query($conexion,$query);
                $tabla = mysqli_fetch_array($consulta);
                ?>

                <div id='formulario_lectura' class='agregar_calendario' style='margin-top:10%'>
                    <img src='../imagenes/eliminar.png' style='width:15px; position:absolute; top:0; right:0; margin-right:5px; margin-top:5px; cursor:hand;' onclick="location.href='index.php'" >
                    <br>      
                    <div style='float:left; margin-right:10px;'>
                        Fecha:<br>
                        <div class='div_lectura'><?php echo $tabla["fecha"]; ?></div>
                    </div>
                    <div style='float: left;margin-right: 10px;'>
                        Hora Inicio:<br>
                        <div class='div_lectura'><?php echo $tabla["hora"]; ?></div>
                    </div>  
                    <div style='float:left;'>
                        Tipo de Capacitación:<br>
                        <div class='div_lectura'><?php
                        switch($tabla["tipo_capacitacion"])
                        {
                            case "1":
                                echo "Plática Comercial";
                                break;
                            case "2":
                                echo "Certificación";
                                break;
                        } ?></div>
                    </div>
                    <div style='float:left; margin-top:10px; margin-right:10px'>
                        Titulo de Capacitación:<br>
                        <div class='div_lectura'><?php echo $tabla["titulo_capacitacion"]; ?></div>
                    </div>
                    <div style='float:left; margin-top:10px; margin-right:10px'>
                        Sucursal:<br>
                        <div class='div_lectura'><?php echo $tabla["sucursal"]; ?></div>
                    </div>
                    <div style='float:left; margin-top:10px'>
                        Tipo de Cliente:<br>
                        <div class='div_lectura'><?php
                        switch($tabla["tipo_cliente"])
                        {
                            case "1":
                                echo "Clientes en General";
                                break;
                            case "2":
                                echo "DPP";
                                break;
                        } ?></div>
                    </div>
                    <div style='float:left; margin-top:10px; margin-right:10px'>
                        Se publica en SYSCOM.MX?<br>
                        <div class='div_lectura' style='width:160px;'><?php
                        switch($tabla["publicar"])
                        {
                            case "1":
                                echo "Si";
                                break;
                            case "2":
                                echo "No";
                                break;
                        } ?></div>
                    </div>
                    <div style='float:left; margin-top:10px; margin-right:10px'>
                        Instructor:<br>
                        <div class='div_lectura' style='width:150px;'><?php echo $tabla["nombre"]." ".$tabla["apellido"]; ?></div>
                    </div>
                    <div style='float:left; margin-top:10px; width:200px'>
                        Correo del Instructor:<br>
                        <div class='div_lectura' style='width:200px;'><?php echo $tabla["correo"]; ?></div>
                    </div>
                </div>
                <?php
            }
            ?>

        </body>
    </html>
<?php
}
else
{
    header("Location: ../../index.php");
}