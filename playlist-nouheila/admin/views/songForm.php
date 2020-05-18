<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>formulaire chanson</title>
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

ici formulaire d'une chanson<br><br>

- titre (champ text)<br>
- artist lié  (champ textarea)<br>
- album lié(champ file)<br><br>
<a href="index.php">retour à l'index</a><br>
<a href ="index.php?controller=songs&action=list">retour sur la liste des songs</a> <br>

<form action="index.php?controller=songs&action=<?= isset($song) || 
(isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='.$_GET['id'] : 
'add'?>" method="post" enctype="multipart/form-data">

	<label for="title">titre :</label>
	<input  type="title" name="title" id="title" value="<?= isset($_SESSION['old_inputs']) ? 
	$_SESSION['old_inputs']['title'] : '' ?><?= isset($song) ? $song['title'] : '' ?>" /><br>
	
	<label for="artist_id">Artist :</label>
    <select name="artist_id" id="artist_id">

        <?php foreach($artists as $artist): ?>
        <option value="<?= $artist['id'];?>"<?php if(isset($song) && $artist['id'] == $song['artist_id']):?>selected ="selected"
		<?php endif;?>><?= $artist['name'];?></option>
        <?php endforeach; ?>
    </select><br>
    <label for="album_id">Album :</label>
    <select name="album_id" id="album_id">

        <?php foreach($albums as $album): ?>
        <option value="<?= $album['id'];?>"<?php if(isset($song) && $album['id'] == $song['album_id']):?>selected ="selected"
		<?php endif;?>><?= $album['name'];?></option>
        <?php endforeach; ?>
    </select><br>
	
	

	
	
	<input type="submit" value="Enregistrer"/>

</form>
	
</body>
</html>


