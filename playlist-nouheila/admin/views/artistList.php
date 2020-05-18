<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>artist list</title>
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

<h2>ici la liste complète des artistes : </h2>
<a href="index.php">retour à l'index</a><br>
<a href ="index.php?controller=artists&action=new">ajouter un artist</a> <br>


<?php foreach($artists as $artist): ?>
    <p><?= htmlspecialchars($artist['name'])?>
        <a href="index.php?controller=artists&action=edit&id=<?= $artist['id'] ?>"> modifier</a>
        <a href="index.php?controller=artists&action=delete&id=<?= $artist['id'] ?>"> supprimer</a>
    </p>
<?php endforeach; ?>


	
</body>
</html>
