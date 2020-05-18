<?php


function getArtists($artistId = false){

    $db = dbConnect();


    if(label_id){
        $quety = $dn->prepare{
            "SELECT artist.* FROM artists JOIN artists_labels ON artists.id =artists_label.artist_id 
            WHERE artists_label.label id=?"
        };
        $query->execute([
            $label_id
        ]);
    }

    else{

        $query = $db->query( 'SELECT * FROM artists');
        $artists = $query->fetchAll();
    }
    return $artists;

}




function getArtist($id){
    $db = dbConnect();
    $query = $db->prepare ('SELECT * FROM artists WHERE id = ?');
    $artists = $query->execute([$id]);
    if($artists){
        return $query->fetch();
    }
    else{
        return false;
    }

}

