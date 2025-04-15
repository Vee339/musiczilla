<?php

include( 'includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if( isset( $_GET['delete']))
{
    $query = 'DELETE FROM artists WHERE id = '.$_GET['delete'].' LIMIT 1';
    
    mysqli_query($connect, $query);

    set_message( 'Artist has been deleted');

    header('Location: artists.php');

    die();
}

include('includes/header.php');

$query = 'SELECT * FROM artists ORDER BY monthly_listeners DESC';

$result = mysqli_query($connect, $query);

?>

<section class="sub-header">
    <h2>Manage Artists</h2>
    <button class="btn"><a href="artists_add.php">Add New</a></button>
</section>


<div class="entity artists">
    <?php 
    
    while( $record = mysqli_fetch_assoc($result)):

    ?>
 
    <div class="record artist">
      <div class="item name"><?php echo $record['name'];?></div>
      <div class="item photo"><?php echo $record['photo']; ?></div>
      <div class="item monthlyListeners"><?php echo $record['monthly_listeners']; ?></div>
      <button class="btn item edit">
          <a href="artists_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
      </button>
      <button class="btn item delete">
          <a href="artists.php?delete=<?php echo $record['id']; ?>">Delete</a>
      </button>
    </div>

     <?php endwhile; ?>
    </div>

<?php
   
  include('includes/footer.php');

?>