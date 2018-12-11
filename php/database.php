<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "volunta1";

	$con = mysqli_connect($server, $user, $pass, $db) or die ("Error al conectar con la base de datos");
	
	function login($con, $usuario, $contrasenya){
		$result = mysqli_query($con, "select * from persona where usuario='".$usuario."' and contrasenya='".$contrasenya."'");
		if(mysqli_num_rows($result)==0){
			return 0; //Si no existe el usuario devuelvo 0
		}
		else{
			$usuario = mysqli_fetch_array($result);
			return $usuario;//Si existe el usuario devuelvo un array con sus datos
		}
	}
	
	function cerrarConexion($con){
		mysqli_close($con);
	}
	
	////////////////////////////////////////////// FUNCIONES DE ADMINISTRADOR //////////////////////////////////////////////
	
		/*
			FUNCIÓN PARA INSERTAR PERSONA
			
			ORDEN SQL --> INSERT INTO `persona`(`dni`, `nombre`, `apellidos`, `telefono`, `direccion`, `ciudad`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
	*/
	function insertarPersona($con, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $email, $usuario, $contrasenya){
		mysqli_query($con, "insert into persona values('$dni', '$nombre', '$apellidos', '$telefono', '$direccion', '$ciudad', '$email', '$usuario', '$contrasenya')");
	}
	function insertarVoluntario($con, $dni, $horas){
		mysqli_query($con, "INSERT INTO `voluntario`(`persona`, `horas`) VALUES ('$dni',$horas)");
	}
	function insertarCoordinador($con, $dni){
		mysqli_query($con, "INSERT INTO `coordinador`(`persona`) VALUES ('$dni')");
	}

	//FUNCIÓN LISTAR PERSONAS
	function listarPersonas($con){
		$result = mysqli_query($con, "select * from persona");
		$personas = array();
		while($fila = mysqli_fetch_array($result)){
			$personas[] = $fila;
		}
		return $personas;//Devuelvo un array con los datos de todos los usuarios
	}

	//FUNCIÓN LISTAR INCIDENCIAS
	function listarIncidencias($con){
		$result = mysqli_query($con, "select * from incidencia");
		$incidencias = array();
		while($fila = mysqli_fetch_array($result)){
			$incidencias[] = $fila;
		}
		return $incidencias;//Devuelvo un array con los datos de todos los usuarios
	}

	//FUNCIÓN LISTAR COORDINADORES
	function listarCoordinadores($con){

		$result = mysqli_query($con, "select persona.dni, persona.nombre
		FROM coordinador INNER JOIN persona ON coordinador.persona = persona.DNI;");

		$coordinadores = array();
		while($fila = mysqli_fetch_array($result)){
			$coordinadores[] = $fila;
		}
		return $coordinadores;//Devuelvo un array con los datos de todos los coordinadores
	}

	//FUNCIÓN LISTAR LOCALIZACIONES
	function listarLocalizaciones($con){
		$result = mysqli_query($con, "select * from lugar");
		$localizaciones = array();
		while($fila = mysqli_fetch_array($result)){
			$localizaciones[] = $fila;
		}
		return $localizaciones;//Devuelvo un array con los datos de todos los lugares
	}


	function obtenerPersona($con, $dni){
		$resultado = mysqli_query($con, "select * from persona where dni='$dni'");
		if(mysqli_num_rows($resultado)==0){
			return 0; //Si no existe el usuario devuelvo 0
		}
		else{
			$persona = mysqli_fetch_array($resultado);
			return $persona;//Si existe el usuario devuelvo un array con sus datos
		}
	}
	
	function modificarPersona($con, $dni, $apellido, $tipo_usuario){
		mysqli_query($con, "update persona set apellido='$apellido', tipo_usuario=$tipo_usuario where dni='$dni'");
	}
	
	function borrarPersona($con, $dni){
		mysqli_query($con, "delete from persona where dni='$dni'");
	}
	


	
	////////////////////////////////////////////// FUNCIONES DE EVENTOS //////////////////////////////////////////////
	
	function insertarLocalizacion($con, $nombreLugar, $longitud, $latitud){
		mysqli_query($con, "insert into lugar(nombre, longitud, latitud) values('$nombreLugar', '$longitud', '$latitud')");
	}

	function insertarIncidencia($con, $tipoIncidencia, $detalleIncidencia){
		mysqli_query($con, "insert into incidencia(incidencia,comentario) values('$tipoIncidencia', '$detalleIncidencia')");
	}

	function insertarEvento($con, $coordinador, $lugar, $nombre, $dia, $tipo, $estado){
		mysqli_query($con, "insert into evento(coordinador, lugar, nombre, dia, tipo, estado) values('$coordinador', '$lugar', '$nombre', '$dia', '$tipo', '$estado')");
	}


		//consulta para desplegable de coordinadores

		function desplegableEventos($con){
			$consulta2 = "select idlugar, nombre FROM lugar;";
			$resultado2 = mysqli_query($con, $consulta2);
	
			
				while($fila = mysqli_fetch_array($resultado2)){
					extract($fila);
					echo "<option value='$idlugar'>$nombre</option>";
				}
	
		}

		//consulta para desplegable de coordinadores

		function desplegableCoordinadores($con){
			$consulta1 = "select coordinador.idcoordinador, persona.nombre, persona.apellidos
			FROM coordinador INNER JOIN persona ON coordinador.persona = persona.DNI;";
			$resultado1 = mysqli_query($con, $consulta1);
	
			
				while($fila = mysqli_fetch_array($resultado1)){
					extract($fila);
					echo "<option value='$idcoordinador'>$nombre - $apellidos</option>";
				}
	
		}

/*
	function insertarEvento($con, $nombre){
		mysqli_query($con, "insert into evento (nombre, latitud, longitud) values('$nombre', '$latitud', '$longitud')");
	}
	

	function modificarEventoNombre($con, $id, $nombre){
		mysqli_query($con, "update evento set nombre='$nombre' where id=$id");
	}

	function modificarEventoLatitud($con, $id, $latitud){
		mysqli_query($con, "update evento set nombre='$latitud' where id=$id");
	}

	function modificarEventoLongitud($con, $id, $longitud){
		mysqli_query($con, "update evento set nombre='$longitud' where id=$id");
	}
	
	function borrarEvento($con, $id){
		mysqli_query($con, "delete from evento where id=$id");
	}
	*/
	
	////////////////////////////////////////////// PRUEBAS //////////////////////////////////////////////
	
	function listarVoluntarios($con){
		$result = mysqli_query($con, "select * from persona where tipo_usuario=1");
		$voluntarios = array();
		while($fila = mysqli_fetch_array($result)){
			$voluntarios[] = $fila;
		}
		return $voluntarios;//Devuelvo un array con los datos de todos los voluntarios
	}
		
?>