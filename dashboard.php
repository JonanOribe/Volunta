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

    <title>Vista dashboard</title>

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

    <link rel="stylesheet" type="text/css" href="./style/gridster.css">
    <link rel="stylesheet" type="text/css" href="./dist/jquery.gridster.min.css">

    <script src="./dist/chart.bundle.js"></script>
	<script src="./src/chartUtils.js"></script>

    <script src="./dist/jquery.gridster.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>

	<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
	<link rel="stylesheet" href="./style/gauge.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.6/gauge.min.js"></script>
	<script src="./src/dashboardGauge.js"></script>
	<link rel="stylesheet" href="./style/dashboard.css">

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
                            <a onclick="location.href='listadoPersonas.php';">Voluntarios</a>
                        </li>
                        <li>
                            <a onclick="location.href='listadoCoordinadores.php';">Coordinadores</a> 
                        </li>
                        <li>
                            <a onclick="location.href='listadoLocalizaciones.php';">Localizaciones</a> 
                        </li>
                        <li>
                            <a  onclick="location.href='listadoIncidencias.php';">Incidencias</a>
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


            <div class="gridster">
    <ul>
        <li data-row="1" data-col="1" data-sizex="5" data-sizey="5"><div id="container" style="width: 100%;">
		<canvas id="canvas"></canvas>
	</div></li>
        <li data-row="1" data-col="3" data-sizex="5" data-sizey="5"><div id="container2" style="width: 100%;">
		<canvas id="canvasRadar"></canvas>
	</div></li>
	<li data-row="6" data-col="1" data-sizex="6" data-sizey="5"><div id="marcoCanvas"><canvas id="chart-2"></canvas></div></li>
        <li data-row="6" data-col="3" data-sizex="4" data-sizey="5" style="
    padding-top: 30px;"><div>
<canvas id="foo"></canvas>
    <div id="preview-textfield"></div>
</div></li>
        <!--<li data-row="6" data-col="5" data-sizex="2" data-sizey="5"><div class="outer"><div id="container-rpm" class="chart-container"></div></div></li>-->
    </ul>
</div>

<script type="text/javascript">
    var gridster;

    $(function () {

        var log = document.getElementById('log');

        gridster = $(".gridster ul").gridster({
            widget_base_dimensions: [100, 55],
            widget_margins: [5, 5],
            autogrow_cols: true,
            resize: {
                enabled: true
            }
        }).data('gridster');


    });
</script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


	<button id="randomizeData">Randomize Data</button>
	<button id="addDataset">Add Dataset</button>
	<button id="removeDataset">Remove Dataset</button>
	<button id="addData">Add Data</button>
	<button id="removeData">Remove Data</button>
	<script>
		var MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: MONTHS,
			datasets: [{
				label: '18 a 25 años',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [12,9,24,5,7,12,1]
			}, {
				label: 'Entre 26 a 40 años',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [4,6,11,23,4,1,4]
			}, {
				label: 'Mayores de 40',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [7,5,6,2,4,3,7]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Número de voluntarios por mes'
					}
				}
			});

			window.myRadar = new Chart(document.getElementById('canvasRadar'), config);

		};

		
    </script>
    
    <script>

		var color = Chart.helpers.color;
		var config = {
			type: 'radar',
			data: {
				labels: [['Carrera', 'benéfica'], 'Concierto', 'Reunión',['Marcha','montaña'], 'Otros'],
				datasets: [{
					label: '18 a 25 años',
					backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
					data: [7,3,4,2,5]
				}, {
					label: '26 años o más',
					backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
					borderColor: window.chartColors.blue,
					pointBackgroundColor: window.chartColors.blue,
					data: [2,3,2,1,8]
				}]
			},
			options: {
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Voluntarios por tipo de evento'
				},
				scale: {
					ticks: {
						beginAtZero: true
					}
				}
			}
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myRadar.update();
		});

        var colorNames = Object.keys(window.chartColors);
        /*
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];

			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				borderColor: newColor,
				backgroundColor: color(newColor).alpha(0.2).rgbString(),
				pointBorderColor: newColor,
				data: [],
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myRadar.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				config.data.labels.push('dataset #' + config.data.labels.length);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myRadar.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myRadar.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.pop(); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myRadar.update();
        });*/
        document.getElementById('randomizeData').addEventListener('click', function() {
			var zero = Math.random() < 0.2 ? true : false;
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return zero ? 0.0 : randomScalingFactor();
				});

			});
			window.myBar.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[barChartData.datasets.length % colorNames.length];
			var dsColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + (barChartData.datasets.length + 1),
				backgroundColor: color(dsColor).alpha(0.5).rgbString(),
				borderColor: dsColor,
				borderWidth: 1,
				data: []
			};

			for (var index = 0; index < barChartData.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			barChartData.datasets.push(newDataset);
			window.myBar.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (barChartData.datasets.length > 0) {
				var month = MONTHS[barChartData.labels.length % MONTHS.length];
				barChartData.labels.push(month);

				for (var index = 0; index < barChartData.datasets.length; ++index) {
					// window.myBar.addData(randomScalingFactor(), index);
					barChartData.datasets[index].data.push(randomScalingFactor());
				}

				window.myBar.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			barChartData.datasets.pop();
			window.myBar.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			barChartData.labels.splice(-1, 1); // remove the label first

			barChartData.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myBar.update();
		});
	</script>


		<script>
		var presets = window.chartColors;
		var utils = Samples.utils;
		var inputs = {
			min: -100,
			max: 100,
			count: 8,
			decimals: 2,
			continuity: 1
		};

		function generateData(config) {
			return utils.numbers(Chart.helpers.merge(inputs, config || {}));
		}

		function generateLabels(config) {
			return utils.months(Chart.helpers.merge({
				count: inputs.count,
				section: 3
			}, config || {}));
		}

		var options = {
			maintainAspectRatio: false,
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				}
			},
			plugins: {
				filler: {
					propagate: false
				}
			},
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		};

		[false, 'origin', 'start', 'end'].forEach(function(boundary, index) {

			// reset the random seed to generate the same data for all charts
			utils.srand(8);

			new Chart('chart-' + index, {
				type: 'line',
				data: {
					labels: generateLabels(),
					datasets: [{
						backgroundColor: utils.transparentize(presets.red),
						borderColor: presets.red,
						data: [13,17,5,8,4,5,9,12],
						label: 'Actos benéficos',
						fill: boundary
					},
					{
						backgroundColor: utils.transparentize(presets.green),
						borderColor: presets.green,
						data: [19,3,8,4,7,8,7,10],
						label: 'Reuniones',
						fill: null
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'Eventos por mes',
						display: true
					}
				})
			});
		});

		// eslint-disable-next-line no-unused-vars
		function toggleSmooth(btn) {
			var value = btn.classList.toggle('btn-on');
			Chart.helpers.each(Chart.instances, function(chart) {
				chart.options.elements.line.tension = value ? 0.4 : 0.000001;
				chart.update();
			});
		}

		// eslint-disable-next-line no-unused-vars
		function randomize() {
			var seed = utils.rand();
			Chart.helpers.each(Chart.instances, function(chart) {
				utils.srand(seed);

				chart.data.datasets.forEach(function(dataset) {
					dataset.data = generateData();
				});

				chart.update();
			});
		}
	</script>

</body>

</html>   
   
   
