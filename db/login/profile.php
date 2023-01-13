<?php
    session_start();
    if (!isset($_SESSION["loggedin"])) {
        header('Location: index.html');
        exit;
    }

    include "connection.php";

    // We don't have the password or email info stored in sessions so instead we can get the results from the database.
    $stmt = $con -> prepare('SELECT password, email FROM accounts WHERE id = ?');

    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION["id"]);
    $stmt->execute();
    $stmt->bind_result($password, $email);
    $stmt->fetch();
    $stmt->close();

?>