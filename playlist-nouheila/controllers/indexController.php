<?php

require_once 'models/album.php';
require_once 'models/artist.php';
require_once 'models/song.php';


$songs = getSongs();

include 'views/index.php';
