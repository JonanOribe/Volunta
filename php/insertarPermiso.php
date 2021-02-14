<?php

require_once("database.php");

$codigoPermiso = $_POST["codigoPermiso"];
$fechaSolicitud = $_POST["fechaSolicitud"];
$fechaExpedicion = $_POST["fechaExpedicion"];
$validez = $_POST["validez"];
$tipo = $_POST["tipo"];
$evento = $_POST["evento"];
$expedidoPor = $_POST["expedidoPor"];
	
	if(empty($codigoPermiso) || empty($fechaSolicitud) || empty($fechaExpedicion) || empty($validez) || empty($tipo) || empty($evento) || empty($expedidoPor)){
			echo "Debes rellenar todos los campos";
		}
		else{

			insertarPermiso($con, $codigoPermiso, $fechaSolicitud, $fechaExpedicion, $validez, $tipo, $evento, $expedidoPor);
			echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
		}
	
	

	cerrarConexion($con);

?>