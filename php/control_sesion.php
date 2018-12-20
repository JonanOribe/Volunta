<?php
session_start();
require_once("database.php");
$dni=$_SESSION['dni'];

$coordinadores = controlAdmin($con, $dni);
	if(!isset($_SESSION['usuario'])){
		header("Location: index.php");
	}
    
    function controlSesionAdmin($coordinadores){   
		
			
              if(count($coordinadores) == 0){
				header("Location: index.php");				   
              }  

			}
?>