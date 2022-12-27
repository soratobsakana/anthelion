<?php
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

// Check if file exists
if (file_exists($targetFile)) {
    exit("File already exists. <a href='/'>Comeback</a>");
    $uploadOk = 0;
}

// Limit file size
if ($_FILES["userfile"]["size"] > 1000000) {
    exit("File is too large.");
    $uploadOk = 0;
}

// Limit file type
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    exit("The file was not uploaded.");
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $targetFile)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["userfile"]["name"])) . " has been uploaded.";
    } else {
        echo "There was an error uploading the file";
    }
}
?>