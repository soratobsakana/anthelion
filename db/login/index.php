<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../css/logreg.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="shortcut icon" href="/assets/anthelion/favico.png" type="image/x-icon">
    <title>Login - Anthelion</title>
</head>
<body>
    <script>0</script>
    <div class="container">
        <?php include "../../resources/header/index.php" ?>

        <section class="build">
            
            <div class="login-register">
                <h1>Login</h1>
                <form action="authenticate.php" method="post" class="login-register-form ">
                    <input type="text" name="username" placeholder="Username" id="username" required>
                    <input type="password" name="password" placeholder="Password" id="Password" required>
                    <input type="submit" value="Submit">
                </form>
                <p>...or <span class="highlight"><a href="../register/">register</a></span> if you don't have an account.</p>
            </div>
        
        </section>

        <?php include "../../resources/footer/index.php" ?>
    </div>
</body>
</html>