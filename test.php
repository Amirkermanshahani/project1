<?php
if (isset($_REQUEST["submit"])) goto a;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Information Form</title>
</head>
<body>
<p><strong>Please fill in the form below : </strong></p>
<br><br>
<form action = "test.php" method ="post" enctype = "multipart/form-data">
    Name : <input type = "text" name = "name" placeholder = "Your name goes here">
    <br><br>
    Email : <input type = "text" name = "email" placeholder = "example@yahoo.com">
    <br><br>
    Phone : <input type = "text" name = "phone" placeholder = "Your phone number goes here">
    <br><br>
    Image : <input type = "file" name = "image">
    <br><br>
    Gender : <input type = "radio" name = "gender" value = "1">male
    <input type = "radio" name = "gender" value = "0">female
    <br><br>
    Skills : <input type = "checkbox" name = "backend" value = "backend">Backend
    <input type = "checkbox" name = "frontend" value = "frontend">Frontend
    <br><br>
    <input type = "submit" name = "submit" value = "submit">

</form>
</body>
</html>

<?php
if (isset($_REQUEST["submit"]))
{
   a: echo "Here are your entries : <br>";

//Name part :
    $name= "";
    $nameerr = "";
    if (isset ($_REQUEST["name"])) {
        $name = $_REQUEST["name"];
        echo "Your name is : " . $name . "<br>";
    } else {
        $nameerr = "Name is required!". "<br>";
        echo $nameerr;
    }

//Email part :
    $email = "";
    $emailerr = "";
    if (isset($_REQUEST["email"])) {
        $email = $_REQUEST["email"];
        echo "Your Email address is : " . $email . "<br>";
    } else {
        $emailerr = "Email is required!\r\n";
        echo $emailerr;
    }

//Phone part :
    $phone = "";
    $phoneerr = "";
    if (isset($_REQUEST["phone"])) {
        $phone = $_REQUEST["phone"];
        echo "Your phone number is " . $phone . "<br>";
    } else {
        $phoneerr = "Phone is required! <br>";
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
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Here is you picture : ";
            echo "<img src = '$target_file'/>";
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }

//Gender part :
    if (isset($_REQUEST["gender"])) {
        if ($_REQUEST["gender"]) {
            echo "You are a Man<br>";
        } else {
            echo "You are a Woman<br>";
        }
    } else {
        echo "Gender is required<br>";
    }

//Skills part :
    if (isset($_REQUEST["backend"])) {
        if (isset($_REQUEST["frontend"])) echo "You are both a backend and a frontend programmer. <br>";
        else echo "You are a backend programmer<br>";
    } elseif (isset($_REQUEST["frontend"])) {
        if (isset($_REQUEST["backend"])) echo "You are both a backend and a frontend programmer. <br>";
        else echo "You are a frontend programmer<br>";
    } else echo "Your skill is required!<br>";
}
else null;
?>