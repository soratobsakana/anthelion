<header class="header-wrapper">    
    <header class="inner-header">
        <h3 class="header-signature"><a href="/">Anthelion</a></h3>
        <ul class="header-menu">
            <a href=""><li>home</li></a>
            <a href=""><li>docs</li></a>
            <a href=""><li>search</li></a>
            <a href=""><li>about</li></a>
            <a href=""><li>support</li></a>
        </ul>
        <ul class="header-account">
            <?php
                if (!isset($_SESSION["loggedin"])) {
                    ?>
                    <a href="/db/login"><i class="fas fa-user"></i>Login</a>
                    <?php
                } else {
                    ?>
                    <li><a href="/resources/profile"><i class="fas fa-user"></i><span id="header-res"><?=$_SESSION['name']?></span></a></li>
                    <?php
                }
            ?>
        </ul>
    </header>
</header>