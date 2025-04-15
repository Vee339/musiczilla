<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if (!isset( $_GET['id']))
{
    header ( 'Location: songs.php');
    die();
}

if( isset( $_POST['title'])){

    if( $_POST['title'] and $_POST['views']){

        $query = 'UPDATE songs SET
            title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
            artist_id = "'.mysqli_real_escape_string( $connect, $_POST['artist_id'] ).'",
            album_id = "'.mysqli_real_escape_string( $connect, $_POST['album_id'] ).'",
            date_of_release = "'.mysqli_real_escape_string( $connect, $_POST['date_of_release'] ).'",
            views = "'.mysqli_real_escape_string( $connect, $_POST['views'] ).'",
            youtube_id = "'.mysqli_real_escape_string( $connect, $_POST['youtube_id'] ).'",
            genre = "'.mysqli_real_escape_string( $connect, $_POST['genre'] ).'"
            WHERE id = '.$_GET['id'].'
             LIMIT 1';

        mysqli_query( $connect, $query);

        set_message( 'Song has been updated');

        header('Location: songs.php');

    }
}

if(!isset( $_GET['id']))
{
    header ( 'Location: songs.php');
    die();
}

if( isset( $_GET['id'])){
  $query = 'SELECT * FROM songs WHERE id = '.$_GET['id'].' LIMIT 1';
  $result = mysqli_query( $connect, $query);

  if( !mysqli_num_rows( $result))
  {

      header( 'Location: songs.php');
      die();
  }

  $record = mysqli_fetch_assoc( $result );
}

include( 'includes/header.php');

$query2 = 'SELECT * FROM artists';
$query3 = 'SELECT * FROM albums';

$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);

?>

<section class="sub-header">
    <button class="btn">
        <a href="songs.php">Back</a>
    </button>
    <h2>Edit Song</h2>
</section>

<form method="POST">
    <h3>Edit the information about the Song</h3>
        <div class="inputBox">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlentities($record['title']); ?>">
        </div>
        <div class="inputBox">
            <label for="artist">Artist:</label>
            <select name="artist_id" id="artist">
                <?php
                   while($record2 = mysqli_fetch_assoc($result2)):
                ?>
     
                <option 
                value="<?php echo $record2["id"];?>" 
                <?php if($record2['id'] == $record['artist_id']){ echo 'selected'; }; ?>
                ><?php echo $record2["name"]; ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="inputBox">
            <label for="album">Album:</label>
            <select name="album_id" id="album">
                <?php
                   while($record3 = mysqli_fetch_assoc($result3)):
                ?>
     
                <option 
                value="<?php echo $record3["id"];?>" 
                <?php if($record3['id'] == $record['album_id']){ echo 'selected'; }; ?>
                ><?php echo $record3["name"]; ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="inputBox">
            <label for="releaseDate">Release Date:</label>
            <input type="date" name="date_of_release" id="releaseDate" value="<?php echo $record['date_of_release']; ?>">
        </div>
        <div class="inputBox">
            <label for="total_views">Total Views:</label>
            <input type="number" name="views" id="total_views" value="<?php echo $record['views']; ?>">
        </div>
        <div class="inputBox">
            <label for="youtubeId">YouTube Id:</label>
            <input type="text" name="youtube_id" id="youtubeId" value="<?php echo $record['youtube_id']; ?>">
        </div>
        <div class="inputBox">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" value = "<?php echo $record['genre']; ?>" >
        </div>
        <button type="submit" class="btn">Edit Song</button>
</form>

<?php

include( 'includes/footer.php');

?>