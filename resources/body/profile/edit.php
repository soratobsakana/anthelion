<?php 

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["loggedin"])) {
        header('Location: /');
        exit;
    } else {
        if (isset($_POST["send"])) {
            
            include "../../../db/login/connection.php";
            
            // Email validation
            if (!filter_var($_POST['email-edit'], FILTER_VALIDATE_EMAIL)) {
                exit("Email is not valid!<br><a href='/'> Comeback</a>");
            }

            $stmt = $con -> prepare("SELECT * FROM accounts WHERE username= ? AND NOT id=".$_SESSION["id"]."");
            $stmt -> bind_param('s', $_POST['username-edit']);
            $stmt -> execute();
            $stmt -> store_result();

            if ($stmt -> num_rows() > 0) {
                exit("That username is taken!<br><a href='/'> Comeback</a>");
            } else {
                $username = $_POST["username-edit"];
                $email = $_POST["email-edit"];
                $country = $_POST["country-edit"];
                $biography = $_POST["biography-edit"];
                $twitter = $_POST["twitter-edit"];
                $instagram = $_POST["instagram-edit"];
                $github = $_POST["github-edit"];
                $website = $_POST["website-edit"];

                $stmt = $con -> prepare("UPDATE accounts SET username = ? , email = ? , country = ? , biography = ?, twitter = ? , website = ? , instagram = ? , github = ? WHERE id = " . $_SESSION["id"] . "");
                $stmt -> bind_param('ssssssss', $username, $email, $country, $biography, $twitter, $website, $instagram, $github);
                $stmt -> execute();

                $_SESSION["name"] = $username;
            }
            
            mysqli_close($con);

            header('Location: /');
            
        }
    }
    
?>



