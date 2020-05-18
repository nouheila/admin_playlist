<?php

function getSongs($albumId = null)
{


    $db = dbConnect();

    if ($albumId != false) {

        $query = $db->prepare('SELECT * FROM songs WHERE album_id = ?');

        $result = $query->execute([$albumId]);

        $songs = $query->fetchAll();

    } else {
        $query = $db->query('SELECT * FROM songs');
        $songs = $query->fetchAll();
    }


    return $songs;
}


function getSong($id)
{

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM songs WHERE id = ?');

    $result = $query->execute([$id]);

    if ($result) {
        return $query->fetch();
    } else {
        return false;
    }

}