
<a href="index.php">retour à l'index</a>

<p>Nom de l'album : <?= $album['name'] ?></p>

<p>date : <?= $album['year'] ?></p>

<p>Artiste : <a href="index.php?p=artist&artist_id=<?= $artist['id'] ?>"><?= $artist['name'] ?></a></p>

Chansons :

<?php if(sizeof($songs) > 0): ?>
  <ul>
  <?php foreach($songs as $song): ?>
    <li><a href="index.php?p=song&song_id=<?= $song['id'] ?>"><?= $song['title'] ?></a></li>
  <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p>aucune chanson pour cet album</p>
<?php endif; ?>
