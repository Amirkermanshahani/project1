<?php

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
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
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}

$type = $_POST["type"];
$title = $_POST["title"];
$location = $_POST["location"];
$image = $_POST["image"];
$description = $_POST["description"];
$expiretime = $_POST["expiretime"];
$category_name = $_POST["category_name"];
$region_name = $_POST["region_name"];
$child_name = $_POST["child_name"];
$option = $_POST['option'];
$premium_name = $_POST["premium"];
$premium_number = $_POST["number"];

if (isset($_POST["submit"]))
{
    $category_id = 0;
    $category_id_query = "select (id) from category where name = '$category_name'";
    $category_id_query_fetch = $conn->query($category_id_query);
    if ($category_id_query_fetch->num_rows > 0)
    {
        while ($row = $category_id_query_fetch->fetch_assoc())
        {
            $category_id = $row["id"];
        }
    }


    $region_id_query = "select (id) from region where name = '$region_name'";
    $region_id = 0;
    $region_id_query_fetch = $conn->query($region_id_query);
    if ($region_id_query_fetch->num_rows > 0)
    {
        while ($row1 = $region_id_query_fetch->fetch_assoc())
        {
            $region_id = $row1["id"];
        }
    }

    $city_id = 0 ;
    $city_id_query = "select (id) from city where name='$location'";
    $city_id_query_fetch = $conn->query($city_id_query);
    if ($city_id_query_fetch->num_rows>0)
    {
        while ($row2 = $city_id_query_fetch->fetch_assoc())
        {
            $city_id = $row2["id"];
        }
    }


    $premium_id = 0;
    $premium_id_query = "select (id) from primium WHERE name='$premium_name'";
    $premium_id_query_fetch = $conn->query($premium_id_query);
    if ($premium_id_query_fetch->num_rows > 0)
    {
        while ($row3 = $premium_id_query_fetch->fetch_assoc())
        {
            $premium_id = $row3["id"];
        }
    }

    $child_id = 0;
    $child_id_query = "select (id) from childs where name ='$child_name'";
    $child_id_query_fetch = $conn->query($child_id_query);
    if ($child_id_query_fetch->num_rows>0) {
        while ($row4 = $child_id_query_fetch->fetch_assoc())
        {
            $child_id = $row4['id'];
        }
    }

    $query = "insert into ads (type , location , image , title , description , expiretime , cat_id , premium_id , child_id , region_id , pre_number , city_id , options) VALUES ('$type' , '$location' , '$target_file' , '$title' , '$description' , '$expiretime' , $category_id , $premium_id , $child_id , $region_id , $premium_number , $city_id , '$option')";
    $queryfetch = $conn->query($query);

    $ads_pre_query = "insert into ads_pre (pre_id ,number) VALUES ($premium_id , $premium_number)";
    $ads_pre_query_fetch = $conn->query($ads_pre_query);


    if (isset($_SESSION['email'])) $email = $_SESSION['email'];
    else $email = $_COOKIE['email'];
    $phone_query = "select id , phone from users where email = '$email'";
    $phone_query_fetch = $conn->query($phone_query);
    $phone = '';
    $user_id = 0;
    if ($phone_query_fetch->num_rows>0)
    {
        while ($row5 = $phone_query_fetch->fetch_assoc())
        {
            $phone = $row5['phone'];
            $user_id = $row5['id'];
        }
    }
    $insert_query = "insert into creating (user_id , email , phone) VALUES ($user_id , '$email' , '$phone')";
    $insert_query_fetch = $conn->query($insert_query);


    echo  "You're All Set ! :)<br>";

}




?>

<html>
<a href="mainpage.php">Mainpage</a>
</html>
