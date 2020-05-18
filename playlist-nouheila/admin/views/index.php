<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>index admin</title>
</head>

<body>

<?php require ('partials/header.php'); ?>

<?php require ('partials/menu.php'); ?>

<h1>tableau de bord de l'admin</h1>
<a href="../index.php">retour à l'index</a><br>
<a href ="index.php?controller=artists&action=list">Gestion des artists</a> <br>
<a href ="index.php?controller=albums&action=list">Gestion des albums</a><br>
<a href ="index.php?controller=songs&action=list">Gestion des songs</a><br>
<a href ="index.php?controller=labels&action=list">Gestion des labels</a><br>

    
</body>
</html>




