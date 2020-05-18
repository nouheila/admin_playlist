<?php
require('models/Song.php');
require('models/Album.php');
require('models/Artist.php');

if($_GET['action'] == 'list'){
	$songs = getAllSongs();
	require('views/songList.php');
}
elseif($_GET['action'] == 'new'){
    $albums = getAllAlbums();
    $artists = getAllArtists();
	require('views/songForm.php');
	
}
elseif($_GET['action'] == 'add'){
	
	if(empty($_POST['title']) || empty($_POST['album_id']) && empty($_POST['artist_id'])){
		
		if(empty($_POST['title'])){
			$_SESSION['messages'][] = 'Le champ titre est obligatoire !';
		}
		if(empty($_POST['album_id'])){
			$_SESSION['messages'][] = 'Le champ album est obligatoire !';
		}
		if(empty($_POST['artist_id'])){
			$_SESSION['messages'][] = 'Le champ artist est obligatoire !';
		}
		
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?controller=songs&action=new');
		exit;
	}
	else{
		$resultAdd = addSong($_POST);
		
		$_SESSION['messages'][] = $resultAdd ? 'chanson enregistré !' : 
		"Erreur lors de l'enregistreent de la chanson... :(";
		
		header('Location:index.php?controller=songs&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){



    // ici aller chercher les infos de l'artiste p

    if(!empty($_POST)){
        if(empty($_POST['title']) || empty($_POST['album_id']) && empty($_POST['artist_id'])){
            if (empty($_POST['title'])){
                $_SESSION['messages'][] = 'Le champs nom est obligatoire !';
			}
			if (empty($_POST['album_id'])){
                $_SESSION['messages'][] = 'Le champs album est obligatoire !';
			}
			
            if(empty($_POST['artist_id'])){
                $_SESSION['messages'][] = 'Le champs artist est obligatoire !';

			}
			
            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=songs&action=edit&id='.$_GET['id']);
            exit;

        }
        else{
            $result= updateSong($_GET['id'],$_POST);

                $_SESSION['messages'][] = $result ? 'chanson mis à jour  !' : 'erreur dans la mise à jour ';


            header('Location:index.php?controller=songs&action=list');
            exit;


        }

        


    }
    else{
        if (!isset($_SESSION['old_inputs'])){
			if(isset($_GET['id'])){
				$song = getSong($_GET['id']);
				if($song == false){
					$_SESSION['messages'][] = 'Merci de ne pas jouer avec les URLs ! :)';
					header('Location:index.php?controller=songs&action=list');
            		exit;

				}
			}
			else{
				
				header('Location:index.php?controller=songs&action=list');
            		exit;

			}
            
		}
		
		$albums = getAllAlbums();
        $artists = getAllArtists();
        require('views/songForm.php');

    }

}
elseif($_GET['action'] == 'delete'){
	$result = deleteSong($_GET['id']);
	if($result){
		$_SESSION['messages'][] = 'chanson supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?controller=songs&action=list');
	exit;
}