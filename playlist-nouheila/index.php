<?php
require ('helpers.php');
if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'album' :
            require 'controllers/albumController.php';
            break;

        case 'artist' :
            require 'controllers/artistController.php';
            break;

        case 'song' :
            require 'controllers/songController.php';
            break;

        case 'label' :
            require 'controllers/labelController.php';
            break;

        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;
