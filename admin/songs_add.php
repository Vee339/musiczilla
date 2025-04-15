<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if( isset( $_POST['title'])){

    if( $_POST['title'] and $_POST['views']){

        $query = 'INSERT INTO songs(title, artist_id, album_id, date_of_release, views, youtube_id, genre) VALUES(
            "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['artist_id'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['album_id'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['date_of_release'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['views'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['youtube_id'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['genre'] ).'"
         )';

        mysqli_query( $connect, $query);

        set_message( 'Song has been added');

        header('Location: songs.php');

    }
}

include( 'includes/header.php');

$query = 'SELECT * FROM artists';
$query2 = 'SELECT * FROM albums';

$result = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query2);

?>

<section class="sub-header">
    <button class="btn">
        <a href="songs.php">Back</a>
    </button>
    <h2>Add Song</h2>
</section>

<form method="POST">
    <h3>Fill the information about the Song</h3>
        <div class="inputBox">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="inputBox">
            <label for="artist">Artist:</label>
            <select name="artist_id" id="artist">
                <option value="" selected disabled>Select From The List</option>
                <?php
                   while($record = mysqli_fetch_assoc($result)):
                ?>
     
                <option value="<?php echo $record["id"];?>"><?php echo $record["name"]; ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="inputBox">
            <label for="album">Album:</label>
            <select name="album_id" id="album">
                <option value="" selected disabled>Select From The List</option>
                <?php
                   while($record2 = mysqli_fetch_assoc($result2)):
                ?>
     
                <option value="<?php echo $record2["id"];?>"><?php echo $record2["name"]; ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="inputBox">
            <label for="releaseDate">Release Date:</label>
            <input type="date" name="date_of_release" id="releaseDate">
        </div>
        <div class="inputBox">
            <label for="total_views">Total Views:</label>
            <input type="number" name="views" id="total_views" >
        </div>
        <div class="inputBox">
            <label for="youtubeId">YouTube Id:</label>
            <input type="text" name="youtube_id" id="youtubeId" >
        </div>
        <div class="inputBox">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" >
        </div>
        <button type="submit" class="btn">Add Song</button>
</form>

<?php

include( 'includes/footer.php');

?>