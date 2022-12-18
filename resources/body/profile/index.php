<?php 
    if (!isset($_SESSION["loggedin"])) {
        header('Location: /');
        exit;
    } else {
        $username = $_SESSION["name"];
        print "You're logged in as <b>$username.</b>";

    }
?>