<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if( isset( $_POST['name'])){

    if( $_POST['name'] and $_POST['total_views']){

        $query = 'INSERT INTO albums(`name`, artist_id, poster, total_views, date_of_release, number_of_songs) VALUES(
            "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['artist_id'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['poster'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['total_views'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['date_of_release'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['number_of_songs'] ).'"
         )';

        mysqli_query( $connect, $query);

        set_message( 'Album has been added');

        header('Location: albums.php');

    }
}

include( 'includes/header.php');

$query = 'SELECT * FROM artists';

$result = mysqli_query($connect, $query);

?>

<section class="sub-header">
    <button class="btn">
        <a href="albums.php">Back</a>
    </button>
    <h2>Add Album</h2>
</section>

<form method="POST">
    <h3>Fill the information about the Album</h3>
        <div class="inputBox">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
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
            <label for="poster">Album Poster:</label>
            <input type="text" name="poster" id="poster">
        </div>
        <div class="inputBox">
            <label for="total_views">Total Views:</label>
            <input type="number" name="total_views" id="total_views" >
        </div>
        <div class="inputBox">
            <label for="date_of_release">Date of Release:</label>
            <input type="date" name="date_of_release" id="date_of_release" >
        </div>
        <div class="inputBox">
            <label for="number_of_songs">Number of Songs:</label>
            <input type="number" name="number_of_songs" id="number_of_songs" >
        </div>
        <button type="submit" class="btn">Add Artist</button>
</form>


<?php

include( 'includes/footer.php');

?>