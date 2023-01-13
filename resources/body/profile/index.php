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
                    <div class="profile-edit-wrapper">
                        <div class="profile-edit-input-wrapper">
                            <label for="username-edit">Username </label>
                            <input type="text" name="username-edit" value="<?=$username?>" id="">
                        </div>
                        <div class="profile-edit-input-wrapper">
                            <label for="country-edit">Country </label>
                            <input type="text" name="country-edit" value="<?=$country?>" id="">
                        </div>
                    </div>

                    <div class="profile-edit-input-wrapper">
                        <label for="biography-edit">Biography </label>
                        <textarea name="biography-edit" id="" rows="5"><?=$biography?></textarea>
                    </div>

                    <div class="profile-edit-wrapper">
                        <div class="profile-edit-input-wrapper">
                            <label for="twitter-edit">Twitter </label>
                            <input type="text" name="twitter-edit" value="<?=$twitter?>" id="">
                        </div>
                        <div class="profile-edit-input-wrapper">
                            <label for="website-edit">Website </label>
                            <input type="text" name="website-edit" value="<?=$website?>" id="">
                        </div>
                        <div class="profile-edit-input-wrapper">
                            <label for="instagram-edit">Instagram </label>
                            <input type="text" name="instagram-edit" value="<?=$instagram?>" id="">
                        </div>
                        <div class="profile-edit-input-wrapper">
                            <label for="github-edit">GitHub </label>
                            <input type="text" name="github-edit" value="<?=$github?>" id="">
                        </div>
                    </div>

                    <div class="profile-edit-input-wrapper">
                        <label for="email-edit">Email </label>
                        <input type="text" name="email-edit" value="<?=$email?>" id="">
                    </div>

                    <!-- Tool selection maybe goes in here -->
                    
                    <input type="submit" name="send" value="Save">
                </form>
            </div>
            <?php
        } elseif (isset($_POST["tools-edit"])){
            ?>
            <div class="tools-edit-wrapper">
                <h1>Customize your tools</h1>
                <form action="index.php" method="get">
                    <?php

                    $tools = ["Images", "Music", "Notes", "Calendar", "Contact", "Anime", "Manga", "Links", "Typing", "Portfolio", "Documentation", "Bookmarks"];

                    foreach ($tools as $tool) {
                        print "<div class='tools-edit-input-wrapper'>";
                        print "<input type='checkbox' name='tools[]' value='$tool' id=''>";
                        print "<label>$tool</label>";
                        print "</div>";
                    }

                    foreach ($tools as $tool) {
                        
                        print "<label class='tools-edit-label' for='tools[]'>";
                        print "<input type='checkbox' name='tools[]' value='$tool'>";
                        print "<span class='test'></span>";
                    print "$tool</label>";
                        
                    }

                ?>
                    <input type="submit" value="Save" name="tools-edit-save">
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
                            } 
                            if (!empty($website)) {
                                print "<li><i class='fas fa-link'></i> <span class='highlight'><b><a href='$website' target='a_blank'>Website</a></span></b></li>";
                            } 
                            if (!empty($instagram)) {
                                print "<li><i class='fab fa-instagram'></i> <span class='highlight'><b><a href='$instagram' target='a_blank'>Instagram</a></span></b></li>";
                            }
                            if (!empty($github)) {
                                print "<li><i class='fab fa-github'></i> <span class='highlight'><b><a href='$github' target='a_blank'>GitHub</a></span></b></li>";
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
            
            <div class="profile-user_tools">
                <?php include "resources/body/tools/index.php"; ?>
            </div>

            <form class="tools-edit-form" action="index.php" method="post">
                <input type="submit" class="tools-edit" value="You can add tools and customize them by clicking here!" name="tools-edit">
            </form>
            
        </section>
        <?php
        }
        
    }

?>
