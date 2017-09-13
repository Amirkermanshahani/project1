<html>
<body>
search : <form action="mainpage.php" method="post">
    <input type="text" name="jostoju_dar_amlak" placeholder="jost o ju dar amlak"><br>
    <input type="text" name="child_category" placeholder="amlak"><br>
    <input type="text" name="region" placeholder="all regions"><br><br>
    noe agahi dahande : <br>
    farqi nemikonad : <input type="radio" name="farqi nemikonad"><br>
    shakhsi : <input type="radio" name="shakhshi"><br>
    moshaver amlak : <input type="radio" name="moshaver amlak"><br>
    axdar : <input type="checkbox" name="axdar">
    fory : <input type="checkbox" name="fory">
    <input type="submit" name="submit" value="search">
    <hr>
</body>
</html>




<?php

echo "here is the ads of the category you selected : <br>";

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);
$category_id=$_GET["id"];
$query = "select title , type from ads WHERE cat_id = $category_id ";
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