<a href="index.php">retour à l'index</a>

<p>Chanson : <?= $song['title'] ?></p>
<p>Artiste :
  <a href="index.php?p=artist&artist_id=<?= $song['artist_id'] ?>">
    <?php
      $artist = getArtist($song['artist_id']);
      echo $artist['name'];
    ?>
  </a>
</p>
<p>Groupe :
  <a href="index.php?p=album&album_id=<?= $song['album_id'] ?>">
    <?php
      $album = getAlbum($song['album_id']);
      echo $album['name'];
    ?>
  </a>
</p>
