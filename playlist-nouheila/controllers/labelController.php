<?php
require('models/Label.php');
require('models/Artist.php');

if(isset($_GET['id'])){
    //afficher un label en particulier 
    //vérifier que le label existe sinon rediriger
    //aller chercher le label en particulier dans la DB
    $label =getLabel($_GET['id']);
    
}
else{
    //afficher la liste des labels 
    //aller chercher tous les labels via la foncyion getAllLabels
    //include Views/label.php

}