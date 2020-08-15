<?php
session_start();

if ( isset( $_SESSION['pid'] ) ) {
    // Grab user data from the database using the pid
} else {
    // Redirect them to the login page
    header("Location: ./index.php");
}
?>