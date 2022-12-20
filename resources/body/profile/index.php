<?php 
    if (!isset($_SESSION["loggedin"])) {
        header('Location: /');
        exit;
    } else {
        $username = $_SESSION["name"];

        ?>
        <section class="profile-wrapper">
            <div class="profile-user_info">
                <div class="profile-user_info-img">
                    <img src="assets/anthelion/nhkpfp.jpg" alt="<?=$_SESSION["name"]?>'s profile picture.">
                </div>
                <div class="profile-user_info-data">
                    <div class="profile-user_info-data-fr">
                        <h2><?=$_SESSION["name"]?></h2>
                    </div>
                    <div class="profile-user_info-data-sr">
                        <ul>
                            <li>Joined <b>Dec 2022</b></li>
                            <li>•</li>
                            <li>From <b>Spain</b></li>
                        </ul>
                        <ul>
                            <li>Some links</li>
                        </ul>
                        <p class="profile-data-desktop">
                            I'm nabuna, I wrote this website today, and I'm just testing this out.
                        </p>
                    </div>
                    
                    
                </div>
                
            </div>
            
            <div class="profile-user_desc">
                <p class="profile-data-mobile">
                I'm nabuna, I wrote this website today, and I'm just testing this out.
                </p>
            </div>
            <div class="profile-user_sections">
                <ul>
                    <li>Images</li>
                    <li>Music</li>
                    <li>Notes</li>
                    <li>Calendar</li>
                    <li>Contact</li>
                    <li>Anime</li>
                    <li>Manga</li>
                    <li>Links</li>
                    <li>Typing</li>
                    <li>Portfolio</li>
                    <li>Documentation</li>
                    <li>Bookmarks</li>
                </ul>
            </div>
        </section>
        <?php

    }
?>
