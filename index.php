<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );


$query = 'SELECT s.id, s.title, ar.name AS artist_name, al.name AS album_name, s.date_of_release, s.views, s.youtube_id, s.genre
  FROM songs s INNER JOIN artists ar ON s.artist_id = ar.id INNER JOIN albums al ON s.album_id = al.id
  ORDER BY date_of_release';
$result = mysqli_query( $connect, $query );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Music Zilla</title>
  <link href="front-page-styles.css" type="text/css" rel="stylesheet">
  <link href="background.css" type="text/css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./public/music_icon.ico">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
<?php
  
  for($i = 0; $i < 15; $i++ ){

?>
  <div class="firefly"></div>
<?php
  }
?>
<header>
  <h1>Music Zilla</h1>
  <nav>
    <ul>
      <li><a href="./index.php">Songs</a></li>
      <li><a href="./artists.php">Artists</a></li>
      <li><a href="./albums.php">Albums</a></li>
    </ul>
  </nav>
</header>
<main>
  <section class="cards songs">
  <?php 
      while( $record = mysqli_fetch_assoc($result)):
  ?>
    <a class="card song" href="https://youtube.com/watch?v=<?php echo $record['youtube_id']; ?>" target="_blank">
      <p class="genre"><?php echo $record['genre']; ?></p>
       <div class="meta-info">
          <h2><?php echo $record['title']; ?></h2>
          <p class="artist"><?php echo $record['artist_name'];?></p>
          <p class="album"><?php echo $record['album_name']; ?></p>
       </div>
       <div class="info">
         <p class="releaseDate">Date released: <?php echo $record['date_of_release']; ?></p>
         <p class="views">Views: <?php echo $record['views']; ?></p>
       </div>
    </a>
  <?php endwhile; ?>
  </section>
</main>
</body>
</html>
