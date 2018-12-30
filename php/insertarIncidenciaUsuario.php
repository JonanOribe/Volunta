<?php

require_once("database.php");

$tipoIncidencia = $_POST["tipoIncidenciaSeleccionada"];
$detalleIncidencia = $_POST["tituloEventoSeleccionado"];
	
		if(empty($tipoIncidencia) || empty($detalleIncidencia)){
			echo "Debes rellenar todos los campos";
		}
		else{

			insertarIncidencia($con, $tipoIncidencia, $detalleIncidencia);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
        }
        
        echo $tipoIncidencia;
        echo $detalleIncidencia;

	
	cerrarConexion($con);

?>