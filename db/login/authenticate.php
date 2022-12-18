<?php
    // Start the session and make a connection
    session_start();
    include "connection.php";

    // Check if both inputs were sent by the user
    if (!isset($_POST["username"], $_POST["password"])) {
        exit('Please fill both the username and password fields!');
    }

    // Prepare SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $con -> prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s".
        $stmt -> bind_param('s', $_POST["username"]);
        $stmt -> execute();

        // Store the result so we can check if the account exists in the database.
        $stmt -> store_result();

        // Verification proccess
        if ($stmt -> num_rows > 0) {
            // Check if the account exists.
            $stmt -> bind_result($id, $password);
            $stmt -> fetch();
            // Verifying the password. Note: use password_hash in the registration file.
            if (password_verify ($_POST["password"], $password)) {
                // Verification has succeeded.
                // Create sessions, so we know the user is logged in, data stores in the server.
                session_regenerate_id();
                $_SESSION["loggedin"] = TRUE;
                $_SESSION["name"] = $_POST["username"];
                $_SESSION["id"] = $id;
                header('Location: ../../index.php');
            } else {
                // In case of incorrect password.
                echo "Incorrect username and/or password!";
            }
        } else {
            // Incorrect username
            echo "Incorrect username and/or password!";
        }

        $stmt -> close();
    }

    echo "<br><br><a href='index.html'>Comeback</a>";
?>