<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";

$conn = new mysqli ($servername,$username,$password,$dbname);

//check connection
if ($conn->connect_error)
{
    die ("connection failed : " . $conn->connect_error);
}
else echo "connected successfuly <br>";

echo "click on the ad. you wanna see the information of : <br>";

?>

<html>
<a href="ad_info.php?id=1"> accounting job </a><br>
<a href="ad_info.php?id=2"> dowlat 200 metr </a><br>
<a href="ad_info.php?id=3"> t-shirt </a><br>
<a href="ad_info.php?id=4"> 206 sefr kiloometr </a><br>
<a href="ad_info.php?id=5"> nezafat manzel </a><br>
</html>
