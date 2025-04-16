<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if( isset($_GET['delete']))
{
    $query = 'DELETE FROM albums WHERE id = '.$_GET['delete'].' LIMIT 1';

    mysqli_query($connect, $query);

    set_message( 'Album has been deleted');

    header('Location: albums.php');

    die();
}

include('includes/header.php');

$query = 'SELECT al.id, al.name AS album_name, ar.name AS artist_name, al.date_of_release FROM albums AS al LEFT JOIN artists AS ar ON al.artist_id = ar.id';

$result = mysqli_query($connect, $query);

?>

<section class="sub-header">
    <h2>Manage Albums</h2>
    <button class="btn"><a href="albums_add.php">Add New</a></button>
</section>

<div class="entity albums">
    <?php 
    
    while( $record = mysqli_fetch_assoc($result)):

    ?>

    <div class="record album">
      <div class="item albumName"><?php echo $record['album_name'];?></div>
      <div class="item artistName"><?php echo $record['artist_name'];?></div>
      <div class="item releaseDate"><?php echo $record['date_of_release']; ?></div>
      <button class="btn item edit">
          <a href="albums_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
      </button>
      <button class="btn item delete">
          <a href="albums.php?delete=<?php echo $record['id']; ?>">Delete</a>
      </button>
    </div>

     <?php endwhile; ?>
    </div>

<?php
   
  include('includes/footer.php');

?>