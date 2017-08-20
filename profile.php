<?php
session_start();

if(isset($_SESSION["email"]))
    echo "you are logged in <br>";
else
    echo "you'not logged in<br>";

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";

$conn = new mysqli ($servername,$username,$password,$dbname);

$emailecho = $_SESSION["email"];
$namequery = "select name from users where email =\"$emailecho\"";
$namefetch = $conn->query($namequery);

while ($row2 = $namefetch->fetch_assoc())
$nameshow = $row2["name"];
echo $nameshow;

?>