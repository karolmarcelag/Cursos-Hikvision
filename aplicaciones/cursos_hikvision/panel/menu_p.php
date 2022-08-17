<!DOCTYPE html>

<style>
.cmenu
{
    position: absolute;
    width:50px;
    height: 30px;
    top: 0;
    left:0;
    z-index: 60;
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
</style>
<div class='cmenu'><a href='../../index.php' ><img src='../imagenes/panel.png' height="100%"></a></div>
<div class="info">
    <span style="font-size: 12px; margin-top: 8px; position: absolute; right: 0; margin-right: 25px; font-family: 'Arial', sans-serif;"><?php echo $_SESSION["ing_info"] ?></span>
</div>
