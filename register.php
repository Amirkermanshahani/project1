<?php

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);

$email = $_POST["email"];
$name = $_POST["name"];
$upassword = $_POST["password"];
$urepassword = $_POST["repassword"];
$phone = $_POST["phone"];
$city = $_POST["city"];
$invited_by = $_POST["invited_by"];
$city_id = 0;
$invited_by_id = 0;

$city_id_query = "select id from city where name = '$city'";
$city_id_query_fetch = $conn->query($city_id_query);
if ($city_id_query_fetch->num_rows>0)
{
    while ($row =$city_id_query_fetch->fetch_assoc())
    {
        $city_id = $row['id'];
    }
}

$invited_by_query = "select id from users where name = '$invited_by'";
$invited_by_query_fetch = $conn->query($invited_by_query);
if ($invited_by_query_fetch->num_rows>0)
{
    while ($row1 = $invited_by_query_fetch->fetch_assoc())
    {
        $invited_by_id = $row1['id'];
    }
}

if ($upassword == $urepassword)
    {
        $insert_query = "insert into users (name , email , phone , city_id , invited_by , password ) VALUES ('$name' , '$email' , '$phone' , $city_id ,$invited_by_id ,'$upassword')";
        $insert_query_fetch = $conn->query($insert_query);
        echo "Done!<br>";
    }
else die("Passwords doesn't match");

?>



<html>
<a href="mainpage.php">MainPage</a>
</html>
