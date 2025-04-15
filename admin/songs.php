<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM songs
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Song has been deleted' );
  
  header( 'Location: songs.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT s.id, s.title, ar.name AS artist_name, al.name AS album_name, s.date_of_release, s.views, s.youtube_id, s.genre
  FROM songs s INNER JOIN artists ar ON s.artist_id = ar.id INNER JOIN albums al ON s.album_id = al.id
  ORDER BY date_of_release';
$result = mysqli_query( $connect, $query );

?>

<section class="sub-header">
    <h2>Manage Songs</h2>
    <button class="btn"><a href="songs_add.php">Add New</a></button>
</section>

<div class="entity songs">
  <?php 

  while( $record = mysqli_fetch_assoc($result)):

  ?>

  <div class="record song">
      <div class="item songName"><?php echo $record['title'];?></div>
      <div class="item artistName"><?php echo $record['artist_name'];?></div>
      <div class="item albumName"><?php echo $record['album_name']; ?></div>
      <div class="item releaseDate"><?php echo $record['date_of_release']; ?></div>
      <button class="btn item edit">
          <a href="songs_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
      </button>
      <button class="btn item delete">
          <a href="songs.php?delete=<?php echo $record['id']; ?>">Delete</a>
      </button>
  </div>

  <?php endwhile; ?>
</div>
<?php

include( 'includes/footer.php' );

?>