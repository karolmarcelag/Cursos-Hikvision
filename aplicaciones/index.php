<?php
session_start();
$_SESSION['ing_info'] = "Karol Gutierrez";
$_SESSION['ing_correo'] = "karol.gutierrez@syscom.mx";
$_SESSION['ing_no_empleado'] = "2939";
$_SESSION['ing_id_area'] = "10";
$_SESSION['ing_id_departamento'] = "1";
$_SESSION['ing_id_subdepartamento'] = "0";
$_SESSION['ing_acceso'] = "autorizado";
$_SESSION['ing_id_usuario'] = "482";
$_SESSION['ing_extension'] = "8504";

$_SESSION["ing_h14"] = "autorizado";


?>
<html><head>
            <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <link href="https://ingenieria.syscom.mx/css/aplicaciones.css" rel="stylesheet" type="text/css">
            <script src="https://ingenieria.syscom.mx/jquery-1.12.4.js"></script>
            <script src="https://ingenieria.syscom.mx/jquery-ui.js"></script>
            <script src="script.js"></script>
            <link href="/favicon.png">
            <title>Aplicaciones Ingeniería</title>
        <script async="" src="/cdn-cgi/bm/cv/669835187/api.js"></script></head>
        <body>
            
<style>
.cmenu
{
    position: absolute;
    width:50px;
    height: 30px;
    top: 0;
    left:0;
    z-index: 100;
    padding: 4px 0 0 4px;
}

.info
{
    position: absolute;
    width: 100%;
    top: 0;
    right:0;
    font-size: 14px;
    height: 30px;
    text-align: right;
    background: #CCC;
    padding: 4px 0 4px 0;
    z-index: 20;
}

a,a:hover,a:active,a:after
{
    text-decoration:none;
    color:#000;
}

.btn_cerrar_sesion
{

    font-size: 16px;
    height:100%;
    width:auto;
    padding: 0;
}

.nombre
{
    margin-top:10px;
}

.camb_cont
{
    font-family: 'Calibri', sans-serif;
    font-size: 12px;
    color: #000;
}

.icono_rest-cont
{
    margin-left: 10px;
}
</style>
<div class="info">
    <span id="titulo_h"></span>
    <span style="font-size: 12px; margin-top: 8px; position: absolute; right: 0; margin-right: 25px; font-family: 'Arial', sans-serif;">Xavier Guereque</span>
</div>
            <div class="cprincipal" style="padding-bottom: 30px;">
                    <div class="h" onmousemove="titulo(1)" onmouseout="clean()">
                        <a href="estatus2.2">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-estatus.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(19)" onmouseout="clean()">
                        <a href="xml2">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-xml.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(2)" onmouseout="clean()">
                        <a href="reporte_eventos3.4">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-reporte-eventos.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(3)" onmouseout="clean()">
                        <a href="ipl2.6.1">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-inspeccion.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(22)" onmouseout="clean()">
                        <a href="ordenes-hid">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-ordenes-hid.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(4)" onmouseout="clean()">
                        <a href="https://app.intercom.io/admins/sign_in" target="_blank">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-intercom.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(14)" onmouseout="clean()">
                        <a href="articulos2">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-articulos.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(5)" onmouseout="clean()">
                        <a href="plataformas2">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-plataformas.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(6)" onmouseout="clean()">
                        <a href="webinar2.2">
                        <img src="https://ingenieria.syscom.mx/imagenes/logo-webinar.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(7)" onmouseout="clean()">
                        <a href="registro-viajes">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-registro-viajes.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(8)" onmouseout="clean()">
                        <a href="comedor3.2">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-comedor.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(9)" onmouseout="clean()">
                        <a href="soporte3">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-soporte.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(20)" onmouseout="clean()">
                        <a href="m2m_service2.1">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-m2m.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(13)" onmouseout="clean()">
                        <a href="paneles_zonas">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-paneles_zonas.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(15)" onmouseout="clean()">
                        <a href="reparaciones-hikvision">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-reparaciones.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(16)" onmouseout="clean()">
                        <a href="control-vuelos-syscom">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-vuelos-hotel.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(17)" onmouseout="clean()">
                        <a href="cursos_online2.8.3">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-cursos-online2.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(21)" onmouseout="clean()">
                        <a href="cursos_presenciales1.3">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-cursos-presenciales.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(24)" onmouseout="clean()">
                        <a href="cursos_hikvision">
                            <img src="logo-cursos-hikvision.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(18)" onmouseout="clean()">
                        <a href="encuesta_3cx">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-encuesta-3cx.png" class="logo">
                        </a>
                    </div>
                    <div class="h" onmousemove="titulo(10)" onmouseout="clean()">
                        <a href="usuarios2.1">
                            <img src="https://ingenieria.syscom.mx/imagenes/logo-usuarios.png" class="logo">
                        </a>
                    </div>
                <div class="h" onmousemove="titulo(11)" onmouseout="clean()">
                    <a href="actualizarcontrasena.php">
                        <img src="https://ingenieria.syscom.mx/imagenes/logo-contrasena.png" class="logo">
                    </a>
                </div>
                <div class="h" onmousemove="titulo(12)" onmouseout="clean()">
                    <a href="https://ingenieria.syscom.mx/cerrar_sesion.php">
                        <img src="https://ingenieria.syscom.mx/imagenes/logo-cerrar-sesion.png" class="logo">
                    </a>
                </div>            </div>
        <script>(function(){window['__CF$cv$params']={r:'73416541c91a7e83',m:'XrZUpPJ9oiI8KMkVQOUYVebDQaIPiQkxvYTRa_6KWQU-1659386496-0-AVJxBQMiuUF8hoRstlCkAvEsSK11TLKVb0JBBqsjuh+ZxGdBlFsK8zZKpfSqAMDobeE40rsOWA5F2ENn099qOftB1wEXn5FZZdtAj5WKR9lw/lmTt3ohQb8u+/dmMWquRuseN8HSHEE0ucyQPPkH9hw=',s:[0x3233aeb7e2,0x5be738f28d],}})();</script>
    
    </body></html>