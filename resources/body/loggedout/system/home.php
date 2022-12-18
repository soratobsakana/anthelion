<?php

    session_start();

    // If the user is not logged in redirect to the login page
    if (!isset($_SESSION["loggedin"])) {
        header('Location: index.html');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Anthelion</h1>
            <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Home page</h2>
        <p>Welcome back, <?=$_SESSION["name"]?></p>
    </div>
</body>
</html>