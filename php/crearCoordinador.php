<?php

require_once("database.php");

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$email = $_POST["email"];
$ususario = $_POST["usuario"];
$contrasenya = $_POST["contrasenya"];



	
		if(empty($dni) || empty($nombre) || empty($apellidos) || empty($telefono) || empty($direccion) || empty($ciudad) || empty($email)){
			echo "Debes rellenar todos los campos";
		}
		else{
			insertarPersona($con, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $email, $ususario, $contrasenya);
			//header("Location: admin.php");
			insertarCoordinador($con, $dni);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
		}
	
	

	cerrarConexion($con);

?>