<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>liste chanson</title>
    
   
</head>

<body>
<?php require ('partials/header.php'); ?>

<?php require ('partials/menu.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h2>ici la liste complète des chansons : </h2>
<a href="index.php">retour à l'index</a><br>
<a href ="index.php?controller=songs&action=new">ajouter une chanson</a> <br>



<?php foreach($songs as $song): ?>
    <p><?= htmlspecialchars($song['title'])?>
        <a href="index.php?controller=songs&action=edit&id=<?= $song['id'] ?>"> modifier</a>
        <a href="index.php?controller=songs&action=delete&id=<?= $song['id'] ?>"> supprimer</a>
    </p>



<?php endforeach; ?>


    
</body>
</html>
