<!DOCTYPE html>
<html>

<head>
    <title>Informes eventos</title>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./style/stylesAdmin.css">
    <script src="./src/scriptTablasAdmin.js"></script>
    <script src="./src/vistaAdministrador.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


    <script src="./src/informesEventos.js"></script>
    <link rel="stylesheet" href="./style/informesEventos.css">
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
                            <a onclick="location.href='listadoEventos.php';">Eventos</a>
                        </li>
                        <li>
                            <a onclick="location.href='listadoPersonas.php';">Voluntarios</a>
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
            <h1>Haga click para generar el informe</h1>
            <div>
                <div class="row">
                    <div class="column" style="visibility: hidden">
                        <form id="formularioInformesEventos">
                            <div class="combobox" data-add="true">
                                Eventos a filtrar:
                                <select id="seleccionComboBox">
                                    <option value="todos">Todos</option>
                                    <option value="conciertos">Conciertos</option>
                                    <option value="carreras">Carreras</option>
                                    <option value="charlas">Charlas</option>
                                    <option value="actividadesMontaña">Actividades montaña</option>
                                </select>
                            </div>
                            <!--.combobox-->
                    </div>
                    <div class="column" style="visibility: hidden">
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-3 col-form-label">Rango de fechas: </label>
                            <div class="col-9">
                                <input id="dateTime" type="text" name="datetimes" />
                            </div>
                        </div>
                    </div>
                </div>


                <button type="button" class="btn btn-primary btn-block" onclick="enviarFiltro()">Generar Informe</button>
                <p id="datosOcultosEventos" style="display:none"></p>
                </form>
            </div>

            <?php
      
      require_once("./php/database.php");
          
          //echo "<h3>LISTADO PERSONAS</h3>";
          
                     
         $eventos = listarEventos($con);
         $listadoEventos=[];
          
          if(count($eventos) == 0){
              echo "<br/>No hay personas<br/>";
          }
          else{
              
              foreach($eventos as $evento){
                  //echo "<tr>
                  //        <td>".$incidencia['tipoIncidencia']."</td>
                  //        <td>".$incidencia['detalleIncidencia']."</td>
                  //        
                  //    </tr>";

                      array_push($listadoEventos,$evento['nombre'],$evento['lugar']);            
              }

          }
          
          cerrarConexion($con);

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
          
          ?>

          <script>
             var arrayEventos=<?= json_encode(utf8ize($listadoEventos)); ?>;
             console.log(arrayEventos);
             $('#datosOcultosEventos')[0].innerHTML=arrayEventos;
          </script>
          
              <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
</body>

</html>