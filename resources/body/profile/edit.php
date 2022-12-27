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

            /* Pfp validation and uploading. */
            // /Users/amontero/Sites/GitHub/Anthelion/assets/users/i/ || /home/bitnami/htdocs/assets/users/i/
            $targetDir = "/Users/amontero/Sites/GitHub/Anthelion/assets/users/i/ ";
            $targetFile = $targetDir . basename($_FILES["userfile"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $uploadOk = 1;

            // To check if the image file is an actual image or fake
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["userfile"]["tmp_name"]);
                if ($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    // echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Limit file size
            if ($_FILES["userfile"]["size"] > 10000000) {
                exit("File is too large.");
                $uploadOk = 0;
            }

            // Limit file type
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }

            // File will be uploaded as \user-id\_pfp.$imageFileType
            $tempPfp = $_SESSION["id"]."_pfp.$imageFileType";
            if ($uploadOk == 0) {
                exit("The file was not uploaded.");
            } else {
                if (move_uploaded_file($_FILES["userfile"]["tmp_name"], "/Users/amontero/Sites/GitHub/Anthelion/assets/users/i/" . $tempPfp)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["userfile"]["name"])) . " has been uploaded.";
                } else {
                    echo "There was an error uploading the file";
                }
            }

            // Get the user's pfp path before inserting
            $pfpPath = "/assets/users/i/" . $tempPfp;

            
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

                $stmt = $con -> prepare("UPDATE accounts SET username = ? , email = ? , country = ? , biography = ?, twitter = ? , website = ? , instagram = ? , github = ? , pfp = ? WHERE id = " . $_SESSION["id"] . "");
                $stmt -> bind_param('sssssssss', $username, $email, $country, $biography, $twitter, $website, $instagram, $github, $pfpPath);
                $stmt -> execute();

                $_SESSION["name"] = $username;
            }
            
            mysqli_close($con);

            header('Location: /');
            
        }
    }
    
?>



