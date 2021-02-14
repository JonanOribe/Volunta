<?php

require_once("database.php");

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$email = $_POST["email"];
$edad = $_POST["edad"];
$sexo = $_POST["sexo"];
$ususario = $_POST["usuario"];
$contrasenya = $_POST["contrasenya"];



	
		if(empty($dni) || empty($nombre) || empty($apellidos) || empty($telefono) || empty($direccion) || empty($ciudad) || empty($email) || empty($edad) || empty($sexo) ){
			echo "Debes rellenar todos los campos";
		}
		else{
			insertarPersona($con, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $email, $ususario, $contrasenya, $edad, $sexo);
			//header("Location: admin.php");
			insertarCoordinador($con, $dni);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
		}
	
	

	cerrarConexion($con);

?>