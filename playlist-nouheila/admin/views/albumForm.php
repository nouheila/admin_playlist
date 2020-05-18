<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>formulaire album</title>
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

ici formulaire d'un album<br><br>

- nom (champ text)<br>
- année (champ textarea)<br>
- artist lié (champ file)<br><br>
<a href="index.php">retour à l'index</a><br>
<a href ="index.php?controller=albums&action=list">retour à liste des albums</a> <br>

<form action="index.php?controller=albums&action=<?= isset($album) || 
(isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 
'add'?>" method="post" enctype="multipart/form-data">

	<label for="name">Nom :</label>
	<input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? 
	$_SESSION['old_inputs']['name'] : '' ?><?= isset($album) ? $album['name'] : '' ?>" /><br>
	
	<label for="artist_id">Artist :</label>
    <select name="artist_id" id="artist_id">

        <?php foreach($artists as $artist): ?>
            <option value="<?= $artist['id'];?>"
                <?php if(isset($album) && $artist['id'] == $album['artist_id']):?>
                    selected ="selected"
                <?php endif;?>>
                <?= $artist['name'];?>
            </option>
        <?php endforeach; ?>
    </select><br>
	
	<label for="year">Année :</label>
	<input  type="year" name="year" id="year" value="<?= isset($_SESSION['old_inputs']) ? 
	$_SESSION['old_inputs']['year'] : '' ?><?= isset($album) ? $album['year'] : '' ?>" /><br>

	
	
	<input type="submit" value="Enregistrer" />

</form>
	
</body>
</html>


