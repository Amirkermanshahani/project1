<?php
if(isset($_COOKIE["email"]))
{}
else
    echo "you'not logged in<br>";

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";

$conn = new mysqli ($servername,$username,$password,$dbname);

$emailecho = $_COOKIE["email"];
$namequery = "select name , email , phone   from users where email =\"$emailecho\"";
$namefetch = $conn->query($namequery);

while ($row2 = $namefetch->fetch_assoc())
{
    $name = $row2["name"];
    echo "Name : " . $name . "<br>";
    $phone = $row2["phone"];
    echo "Phone : " . $phone . "<br>";
    $email = $row2["email"];
    echo "Email : " . $email . "<br>";
}

?>