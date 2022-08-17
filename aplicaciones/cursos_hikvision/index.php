<?php
session_start();
$h14 = $_SESSION["ing_h14"];
if($h14 == "autorizado")
{
    header("Location: panel");
}
else
{
    header("Location: ../../index.php");
}