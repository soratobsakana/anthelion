<?php 

    session_start();

    if (!isset($_SESSION["loggedin"])) {
        header('Location: /');
        exit;
    } else {
        if (isset($_POST["send"])) {
            
            include "../../../db/login/connection.php";
    
            $username = $_SESSION["name"];
            $country = $_POST["country"];
            $biography = $_POST["biography"];
            $query = "UPDATE accounts SET country='$country', biography='$biography' WHERE username='$username'";
    
            mysqli_query($con, $query);
    
            mysqli_close($con);

            header('Location: ../../../');
        } else {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <link rel="stylesheet" href="../../../style.css">
                    <link rel="stylesheet" href="../../../css/logreg.css">
                    <link rel="stylesheet" href="../../../css/responsive.css">
                    <link rel="stylesheet" href="../../../css/profile_edit.css">
                    <title>Login - Anthelion</title>
                </head>
                <body>
                    <div class="container">
                        <?php include "../../../resources/header/index.php" ?>
    
                        <section class="build">
                            
                            <div class="profile-edit">
                                <h1>Edit profile</h1>
                                <form action="../../../resources/body/profile/edit.php" method="post">
                                    <input type="text" name="country" placeholder="Country" id="">
                                    <textarea name="biography" placeholder="Biography" id="" rows="3"></textarea>
    
                                    <!-- Tool selection maybe goes in here -->
    
                                    <input type="submit" name="send" value="Save">
                                </form>
                            </div>
                        
                        </section>
    
                        <?php include "../../../resources/footer/index.php" ?>
                    </div>
                </body>
                </html>
            <?php
        }
    }
    

?>



