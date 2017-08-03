<?php
if (isset($_REQUEST["ok"]))
{

    echo "Here are your entries : \r\n";

//Name part :
    $name = "";
    $nameerr = "";
    if (isset ($_REQUEST["name"])) {
        $name = $_REQUEST["name"];
        echo "Your name is : " . $name . "\r\n";
    } else {
        $nameerr = "Name is required!\r\n";
        echo $nameerr;
    }

//Email part :
    $email = "";
    $emailerr = "";
    if (isset($_REQUEST["email"])) {
        $email = $_REQUEST["email"];
        echo "Your Email address is : " . $email . "\r\n";
    } else {
        $emailerr = "Email is required!\r\n";
        echo $emailerr;
    }

//Phone part :
    $phone = "";
    $phoneerr = "";
    if (isset($_REQUEST["phone"])) {
        $phone = $_REQUEST["phone"];
        echo "Your phone number is " . $phone . "\r\n";
    } else {
        $phoneerr = "Phone is required!\r\n";
        echo $phoneerr;
    }

//Image part :
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Here is you picture : ";
            echo "<img src = '$target_file'/>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

//Gender part :
    if (isset($_REQUEST["gender"])) {
        if ($_REQUEST["gender"]) {
            echo "You are a Man\r\n";
        } else {
            echo "You are a Woman\r\n";
        }
    } else {
        echo "Gender is required\r\n";
    }

//Skills part :
    if (isset($_REQUEST["backend"])) {
        if (isset($_REQUEST["frontend"])) echo "You are both a backend and a frontend programmer. \r\n";
        else echo "You are a backend programmer\r\n";
    } elseif (isset($_REQUEST["frontend"])) {
        if (isset($_REQUEST["backend"])) echo "You are both a backend and a frontend programmer. \r\n";
        else echo "You are a frontend programmer\r\n";
    } else echo "Your skill is required!\r\n";
}
else null;
?>