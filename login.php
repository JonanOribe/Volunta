<?php
session_start();
require_once("php/database.php");

	if(empty($_POST['uname']) || empty($_POST['psw'])){
		$_SESSION['error_login'] = "Debes introducir nombre de usuario y contraseña";
		header("Location: index.php");
	}
	else{
		$usuario = $_POST['uname'];
		$contrasenya = $_POST['psw'];
		
		$resultado = login($con, $usuario, $contrasenya);
		if($resultado == 0){
			$_SESSION['error_login'] = "Datos incorrectos";
			header("Location: index.php");
		}
		else{
			$_SESSION['usuario'] = $resultado['usuario'];
			$_SESSION['contrasenya'] = $resultado['contrasenya'];
            $_SESSION['dni'] = $resultado['dni'];            

            $result2 = mysqli_query($con, "select * from coordinador where persona='".$_SESSION['dni']."'");

		if(mysqli_num_rows($result2)==0){
			header("Location: vistaPrincipalVoluntario.php");
		}
		else{
			header("Location: listadoEventos.php");
		}

			
		}
	}
	
	cerrarConexion($con);
?>