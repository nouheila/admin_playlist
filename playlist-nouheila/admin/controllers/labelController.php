<?php
require('models/Label.php');

if($_GET['action'] == 'list'){
	$labels = getAllLabels();
	require('views/labelList.php');
}
elseif($_GET['action'] == 'new'){
	require('views/labelForm.php');
}
elseif($_GET['action'] == 'add'){
	
	if(empty($_POST['name']) || empty($_POST['id'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ name est obligatoire !';
		}
		
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?controller=labels&action=add');
		exit;
	}
	else{
		$resultAdd = addLabel($_POST);
		
		$_SESSION['messages'][] = $resultAdd ? 'label enregistré !' : 
		"Erreur lors de l'enregistrement du label... :(";
		
		header('Location:index.php?controller=labels&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){


    // ici aller chercher les infos de l'artiste p

    if(!empty($_POST)){
        if(empty($_POST['name']) || empty($_POST['id'])){
            if (empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champs nom est obligatoire !';
            }
            
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=labels&action=edit&id='.$_GET['id']);
            exit;

        }
        else{
            $result= updateLabel($_GET['id'],$_POST);

                $_SESSION['messages'][] = $result ? 'label mis à jour  !' : 'erreur dans la mise à jour ';


            header('Location:index.php?controller=labels&action=list');
            exit;


        }

        


    }
    else{
        if (!isset($_SESSION['old_inputs'])){
			if(isset($_GET['id'])){
				$label = getLabel($_GET['id']);
				if($label == false){
					$_SESSION['messages'][] = 'Merci de ne pas jouer avec les URLs ! :)';
					header('Location:index.php?controller=labels&action=list');
            		exit;

				}
			}
			else{
				
				header('Location:index.php?controller=labels&action=list');
            		exit;

			}
            
        }
       
        require('views/labelForm.php');

    }

}

elseif($_GET['action'] == 'delete'){
	$result = deleteLabel($_GET['id']);
	if($result){
		$_SESSION['messages'][] = 'labels supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?controller=labels&action=list');
	exit;
}