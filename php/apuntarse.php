<?php
require_once("database.php");
require_once("control_sesion_voluntario.php");
$idevento = $_GET['evento'];


$persona=obtenerIdVoluntario($con, $dni);
$idvoluntario=$persona['idvoluntario'];


voluntarioEvento($con, $idvoluntario, $idevento);

echo "¡Te has inscrito correctamente!";
?>