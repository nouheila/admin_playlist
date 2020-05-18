<?php
function getAllAlbums()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM albums');
	$albums =  $query->fetchAll();

    return $albums;
}

function getAlbum($id){
    $db = dbConnect();
    $query=$db->prepare("SELECT * FROM albums WHERE id = ?");
    $query->execute([
        $id,
    ]);
    $result=$query->fetch();

    return $result;
}
function updateAlbum($id,$informations){
    $db = dbConnect();
    
    $query=$db->prepare("UPDATE albums SET name = ?, year= ?, artist_id =? WHERE id = ?");
    $result = $query -> execute([
        $informations['name'],
        $informations['year'],
        $informations['artist_id'],
        $id,

    ]);
    
    return $result;
}

function addAlbum($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO albums (name, year, artist_id) VALUES( :name, :year ,:artist_id)");
	$result = $query->execute([
		'name' => $informations['name'],
		'year' => $informations['year'],
        'artist_id' => $informations['artist_id'],
    ]);
    

	
	return $result;
}

function deleteAlbum($id)
{
	$db = dbConnect();
	
	//ne pas oublier de supprimer le fichier lié s'il y en un
	//avec la fonction unlink de PHP
	
	$query = $db->prepare('DELETE FROM albums WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}