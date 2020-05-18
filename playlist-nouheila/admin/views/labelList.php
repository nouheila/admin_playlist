<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>list label</title>
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

<h2>ici la liste complète des labels : </h2>
<a href="index.php">retour à l'index</a><br>
<a href ="index.php?controller=labels&action=new">ajouter un label</a> <br>


<?php foreach($labels as $label): ?>
    <p><?= htmlspecialchars($label['name'])?>
        <a href="index.php?controller=labels&action=edit&id=<?= $label['id'] ?>"> modifier</a>
        <a href="index.php?controller=labels&action=delete&id=<?= $label['id'] ?>"> supprimer</a>
    </p>
<?php endforeach; ?>


	
</body>
</html>
