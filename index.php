<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

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
      <li><a href="#">Songs</a></li>
      <li><a href="#">Artists</a></li>
      <li><a href="#">Albums</a></li>
    </ul>
  </nav>
</header>
<main>
  <section class="songs">
    <a class="card song" href="#" target="_blank">
      <p class="genre">Hip Hop</p>
       <div class="meta-info">
          <h2>No Lie</h2>
          <p class="artist">Dua Lipa</p>
          <p class="album">Midnight</p>
       </div>
       <div class="info">
         <p class="releaseDate">Date released: 2023-05-11</p>
         <p class="views">Views: 24645234</p>
       </div>
    </a>
  </section>
</main>
</body>
</html>
