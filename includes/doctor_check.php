<?php
session_start();

if ( isset( $_SESSION['drid'] ) ) {
    // Grab user data from the database using the drid
} else {
    // Redirect them to the login page
    header("Location: ./index.php");
}
?>