<?php
echo "here is the ads of the category you selected : <br>";

$category_id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);
$query = "select title , type from ads WHERE cat_id=$category_id ";
$queryfetch = $conn->query($query);

if ($queryfetch->num_rows>0) {
    while ($row = $queryfetch->fetch_assoc()) {
        $number=1;
        echo $number."<br>";
        echo "title : " . $row["title"] . "<br>";
        echo "type : " . $row["type"] . "<br>";
        $number++;
    }
}



?>