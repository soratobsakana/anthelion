<?php

    include "../login/connection.php";

    // Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Could not get the data that should have been sent.
        exit('Please complete the registration form!');
    }

    // Make sure the submitted registration values are not empty.
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        exit('Please complete the registration form');
    }

    // Email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }

    // Invalid characters validation
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
        exit('Username is not valid!');
    }

    // Character length check
    // Username
    if (strlen($_POST['username']) > 20 || strlen($_POST['username']) < 3) {
        exit('Username must be between 3 and 16 characters long.');
    }

    // Password
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long.');
    }

    if ($stmt = $con -> prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        $stmt -> bind_param('s', $_POST["username"]);
        $stmt -> execute();
        $stmt -> store_result();

        // Store the result so we can check if the account exists in the database.
        if ($stmt -> num_rows > 0) {
            echo "Username exists, please choose another.";
        } else {
            // Insert new account
            // Username doesnt exists, insert new account
            if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                echo 'You have successfully registered, you can now login!';
            } else {
                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                echo 'Could not prepare statement!';
            }
        }
        $stmt -> close();
    } else {
        // In case something was wrong with the sql statement, mainly to check if table is ok
        echo 'Could not prepare statement!';
    }

    $con -> close();
?>