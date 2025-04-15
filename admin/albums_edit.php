<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if( isset( $_POST['name'])){

    if( $_POST['name'] and $_POST['total_views']){

        $query = 'UPDATE albums SET `name` = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
        artist_id = "'.mysqli_real_escape_string( $connect, $_POST['artist_id'] ).'",
        poster = "'.mysqli_real_escape_string( $connect, $_POST['poster'] ).'",
        total_views = "'.mysqli_real_escape_string( $connect, $_POST['total_views'] ).'",
        date_of_release = "'.mysqli_real_escape_string( $connect, $_POST['date_of_release'] ).'",
        number_of_songs = "'.mysqli_real_escape_string( $connect, $_POST['number_of_songs'] ).'"
        WHERE id = '.$_GET['id'].' LIMIT 1';

        mysqli_query( $connect, $query);

        set_message( 'Album has been updated');

        header('Location: albums.php');

    }
}

if(!isset( $_GET['id']))
{
    header ( 'Location: albums.php');
    die();
}

if ( isset( $_GET['id'])){
    $query = 'SELECT * FROM albums WHERE id = '.$_GET['id'].' LIMIT 1';

    $result = mysqli_query( $connect, $query);

    if(!mysqli_num_rows( $result))
    {

        header( 'Location: albums.php');
        die();
    }

    $record = mysqli_fetch_assoc( $result );
}

include( 'includes/header.php');

$query2 = 'SELECT * FROM artists';

$result2 = mysqli_query($connect, $query2);

?>

<section class="sub-header">
    <button class="btn">
        <a href="albums.php">Back</a>
    </button>
    <h2>Edit Album</h2>
</section>

<form method="POST">
    <h3>Edit the information about the Album</h3>
        <div class="inputBox">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name']); ?>">
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
            <label for="poster">Album Poster:</label>
            <input type="text" name="poster" id="poster" value="<?php echo htmlentities( $record['poster']); ?>">
        </div>
        <div class="inputBox">
            <label for="total_views">Total Views:</label>
            <input type="number" name="total_views" id="total_views" value="<?php echo htmlentities($record['total_views']); ?>" >
        </div>
        <div class="inputBox">
            <label for="date_of_release">Date of Release:</label>
            <input type="date" name="date_of_release" id="date_of_release" value="<?php echo htmlentities($record['date_of_release']); ?>">
        </div>
        <div class="inputBox">
            <label for="number_of_songs">Number of Songs:</label>
            <input type="number" name="number_of_songs" id="number_of_songs" value="<?php echo htmlentities($record['number_of_songs']); ?>">
        </div>
        <button type="submit" class="btn">Edit Album</button>
</form>


<?php

include( 'includes/footer.php');

?>