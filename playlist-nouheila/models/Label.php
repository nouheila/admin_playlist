<?php
function getAllLabels(){
    $db = dbConnect();

    $query=$db->query('SELECT * FROM labels');
    $labels=$query->fetchAll();
    return $labels;
}

function getLabel($id){

    $db = dbConnect();

    $query=$db->prepare("SELECT * FROM labels WHERE id=?");
    $query->execute([
        $id
    ]);

    $result=$query->fetch();

    return $result;
}