<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );


$query = 'SELECT al.id, al.name AS album_name, ar.name AS artist_name, al.date_of_release, al.poster FROM albums AS al LEFT JOIN artists AS ar ON al.artist_id = ar.id';

$result = mysqli_query($connect, $query);

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Music Zilla</title>
  <link href="front-page-styles.css" type="text/css" rel="stylesheet">
  <link href="background.css" type="text/css" rel="stylesheet">
  
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
  <section class="cards albums">
  <?php 
      while( $record = mysqli_fetch_assoc($result)):
  ?>
    <div class="card album">
      <div class="imgBox">
          <img src="./public/albums/<?php echo $record["poster"]; ?>" alt="">
      </div>
      <div class="info">
        <h2><?php echo $record["album_name"]; ?></h2>
        <h3>by <?php echo $record["artist_name"]; ?></h3>
        <p><?php echo $record["date_of_release"]; ?></p>
    </div>
    </div>
  <?php endwhile; ?>
  </section>
</main>
</body>
</html>
