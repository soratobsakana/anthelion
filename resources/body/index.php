<section class="build">
    <?php
        if (!isset($_SESSION["loggedin"])) {
            
                if (isset($_POST["login"])) {
                    header('Location: db/login');
                } elseif (isset($_POST["register"])) {
                    header('Location: db/register');
                } else {
                    ?>
                    <div class="build-wrapper">
                        <div class="build-logo">
                            <h1> Anthelion </h1>
                        </div>
                        <form action="index.php" method="post">
                        <ul>
                            <li><input type="submit" name="login" value="Login"></li>
                            <li><input type="submit" name="register" value="Register"></li>
                        </ul>
                        </form>
                    </div>
                    <?php
                }    
        } else {
            include "profile/index.php";
        }
    ?>
</section>
