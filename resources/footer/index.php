<footer>
    

    <?php
        if (!isset($_SESSION["loggedin"])) {
            ?>
            <p>Anthelion is a website designed and written by <span>nabuna</span>, with the purpose of storing a pack of tools and content he regularly uses on the Internet.</p>
            
        <?php
        } else {
            print "<p>You're logged in as " . $_SESSION['name'] . ".</p>";
            print "<p>•</p>
            <p><span class=\"highlight\"><a href=\"db/logout.php\">Logout</a></span></p>";
        }
    ?>

</footer>