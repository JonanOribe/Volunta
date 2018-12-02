<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
		<title>Crear Voluntario</title>
	
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
	

<!--CUIDADO!! Al estar montado en local, sólo funciona si usando XAMPP metes el proyecto Volunta dentro de htdocs!*/-->

<div class="col-xs-7"></div>
	<form method='post' action='http://127.0.0.1/Volunta/php/insertarEvento.php'>

		
		<ul class="flex-outer">	

		      <li>
		        <div class="form-group">
                    
                <label for="coordinador">Coordinador:</label><br>
                <select class="selectpicker" id="coordinador" name='coordinador' >
                    <?php
                    require_once("php/database.php");
                    desplegableCoordinadores($con);	        
                    ?>
                </select>
		        </div>
              </li>
              <li>
		        <div class="form-group">
                    
                <label for="localizacion">Localización:</label><br>
                <select class="selectpicker" id="localizacion" name='localizacion' >
                    <?php
                    require_once("php/database.php");
                    desplegableEventos($con);	        
                    ?>
                </select>
		        </div>
              </li>
              <li>	
		        <div class="form-group">
			        <label for="nombreEvento">Nombre:</label>

				        <input type="text" class="form-control" id="nombreEvento"  name='nombreEvento' placeholder="Asigna un nombre al evento">
			
			      </div>
              </li>

               <li>	
		        <div class="form-group">
			        <label for="diaEvento">Dia:</label>

				        <input type="date" class="form-control" id="diaEvento"  name='diaEvento'>
			
			      </div>
              </li>
                 


              <li>	
		        <div class="form-group">
			        <label for="tipo">Tipo de Evento:</label><br>

				        <input type="radio" name="tipo" value="concierto" checked> Concierto<br>
                        <input type="radio" name="tipo" value="conferencia"> Conferencia<br>
                        <input type="radio" name="tipo" value="mercado"> Mercado<br>
                        <input type="radio" name="tipo" value="manifestacion"> Manifestación<br>
			
			      </div>
              </li>
              
              <li>	
		        <div class="form-group">
			        <label for="estado">Estado del Evento:</label><br>

				        <input type="radio" name="estado" value="0" checked> Se necesitan inscripciones<br>
                        <input type="radio" name="estado" value="1"> Cupo lleno<br>

			
			      </div>
              </li>
				
		      <input type='submit'class="btn btn-primary">
	
		</ul>
	</form>
</div>

</body>
</html>