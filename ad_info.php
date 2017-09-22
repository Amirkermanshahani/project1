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


$idfetch= $_GET["id"];

$adquery = "select title , ads_id , type , cat_id , region_id from ads where ads_id=$idfetch";
$adfetch = $conn->query($adquery);
if ($adfetch->num_rows>0)
{
    while ($row = $adfetch->fetch_assoc())
    {
        echo "Title : ".$row['title']."<br>";
        echo "id : ".$row['ads_id']."<br>";
        echo "type : ".$row['title']."<br>";
        echo "category id : ".$row['cat_id']."<br>";
        echo "region id : ".$row['region_id']."<br>";
    }
}




?>