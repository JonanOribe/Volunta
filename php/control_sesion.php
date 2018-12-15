<?php
session_start();
	
	if(!isset($_SESSION['usuario'])){
		header("Location: index.php");
	}
    

    function controlSesionAdmin(){        
        $result = mysqli_query($con, "select * from coordinador where persona='".$_SESSION['dni']."'");
        
        if($result = 0){
			header("Location: index.php");
		}
	}
    
    function controlSesionVoluntario(){
        $result = mysqli_query($con, "select * from voluntario where persona='".$_SESSION['dni']."'");
		if($result = 0){
			header("Location: index.php");
		}
	}




?>