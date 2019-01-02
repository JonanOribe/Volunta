<?php

require_once("database.php");

$coordinador = $_POST["coordinador"];
$localizacion = $_POST["localizacion"];
$nombreEvento = $_POST["nombreEvento"];
$diaEvento = $_POST["diaEvento"];
$tipo = $_POST["tipo"];
$estado = $_POST["estado"];


	
		if(empty($coordinador) || empty($localizacion) || empty($nombreEvento) || empty($diaEvento) || empty($tipo)){
			echo "Debes rellenar todos los campos";
		}
		else{

			insertarEvento($con, $coordinador, $localizacion, $nombreEvento, $diaEvento, $tipo, $estado);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
		}
	
	

	cerrarConexion($con);

?>