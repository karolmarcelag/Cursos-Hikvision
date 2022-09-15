<?php

?>
<link rel="stylesheet" type="text/css" href="../css/menu.css" media="all" />
<script src="../javascript/jquery-3.3.1.js"></script>
<script src="../javascript/jquery-3.3.1.min.js"></script>
<div class="menu">
    <div class="ligas">
        <?php
        $fecha_actual = date('Y-m-d');
        echo "<a href='index.php?fecha=$fecha_actual' title='Calendario'><button class='btn_menu'><img src='../imagenes/calendario.png' width='12px'> Calendario</button></a>";
        echo "<a href='registros.php' title='Registros'><button class='btn_menu'><img src='../imagenes/reporte.png' width='12px'> Registros</button></a>";
        echo "<a href='registros_pendientes.php' title='Registros pendientes'><button class='btn_menu'><img src='../imagenes/copiar.png' width='12px'> Registros pendientes</button></a>";
        ?>
    </div>
</div>
