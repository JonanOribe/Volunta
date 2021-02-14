<!DOCTYPE html>
<?php
require_once("php/control_sesion.php");
require_once("php/database.php");
	
	controlSesionAdmin($coordinadores);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Vista administrador</title>

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
    <script src="./src/vistaAdministrador.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
    <script src="./src/mapas.js"></script>
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
                        <a onclick="location.href='listadoEventos.php';" >Eventos</a>
                        </li>
                        <li>
                            <a href="#">Voluntarios</a>
                        </li>
                        <li>
                            <a onclick="location.href='listadoCoordinadores.php';">Coordinadores</a> 
                        </li>
                        <li>
                            <a onclick="location.href='listadoLocalizaciones.php';">Localizaciones</a> 
                        </li>
                        <li>
                        <a onclick="location.href='listadoIncidencias.php';">Incidencias</a> 
                        </li>
						<li>
                            <a  onclick="location.href='listadoPermisos.php';">Permisos</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Informes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#" onclick="location.href='informesEventos.php';">Eventos</a>
                        </li>
                        <li>
                        <a href="#" onclick="location.href='informesVoluntarios.php';">Voluntarios</a>
                        </li>
                        <li>
                            <a href="#" onclick="location.href='informesIncidencias.php';">Incidencias</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestión</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#" onclick="location.href='dashboard.php';">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" onclick="location.href='calendario.php';">Calendario</a>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li>
                                <button type="button" class="btn" id="botonVistaGeneral" onclick="location.href='visEstadoEventos.html';" style="visibility:hidden">Vista general</button>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Modo ADMINISTRADOR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">

                    <button type="button" class="btn" id="botonCrearVoluntario" onclick="window.open('crearVoluntario.html', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Voluntario</button>
                    <button type="button" class="btn" id="botonCrearCoordinador" onclick="window.open('crearCoordinador.html', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Coordinador</button>
                    <button type="button" class="btn" id="botonCrearLocalizacion" onclick="window.open('crearLocalizacion.html', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Localización</button>
                    <button type="button" class="btn" id="botonCrearEvento" onclick="window.open('crearEvento.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Evento</button>
                    <button type="button" class="btn" id="botonCrearPermiso" onclick="window.open('crearPermiso.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');">Crear Permiso</button>

                    <div class="container-fluid">
            </div>
            <br/>
            <div id="campoBusqueda">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busqueda por nombre.." title="Type in a name">
            </div>
            <table id="myTable">
                <tr class="header">
                    <th style="width:60%;">DNI</th>
                    <th style="width:40%;">Nombre</th>
                </tr>
                <?php
      
      require_once("./php/database.php");
          
          echo "<h3>LISTADO PERSONAS</h3>";
          
                     
         $personas = listarPersonas($con);
          
          if(count($personas) == 0){
              echo "<br/>No hay personas<br/>";
          }
          else{
              
              foreach($personas as $persona){
                  echo "<tr>
                          <td>".$persona['dni']."</td>
                          <td>".$persona['nombre']."</td>
                          
                      </tr>";
              }

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
                </div>

                <div id="seccion2" class="w3-container city">
                    <h1>Sección mapa</h1>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>



</body>

</html>   
   
   
