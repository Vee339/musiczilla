<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );


$query = 'SELECT * FROM artists ORDER BY monthly_listeners DESC';
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
  <section class="cards artists">
  <?php 
      while( $record = mysqli_fetch_assoc($result)):
  ?>
    <div class="card artist">
      <div class="imgBox">
          <img src="./public/artists/<?php echo $record["photo"]; ?>" alt="">
      </div>
      <div class="info">
        <h2><?php echo $record["name"]; ?></h2>
        <p>Monthly Listeners: <?php echo $record["monthly_listeners"]; ?></p>
      </div>
    </div>
  <?php endwhile; ?>
  </section>
</main>
</body>
</html>
