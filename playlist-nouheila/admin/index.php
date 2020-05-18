<?php

session_start();

// ne pas oublier de vérifier si l'utilisateur est connecté ET qu'il est admin
//sinon le renvoyer vers la page d'accueil du site

require ('../helpers.php');

if(isset($_GET['controller'])){
	switch ($_GET['controller']){
		case 'artists' :
            require 'controllers/artistController.php';
            break;
        case 'songs':
            require 'controllers/songController.php';
            break;
        case 'albums':
            require 'controllers/albumController.php';
            break;
        case 'labels':
            require 'controllers/labelController.php';
            break;
            
        default :
            require 'controllers/indexController.php';
	}
}
else{
	require 'controllers/indexController.php';
}


if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
}
