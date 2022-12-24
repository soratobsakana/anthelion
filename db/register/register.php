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
    if (strlen($_POST['username']) > 16 || strlen($_POST['username']) < 3) {
        exit('Username must be between 3 and 16 characters long.');
    }

    // Password
    if (strlen($_POST['password']) > 50 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 50 characters long.');
    }

    // Check if username exists.
    if ($stmt_account = $con -> prepare('SELECT id FROM accounts WHERE username = ?')) {
        $stmt_account -> bind_param('s', $_POST["username"]);
        $stmt_account -> execute();
        $stmt_account -> store_result();
    } 
    // Check if email exists
    if ($stmt_email = $con -> prepare('SELECT id FROM accounts WHERE email = ?')) {
        $stmt_email -> bind_param('s', $_POST["email"]);
        $stmt_email -> execute();
        $stmt_email -> store_result();
    }
    
    // Store the result so we can check if the account exists in the database.
    if ($stmt_account -> num_rows > 0) {
        print "Username exists, please choose another.";
        echo "<br><br><a href='/'>Comeback</a>";
    } elseif ($stmt_email -> num_rows > 0) {
        print "An existing account is already linked to this email, please choose another.";
        echo "<br><br><a href='/'>Comeback</a>";
    } else {

        if ($stmt_account = $con->prepare('INSERT INTO accounts (username, password, email, country, biography) VALUES (?, ?, ?, ?, ?)')) {
            // Using password_hash here implies that password_verify will be used in the login process.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt_account->bind_param('sssss', $_POST['username'], $password, $_POST['email'], $_POST["country"], $_POST["biography"]);
            $stmt_account->execute();
            
            // Auto-login
            session_start();
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["name"] = $_POST["username"];

            header('Location: /');

        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }

    $stmt_account -> close();
    $stmt_email -> close();
    $con -> close();
?>