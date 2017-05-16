<?php
    session_start();
    // Because you are checking if(isset($_SESSION['loggedin'])), use the below:
    unset($_SESSION['username']);
    $_SESSION = array();
    session_destroy();
	header('location:index.php');
?>
