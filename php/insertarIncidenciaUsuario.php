<?php
require_once("database.php");
require_once("control_sesion_voluntario.php");
$dni=$_SESSION['dni'];

$evento = $_POST["tituloEventoSeleccionado"];
$tipoIncidencia = $_POST["tipoIncidenciaSeleccionada"];
$detalleIncidencia = $_POST["textAreaModal"];

$persona=obtenerIdVoluntario($con, $dni);
$voluntario=$persona['idvoluntario'];


echo $dni;        
echo $voluntario;
echo $evento;
echo $tipoIncidencia;
echo $detalleIncidencia;

	
		if(empty($tipoIncidencia) || empty($detalleIncidencia) || empty($evento)){
			echo "Debes rellenar todos los campos";
		}
		else{

			insertarIncidencia($con, $voluntario, $evento, $tipoIncidencia, $detalleIncidencia);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
        }


	
	cerrarConexion($con);

?>