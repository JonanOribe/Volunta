<?php

require_once("database.php");

$nombreLugar = $_POST["nombreLugar"];
$longitud = $_POST["longitud"];
$latitud = $_POST["latitud"];



	
		if(empty($nombreLugar) || empty($longitud) || empty($latitud)){
			echo "Debes rellenar todos los campos";
		}
		else{

			insertarLocalizacion($con, $nombreLugar, $longitud, $latitud);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
		}
	
	

	cerrarConexion($con);

?>