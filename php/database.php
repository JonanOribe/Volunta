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
	

		////////// FUNCIONES CONTROL LOGIN ////////////

		// control admin //
		function controlAdmin($con, $dni){

			$result = mysqli_query($con, "select * from coordinador where persona='".$dni."'");
		
		while($fila = mysqli_fetch_array($result)){
			$coordinadores[] = $fila;
		}
		return $coordinadores;
		}

			// control voluntario //
		function controlVoluntario($con, $dni){

			$resultado = mysqli_query($con, "select * from voluntario where persona='".$dni."'");

		while($fila = mysqli_fetch_array($resultado)){
			$voluntarios[] = $fila;
		}
		return $voluntarios;
		}


	////////////////////////////////////////////// FUNCIONES DE ADMINISTRADOR //////////////////////////////////////////////
	
	// CREAR PERSONAS: VOLUNTARIOS Y COORDINADORES //
			
	
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

	//FUNCIÓN PARA LISTAR EVENTOS
	function listarEventos($con){

		$result = mysqli_query($con, "select e.idevento as id, e.nombre as nombre, l.nombre as lugar, p.nombre as coordinador from lugar l, persona p, coordinador c, evento e where c.persona = p.dni and e.coordinador = c.idcoordinador and e.lugar = l.idlugar;");

		$coordinadores = array();
		while($fila = mysqli_fetch_array($result)){
			$eventos[] = $fila;
		}
		return $eventos;//Devuelvo un array con los datos de todos los coordinadores
	}

	//FUNCIÓN PARA LISTAR MISEVENTOS

	function listarMisEventos($con, $dni){

		$result = mysqli_query($con, "select e.idevento as id, e.nombre as nombre, l.nombre as lugar, p.nombre as coordinador from evento e, persona p, coordinador c, lugar l, evento_voluntario ev, voluntario v where c.persona = p.dni and e.coordinador = c.idcoordinador and e.lugar = l.idlugar and ev.evento=e.idevento and ev.voluntario=v.idvoluntario and v.persona='".$dni."';");

		$coordinadores = array();
		while($fila = mysqli_fetch_array($result)){
			$eventos[] = $fila;
		}
		return $eventos;//Devuelvo un array con los datos de todos los coordinadores
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

		//FUNCIÓN LISTAR LOCALIZACIONES CON LUGARES
		function listarEventosYLugares($con){
			$result = mysqli_query($con, "SELECT idevento,evento.nombre as evento,lugar.nombre as lugar,persona.nombre as coordinador,lugar.longitud,lugar.latitud FROM `evento` JOIN lugar ON evento.lugar=lugar.idlugar JOIN coordinador ON evento.coordinador=coordinador.idcoordinador JOIN persona ON coordinador.persona=persona.dni");
			$localizaciones = array();
			while($fila = mysqli_fetch_array($result)){
				$localizaciones[] = $fila;
			}
			return $localizaciones;//Devuelvo un array con los datos de todos los lugares
		}

	//BUSCAR LOCALIZACIÓN
	function obtenerLocalizacion($con, $lugar){
		$resultado = mysqli_query($con, "select * from lugar where nombre='$lugar'");
		if(mysqli_num_rows($resultado)==0){
			return 0; //Si no existe el lugar devuelvo 0
		}
		else{
			$lugar = mysqli_fetch_array($resultado);
			return $lugar;//Si existe el lugar devuelvo un array con sus datos
		}
	}

	//BUSCAR PERSONA
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

	//BUSCAR HORAS PERSONA
	function obtenerHorasPersona($con, $dni){
		echo $dni;
		$resultado = mysqli_query($con, "select * from persona JOIN voluntario ON persona.dni=voluntario.persona where dni='$dni'");
		if(mysqli_num_rows($resultado)==0){
			return 0; //Si no existe el usuario devuelvo 0
		}
		else{
			$persona = mysqli_fetch_array($resultado);
			return $persona;//Si existe el usuario devuelvo un array con sus datos
		}
	}

	function obtenerIdVoluntario($con, $dni){
		$resultado = mysqli_query($con, "select v.idvoluntario from voluntario v, persona p where p.dni=v.persona and p.dni='$dni'");
		if(mysqli_num_rows($resultado)==0){
			return 0; //Si no existe el usuario devuelvo 0
		}
		else{
			$persona = mysqli_fetch_array($resultado);
			return $persona;
			
		}
	}
	
	//MODIFICAR DATOS PERSONA
	function modificarPersona($con, $dni, $apellido, $tipo_usuario){
		mysqli_query($con, "update persona set apellido='$apellido', tipo_usuario=$tipo_usuario where dni='$dni'");
	}
	
	//ELIMINAR PERSONA
	function borrarPersona($con, $dni){
		mysqli_query($con, "delete from persona where dni='$dni'");
	}
	


	
	////////////////////////////////////////////// FUNCIONES DE EVENTOS //////////////////////////////////////////////
	
	
	//CREAR LOCALIZACIÓN
	function insertarLocalizacion($con, $nombreLugar, $longitud, $latitud){
		mysqli_query($con, "insert into lugar(nombre, longitud, latitud) values('$nombreLugar', '$longitud', '$latitud')");
	}
	//CREAR INCIDENCIAS
	function insertarIncidencia($con, $voluntario, $evento, $tipoIncidencia, $detalleIncidencia){
		mysqli_query($con, "insert into incidencia(voluntario, evento, tipoIncidencia, detalleIncidencia) values('$voluntario', '$evento','$tipoIncidencia', '$detalleIncidencia')");
	}
	//CREAR EVENTO
	function insertarEvento($con, $coordinador, $lugar, $nombre, $dia, $tipo, $estado){
		mysqli_query($con, "insert into evento(coordinador, lugar, nombre, diaEvento, tipo, estado) values('$coordinador', '$lugar', '$nombre', '$dia', '$tipo', '$estado')");
	}


		////// DESPLEGABLES //////

			//localizaciones//
		function desplegableLocalizaciones($con){
			$consulta2 = "select idlugar, nombre FROM lugar;";
			$resultado2 = mysqli_query($con, $consulta2);
	
			
				while($fila = mysqli_fetch_array($resultado2)){
					extract($fila);
					echo "<option value='$idlugar'>$nombre</option>";
				}
	
		}

			//coordinadores//

		function desplegableCoordinadores($con){
			$consulta1 = "select coordinador.idcoordinador, persona.nombre, persona.apellidos
			FROM coordinador INNER JOIN persona ON coordinador.persona = persona.DNI;";
			$resultado1 = mysqli_query($con, $consulta1);
	
			
				while($fila = mysqli_fetch_array($resultado1)){
					extract($fila);
					echo "<option value='$idcoordinador'>$nombre - $apellidos</option>";
				}
	
		}


		function desplegableEventos($con){
			$consulta3 = "select nombre, idevento
			FROM evento";
			$resultado3 = mysqli_query($con, $consulta3);
	
			
				while($fila = mysqli_fetch_array($resultado3)){
					extract($fila);
					echo "<option value='$idevento'>$nombre</option>";
				}
	
		}

	//BORRAR EVENTO

	function borrarEvento($con, $id){
		mysqli_query($con, "delete from evento where id=$id");
	}

	
	//APUNTARSE A UN EVENTO

	function voluntarioEvento($con, $idvoluntario, $idevento){
		mysqli_query($con, "insert into evento_voluntario(voluntario,evento) values('$idvoluntario', '$idevento')");

	}


	//VER APUNTADOS A EVENTOS

		// 
	
		function inscritosEvento($con, $idevento){
			mysqli_query($con, "select p.nombre, e.nombre from persona p, voluntario v, evento e, evento_voluntario ev where v.persona = p.dni and ev.voluntario = v.idvoluntario and ev.evento = e.idevento and ev.evento = '$idevento';");

		}

	//VER EVENTOS DE UN VOLUNTARIO

	function voluntarioInscripciones($con, $idvoluntario){
		mysqli_query($con, "select p.nombre, e.nombre from persona p, voluntario v, evento e, evento_voluntario ev where v.persona = p.dni and ev.voluntario = v.idvoluntario and ev.evento = e.idevento and ev.evento = '$idvoluntario';");

	}






/*
	function modificarEventoNombre($con, $id, $nombre){
		mysqli_query($con, "update evento set nombre='$nombre' where id=$id");
	}

	function modificarEventoLatitud($con, $id, $latitud){
		mysqli_query($con, "update evento set nombre='$latitud' where id=$id");
	}

	function modificarEventoLongitud($con, $id, $longitud){
		mysqli_query($con, "update evento set nombre='$longitud' where id=$id");
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