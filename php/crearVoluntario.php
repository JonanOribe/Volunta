<?php

require_once("database.php");

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$email = $_POST["email"];
$fechaNac = $_POST["fechaNac"];
$sexo = $_POST["sexo"];
$ususario = $_POST["usuario"];
$contrasenya = $_POST["contrasenya"];
$horas = 0;


	
		if(empty($dni) || empty($nombre) || empty($apellidos) || empty($telefono) || empty($direccion) || empty($ciudad) || empty($email) || empty($fechaNac) || empty($sexo) ){
			echo "Debes rellenar todos los campos";
		}
		else{
			insertarPersona($con, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $email, $ususario, $contrasenya, $fechaNac, $sexo);
			//header("Location: admin.php");
			insertarVoluntario($con, $dni, $horas);
			echo '<BUTTON onclick="window.close();">Close me.</BUTTON>';
		}
	
	

	cerrarConexion($con);

?>