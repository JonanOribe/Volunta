<?php

require_once("database.php");

$tipoIncidencia = $_POST["tipoIncidencia"];
$detalleIncidencia = $_POST["detalleIncidencia"];
	
		if(empty($tipoIncidencia) || empty($detalleIncidencia)){
			echo "Debes rellenar todos los campos";
		}
		else{

			insertarIncidencia($con, $tipoIncidencia, $detalleIncidencia);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
		}
	
	cerrarConexion($con);

?>