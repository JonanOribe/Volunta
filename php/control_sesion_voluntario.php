<?php
session_start();
require_once("database.php");
$dni=$_SESSION['dni'];

$voluntarios = controlVoluntario($con, $dni);

	if(!isset($_SESSION['usuario'])){
		header("Location: index.php");
	}
        
	function controlSesionVolun($voluntarios){   
	
		
        if(count($voluntarios) == 0){
          header("Location: index.php");				   
        } 
    }
?>