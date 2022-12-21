<?php 
    if (!isset($_SESSION["loggedin"])) {
        header('Location: /');
        exit;
    } else {
        include "db/login/connection.php";

        $username = $_SESSION["name"];
        $query = "select * from accounts where username='".$_SESSION["name"]."';";
        $user_data = mysqli_query($con, $query);
        if (mysqli_num_rows($user_data) > 0) {
            while ($row = mysqli_fetch_assoc($user_data)) {
                $user_id = $row["id"];
                $username = $row["username"];
                $joined_at = $row["joined_at"];
                $country = $row["country"];
                $biography = $row["biography"];
            }
        } else {
            echo "There is not an user with that username in the database.";
        }

        mysqli_close($con);

        ?>
        <section class="profile-wrapper">
            <div class="profile-user_info">
                <div class="profile-user_info-img">
                    <img src="assets/anthelion/nhkpfp.jpg" alt="<?=$_SESSION["name"]?>'s profile picture.">
                </div>
                <div class="profile-user_info-data">
                    <div class="profile-user_info-data-fr">
                        <h2><?=$_SESSION["name"]?></h2>
                        <form action="/GitHub/Anthelion/resources/body/profile/edit.php" method="post">
                            <input type="submit" formmethod='post' class="profile-edit" value="Edit..." name="profile-edit" id="profile_edit">
                        </form>
                    </div>
                    <div class="profile-user_info-data-sr">
                        <ul>
                            <li>Joined <b><?=$joined_at?></b></li>
                            <?php
                            if (!empty($country)) {
                                print "<li class=\"li-separator_dot\">•</li>";
                                print "<li>From <b>$country</b></li>";
                            }
                            ?>
                            <li class="li-separator_dot">•</li>
                            <li>User ID <b><?=$user_id?></b></li>
                        </ul>
                        <ul>
                            <li>Some links</li>
                        </ul>
                        
                            <?php
                            if (!empty($biography)) {
                                print "<p class=\"profile-data-desktop\">$biography</p>";
                            }
                            ?>
                    </div>
                    
                    
                </div>
                
            </div>
              
            <?php
                if (!empty($biography)) {
                    print "<div class=\"profile-user_desc\">";
                    print "<p class=\"profile-data-mobile\">$biography</p>";
                    print "</div>";
                }
            ?>
            
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
