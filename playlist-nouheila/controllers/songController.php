<?php

if(!isset($_GET['song_id']) || !ctype_digit($_GET['song_id'])){
  header('Location:index.php');
  exit;
}

require_once 'models/album.php';
require_once 'models/artist.php';
require_once 'models/song.php';

$song = getSong($_GET['song_id']);

if($song == false){
  header('Location:index.php');
  exit;
}

include 'views/song.php';
