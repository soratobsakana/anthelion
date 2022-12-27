<?php 
    if (!isset($_SESSION["loggedin"])) {
        header('Location: /');
        exit;
    } else {
        include "db/login/connection.php";
       
        $query = "select * from accounts where id='".$_SESSION["id"]."';";
        $user_data = mysqli_query($con, $query);
        if (mysqli_num_rows($user_data) > 0) {
            while ($row = mysqli_fetch_assoc($user_data)) {
                $user_id = $row["id"];
                $username = $row["username"];
                $email = $row["email"];
                $joined_at = $row["joined_at"];
                $country = $row["country"];
                $biography = $row["biography"];
                $twitter = $row["twitter"];
                $instagram = $row["instagram"];
                $github = $row["github"];
                $discord = $row["discord"];
                $website = $row["website"];
                $pfp = $row["pfp"];
            }
        } else {
            echo "There is not an user with that username in the database.";
        }

        mysqli_close($con);

        if (isset($_POST["profile-edit"])) {
            ?>     
            <div class="profile-edit">
                <h1>Edit profile</h1>
                <form enctype="multipart/form-data" action="resources/body/profile/edit.php" method="post">
                    <div class="profile-edit-user">
                        <label for="profile-edit-pfp" class="profile-edit-pfp">
                            Change profile picture.
                            <i class="fas fa-edit"></i>
                        </label>
                        <input type="file" name="userfile" id="profile-edit-pfp">
                        
                    </div>
                    <div>
                        <label for="username-edit">Username </label>
                        <input type="text" name="username-edit" value="nabuna" id="">
                    </div>
                    <div>
                        <label for="country-edit">Country </label>
                        <input type="text" name="country-edit" value="<?=$country?>" id="">
                    </div>
                    <div>
                        <label for="biography-edit">Biography </label>
                        <textarea name="biography-edit" id="" rows="5"><?=$biography?></textarea>
                    </div>
                    <div>
                        <label for="twitter-edit">Twitter </label>
                        <input type="text" name="twitter-edit" value="<?=$twitter?>" id="">
                    </div>
                    <div>
                        <label for="website-edit">Website </label>
                        <input type="text" name="website-edit" value="<?=$website?>" id="">
                    </div>
                    <div>
                        <label for="instagram-edit">Instagram </label>
                        <input type="text" name="instagram-edit" value="<?=$instagram?>" id="">
                    </div>
                    <div>
                        <label for="github-edit">GitHub </label>
                        <input type="text" name="github-edit" value="<?=$github?>" id="">
                    </div>
                    <div>
                        <label for="email-edit">Email </label>
                        <input type="text" name="email-edit" value="<?=$email?>" id="">
                    </div>

                    <!-- Tool selection maybe goes in here -->
                    
                    <input type="submit" name="send" value="Save">
                </form>
            </div>
            <?php
        } else {
            ?>
        <section class="profile-wrapper">
            <div class="profile-user_info">
                <div style="background-image: url(<?=$pfp?>)" class="profile-user_info-img"></div>
                <div class="profile-user_info-data">
                    <div class="profile-user_info-data-fr">
                        <h2><?=$_SESSION["name"]?></h2>
                        <form action="index.php" method="post">
                            <input type="submit" class="profile-edit" value="Edit..." name="profile-edit" id="profile_edit">
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
                        <ul class="profile-user_info-data-sr-links">
                            <?php
                            if (!empty($twitter)) {
                                print "<li><i class='fab fa-twitter'></i> <span class='highlight'><b><a href='$twitter' target='a_blank'>Twitter</a></span></b></li>";
                                // print "<li class='li-separator_dot'>•</li>";
                            } 
                            if (!empty($website)) {
                                print "<li><i class='fas fa-link'></i> <span class='highlight'><b><a href='$website' target='a_blank'>Website</a></span></b></li>";
                                // print "<li class='li-separator_dot'>•</li>";
                            } 
                            if (!empty($instagram)) {
                                print "<li><i class='fab fa-instagram'></i> <span class='highlight'><b><a href='$instagram' target='a_blank'>Instagram</a></span></b></li>";
                                // print "<li class='li-separator_dot'>•</li>";
                            }
                            if (!empty($github)) {
                                print "<li><i class='fab fa-github'></i> <span class='highlight'><b><a href='$github' target='a_blank'>GitHub</a></span></b></li>";
                                // print "<li class='li-separator_dot'>•</li>";
                            }
                            ?>
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
        
    }

?>
