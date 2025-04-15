<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if (!isset( $_GET['id']))
{
    header ( 'Location: artists.php');
    die();
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['monthly_listeners'] )
  {
    
    $query = 'UPDATE artists SET
      `name` = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      photo = "'.mysqli_real_escape_string( $connect, $_POST['photo'] ).'",
      monthly_listeners = "'.mysqli_real_escape_string( $connect, $_POST['monthly_listeners'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Artist has been updated' );
    
  }

  header( 'Location: artists.php' );
  die();
  
}

if( isset( $_GET['id'])){
    $query = 'SELECT * FROM artists WHERE id = '.$_GET['id'].' LIMIT 1';
    $result = mysqli_query( $connect, $query);

    if( !mysqli_num_rows( $result))
    {

        header( 'Location: artists.php');
        die();
    }

    $record = mysqli_fetch_assoc( $result );
}

include( 'includes/header.php');

?>

<section class="sub-header">
    <button class="btn">
        <a href="artists.php">Back</a>
    </button>
    <h2>Edit Artist</h2>
</section>

<form method="POST">
    <h3>Edit the information about the artist</h3>
    <div class="inputBox">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name']); ?>">
    </div>
    <div class="inputBox">
        <label for="photo">Photo File Name:</label>
        <input type="text" name="photo" id="photo" value="<?php echo htmlentities( $record['photo']); ?>">
    </div>
    <div class="inputBox">
        <label for="monthly_listeners">Monthly Listeners:</label>
        <input type="number" name="monthly_listeners" id="monthly_listeners" value="<?php echo htmlentities($record['monthly_listeners']); ?>">
    </div>
    <button type="submit" class="btn">Edit Artist</button>
</form>

<?php

include( 'includes/footer.php');

?>