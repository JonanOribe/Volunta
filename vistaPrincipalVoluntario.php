<!DOCTYPE html>
<?php
require_once("php/control_sesion_voluntario.php");
require_once("php/database.php");
	
controlSesionVolun($voluntarios);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Vista voluntario</title>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./style/stylesAdmin.css">
    <script src="./src/scriptTablasAdmin.js"></script>
    <script src="./src/vistaPrincipalVoluntario.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
    <script src="./src/mapas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

    <script src="./src/informesPerfilVoluntario.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Logo</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Acciones disponibles</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Listados</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a class="botonLateralEventos" onclick="location.href='perfilVoluntario.php';">Mi perfil</a>
                        </li>
                        <li>
                            <a class="botonLateralEventos" onclick="location.href='vistaPrincipalVoluntario.php';">Eventos</a>
                        </li>
                        <li>
                            <a class="botonLateralEventos" onclick="location.href='listadoMisEventos.php';">Mis Eventos</a>
                        </li>
                        <li>
                            <a class="botonLateralEventos" onclick="enviarFiltro()">Informe</a>
                        </li>
                        <li>
                            <a href="#" onclick="window.open('http://127.0.0.1/Volunta/insertarIncidencias.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=600,height=400');">Incidencias</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a onclick="location.href='index.php';" class="article">Log out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Mostrar/Ocultar menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid">
<!--
<button type="button" class="btn" id="botonCrearVoluntario" onclick="window.open('http://127.0.0.1/Volunta/crearVoluntario.html', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Voluntario</button>
<button type="button" class="btn" id="botonCrearCoordinador" onclick="window.open('http://127.0.0.1/Volunta/crearCoordinador.html', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Coordinador</button>
<button type="button" class="btn" id="botonCrearLocalizacion" onclick="window.open('http://127.0.0.1/Volunta/crearLocalizacion.html', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Localización</button>
<button type="button" class="btn" id="botonCrearEvento" onclick="window.open('http://127.0.0.1/Volunta/crearEvento.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Evento</button>
-->
<div class="container-fluid">
</div>
<br/>
<div id="campoBusqueda">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busqueda por evento.." title="Type in a name">
</div>
<table id="myTable">
<tr class="header">
<th style="width:20%;">ID</th>
<th style="width:20%;">Evento</th>
<th style="width:20%;">Localización</th>
<th style="width:20%;">Coordinador</th>
<th style="width:10%;">Más información</th>
<th style="width:10%;">Inscribirse</th>
</tr>
<?php
      require_once("./php/database.php");
      echo "<h3>LISTADO EVENTOS</h3>";
      
     $eventosYLugares=listarEventosYLugares($con);
     if(count($eventosYLugares) == 0){
        echo "<br/>No hay eventos<br/>";
    }
    else{
        
        foreach($eventosYLugares as $eventoyLugar){
              $id_eventoYLugar=$eventoyLugar['idevento'];
              $num_eventoYLugar= 1;
            echo "<tr>
                    <td id= evento".$id_eventoYLugar.">".$id_eventoYLugar."</td>
                    <td>".$eventoyLugar['evento']."</td>
                    <td>".$eventoyLugar['lugar']."</td>
                    <td>".$eventoyLugar['coordinador']."</td>
                    <td><button type='button' class='btn btn-info btn-block' onclick='addRowHandlers()'>Info</button></td>
      <td><button type='button' class='btn btn-info btn-block'><a href='php/apuntarse.php?evento=".$id_eventoYLugar."'>Apuntarse</a></button></td>
      <td style='display: none;'>".$eventoyLugar['longitud']."</td>
      <td style='display: none;'>".$eventoyLugar['latitud']."</td>
 </tr>";
 $num_eventoYLugar++;
}
}


$personaHoras = obtenerHorasPersona($con, $dni);
 
 if(count($personaHoras) == 0){
     echo "<br/>No hay persona<br/>";
 }
 

 function utf8ize($d) { // convertir a UTF-8
   if (is_array($d)) {
       foreach ($d as $k => $v) {
           $d[$k] = utf8ize($v);
       }
   } else if (is_string ($d)) {
       return utf8_encode($d);
   }
   return $d;
}
cerrarConexion($con);
?>
</table>



</div>
</div>



    <!--MODAL-->
    <div class="w3-container">

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                <header class="w3-container w3-blue">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
                    <h2>Información</h2>
                </header>

                <div class="w3-bar w3-border-bottom">
                    <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'tituloEvento');recargarInfo()">Título evento</button>
                    <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'seccion2');cargarMapa()">Mapa</button>
                </div>

                <div id="informacionEvento" class="w3-container city">
                    <h1>Información evento</h1>
                    <p id="tituloEvento"></p>
                    <p id="organizador"></p>
                    <p id="tipoEvento"></p>
                    <p id="participantes"></p>
                    <p id="longitud" style='display: none;'></p>
                    <p id="latitud" style='display: none;'></p>
                </div>

                <div id="seccion2" class="w3-container city">
                    <h1>Sección 2</h1>
                    <div id="espacioMapa">

                    </div>
                </div>

                <div class="w3-container w3-light-grey w3-padding">
                    <button class="w3-button w3-right w3-white w3-border" onclick="document.getElementById('id01').style.display='none'">Close</button>
                </div>
            </div>
        </div>

    </div>
    <!--FIN MODAL-->

    <!--Modal Incidencias-->
    <div class="w3-container">

        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                </div>

                <form class="w3-container" action="/action_page.php">
                    <div class="w3-section">
                        <label><b>Tipo incidencia: </b></label>
                        <select id="tipoIncidenciaSeleccionada">
                                <option value="incidente">Incidente</option>
                                <option value="horario">Horario</option>
                                <option value="materiales">Materiales</option>
                                <option value="otros">Otros</option>
                              </select>
                        <label><b>Título evento: </b></label>
                        <!--Esto debería llegarse con query-->
                        <select id="tituloEventoSeleccionado">
                                <option value="concierto">Concierto</option>
                                <option value="marcha">Marcha</option>
                                <option value="trekking">Trekking</option>
                              </select>
                        <p><label><b>Detalle su incidencia:</b></label></p>
                        <textarea rows="4" cols="65" id="textAreaModal">
                                    </textarea>
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Enviar</button>
                    </div>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <!--Fin Modal Incidencias-->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

<div id="datosOcultosUsuario" style="display:none">
</div>
            <script>

    //Globales para SELECTS
    var tipoIncidenciaSeleccionada;
    
    var tituloEventoSeleccionado;
    //FIN globales para SELECTS

    var textoAreaModal;

function recogerSelects(){

    //Código para SELECTS
    tipoIncidenciaSeleccionada=$('#tipoIncidenciaSeleccionada').find(":selected").text();
    console.log(tipoIncidenciaSeleccionada);

    tituloEventoSeleccionado=$('#tituloEventoSeleccionado').find(":selected").text();
    console.log(tituloEventoSeleccionado);
    //FIN código para SELECTS

    textoAreaModal=$('#textAreaModal').val();
    console.log(textoAreaModal);

}

var ObjetoPersonaHoras=<?= json_encode(utf8ize($personaHoras)); ?>;
console.log(ObjetoPersonaHoras);
$('#datosOcultosUsuario')[0].innerHTML="DNI: "+ObjetoPersonaHoras.dni+", Nombre: "+ObjetoPersonaHoras.nombre+", Horas: "+ObjetoPersonaHoras.horas;


</script>



</body>

</html>
</body>

</html>