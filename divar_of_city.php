<?php

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);
$city_id = $_GET["id"];

 echo "here is the ads of the selected city : <br> ";

$query ="select title,type,image from ads where city_id =$city_id";
$queryfetch = $conn->query($query);
$number = 1;

if ($queryfetch->num_rows>0)
{
    while ($row = $queryfetch->fetch_assoc())
    {
        $title = $row['title'];
        $type = $row['type'];
        $image = $row['image'];
        echo "$number  : <br>";
        echo "title : ".$title."<br>";
        echo "type : ".$type. "<br>";
        echo "<img src='$image'><br>";
        $number++;
        echo "<html><form action='' method='post'><input type='submit' name='bookmark' value='bookmark'> </form></html>";
        echo "<html><form action='' method='post'><input type='submit' name='unbookmark' value='unbookmark'> </form></html>";
        if (isset($_POST['bookmark']))
        {
            $insert = "update ads set bookmark = 'ok' WHERE (title , type , city_id , image )=('$title' ,'$type' , $city_id , '$image')";
            $insert_fetch = $conn->query($insert);
        }
        if (isset($_POST['unbookmark']))
        {
            $insert1 = "update ads set bookmark = '' WHERE (title , type , city_id , image)=('$title' ,'$type' , $city_id , '$image')";
            $insert1_fetch = $conn->query($insert1);
        }
    }

}

?>


<html>
<br><br>
<a href="mainpage.php">Mainpage</a>
</html>
