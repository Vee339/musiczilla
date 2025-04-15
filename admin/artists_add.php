<?php

include( 'includes/database.php');
include( 'includes/config.php');
include( 'includes/functions.php');

secure();

if( isset( $_POST['name'])){

    if( $_POST['name'] and $_POST['monthly_listeners']){

        $query = 'INSERT INTO artists(`name`, photo, monthly_listeners) VALUES(
            "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['photo'] ).'",
            "'.mysqli_real_escape_string( $connect, $_POST['monthly_listeners'] ).'"
         )';

        mysqli_query( $connect, $query);

        set_message( 'Artist has been added');

        header('Location: artists.php');

    }
}

include( 'includes/header.php');

?>

<section class="sub-header">
    <button class="btn">
        <a href="artists.php">Back</a>
    </button>
    <h2>Add Artist</h2>
</section>
<form method="POST">
    <h3>Fill the information about the artist</h3>
        <div class="inputBox">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="inputBox">
            <label for="photo">Photo File Name:</label>
            <input type="text" name="photo" id="photo">
        </div>
        <div class="inputBox">
            <label for="monthly_listeners">Monthly Listeners:</label>
            <input type="number" name="monthly_listeners" id="monthly_listeners" >
        </div>
        <button type="submit" class="btn">Add Artist</button>
</form>

<?php

include( 'includes/footer.php');

?>