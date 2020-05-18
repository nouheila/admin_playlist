<?php
function getAllSongs()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM songs');
	$songs =  $query->fetchAll();

    return $songs;
}

function getSong($id){
    $db = dbConnect();
    $query=$db->prepare("SELECT * FROM songs WHERE id = ?");
    $query->execute([
        $id,
    ]);
    $result=$query->fetch();

    return $result;
}
function updateSong($id,$informations){
    $db = dbConnect();
    
    $query=$db->prepare("UPDATE songs SET title = ?, album_id = ?, artist_id =? WHERE id = ?");
    $result = $query -> execute([
        $informations['title'],
        $informations['album_id'],
        $informations['artist_id'],
        $id,

    ]);
    
    return $result;
}

function addSong($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO songs (title, album_id, artist_id) VALUES( :title, :album_id ,:artist_id)");
	$result = $query->execute([
		'title' => $informations['title'],
		'album_id' => $informations['album_id'],
        'artist_id' => $informations['artist_id'],
    ]);
    

	
	return $result;
}

function deleteSong($id)
{
	$db = dbConnect();
	
	//ne pas oublier de supprimer le fichier lié s'il y en un
	//avec la fonction unlink de PHP
	
	$query = $db->prepare('DELETE FROM songs WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}