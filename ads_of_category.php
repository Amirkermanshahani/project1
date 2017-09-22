<?php
$category_id=$_GET["id"];

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);

echo "here is the ads you searched for : <br>";

$title = '';
$type = '';
$image = '';
$city_id=0;
$city_name = '';
$number=1;


$query = "select * from ads where cat_id = $category_id";
$query_fetch = $conn->query($query);
if ($query_fetch->num_rows>0)
{
    while ($row = $query_fetch->fetch_assoc())
    {
        $title = $row['title'];
        $type = $row['type'];
        $image = $row['image'];
        $city_id = $row['city_id'];

        $city_name_query = "select name from city where id = $city_id";
        $city_name_query_fetch = $conn->query($city_name_query);
        if ($city_name_query_fetch->num_rows>0)
        {
            while ($row1 = $city_name_query_fetch->fetch_assoc())
            {
                $city_name = $row1['name'];
            }
        }
        echo $number." : <br>";
        echo "title : ".$title."<br>";
        echo "type : ".$type."<br>";
        echo "city : ".$city_name."<br>";
        echo "<img src='$image'>";
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
<a href="mainpage.php">MainPage</a>
</html>