<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);

if (isset($_REQUEST["search"])) goto a;

if (isset($_COOKIE["city_id"])) header('localhost/divar_of_city.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mainpage</title>
</head>
<body>
<b><a href="create_ad.html">create ad</a></b>
<a href="tamas_ba_ma.html">tamas ba ma</a>
<a href="rahnama.php">sharayet va rahnama</a>
<a href="blog.php">blog</a>
<a href="about_us.php">about us</a>
<a href="chat.php">chat</a>
<a href="divare_man.php">divare man</a>
<a href="profile.php">Profile</a>
<hr>
<h1>select city : </h1><br>
<a href="divar_of_city.php?id=1">tehran</a><br>
<a href="divar_of_city.php?id=2">shiraz</a><br>
<a href="divar_of_city.php?id=3">rasht</a><br>
<a href="divar_of_city.php?id=4">kerman</a><br>
<a href="divar_of_city.php?id=5">kish</a><br>
<a href="divar_of_city.php?id=6">mashhad</a><br>
<a href="divar_of_city.php?id=7">karaj</a><br>
<a href="divar_of_city.php?id=8">isfahan</a><br>
<a href="divar_of_city.php?id=9">tabriz</a><br>
<a href="divar_of_city.php?id=10">ahvaz</a><br>
<a href="divar_of_city.php?id=11">qom</a><br>
<a href="divar_of_city.php?id=12">kermanshah</a><br>
<a href="divar_of_city.php?id=13">orumie</a><br>
<a href="divar_of_city.php?id=14">zahedan</a><br>
<a href="divar_of_city.php?id=15">rasht</a><br>
<a href="divar_of_city.php?id=16">kerman</a><br>
<a href="divar_of_city.php?id=17">hamedan</a><br>
<a href="divar_of_city.php?id=18">arak</a><br>
<a href="divar_of_city.php?id=19">yazd</a><br>
<a href="divar_of_city.php?id=20">ardebil</a><br>
<a href="divar_of_city.php?id=21">bandarabas</a><br>
<a href="divar_of_city.php?id=22">qazvin</a><br>
<a href="divar_of_city.php?id=23">zanjan</a><br>
<a href="divar_of_city.php?id=24">gorgan</a><br>
<a href="divar_of_city.php?id=25">sari</a><br><br>

categories :<br><br>
<a href="ads_of_category.php?id=1">amlak</a><br>
<a href="ads_of_category.php?id=2">vasile naqlie</a><br>
<a href="ads_of_category.php?id=3">lavazem manzel</a><br>
<a href="ads_of_category.php?id=4">lavazem electronicy</a><br>
<a href="ads_of_category.php?id=5">khadamat</a><br>
<a href="ads_of_category.php?id=6">vasayele shakhsi</a><br>
<a href="ads_of_category.php?id=7">estekhdam o karyabi</a><br>
<a href="ads_of_category.php?id=8">kasb o kar</a><br>
<a href="ads_of_category.php?id=9">ejtemaii</a><br>
<a href="ads_of_category.php?id=10">sargarmi</a><br><br>

search : <form action="mainpage.php" method="post">
    Category : <input type="text" name="category"><br><br>
    Child Category : <input type="text" name="child_category"><br><br>
    Region : <input type="text" name="region"><br><br>
    <input type="submit" name="search" value="search">
</form>
</body>
</html>

<?php
a:
$category_name = $_POST['category'];
$child_name = $_POST['child_category'];
$region_name = $_POST['region'];

$cat_id = 0;
$cat_id_query = "select id from category where name = '$category_name'";
$cat_id_query_fetch = $conn->query($cat_id_query);
if ($cat_id_query_fetch->num_rows>0)
{
    while ($row = $cat_id_query_fetch->fetch_assoc())
    {
        $cat_id = $row['id'];
    }
}

$child_id = 0;
$child_id_query = "select id from childs where name = '$child_name'";
$child_id_query_fetch = $conn->query($child_id_query);
if ($child_id_query_fetch->num_rows>0)
{
    while ($row1 = $child_id_query_fetch->fetch_assoc())
    {
        $child_id = $row1['id'];
    }
}

$region_id = 0;
$region_id_query = "select id from region where name = '$region_name'";
$region_id_query_fetch = $conn->query($region_id_query);
if ($region_id_query_fetch->num_rows>0)
{
    while ($row2 = $region_id_query_fetch->fetch_assoc())
    {
        $region_id = $row2['id'];
    }
}

$number = 1 ;
$search_query = "select * from ads where (cat_id , child_id , region_id) = ($cat_id , $child_id , $region_id)";
$search_query_fetch = $conn->query($search_query);
if ($search_query_fetch->num_rows>0)
{
    while ($row3 = $search_query_fetch->fetch_assoc())
    {
        $title = $row3['title'];
        $type = $row3['type'];
        $city_id = $row3['city_id'];
        $image = $row3['image'];
        $city_name = '';
        $city_name_query = "select name from city where id = $city_id";
        $city_name_query_fetch = $conn->query($city_name_query);
        if ($city_name_query_fetch->num_rows>0)
        {
            while ($row4 = $city_name_query_fetch->fetch_assoc())
            {
                $city_name = $row4['name'];
            }
        }
        echo $number." : <br>";
        echo "Title : ".$title."<br>";
        echo "Type : ".$type."<br>";
        echo "City : ".$city_name."<br>";
        echo "<img src='$image'><br>";
        echo "<html><form action='' method='post'><input type='submit' name='bookmark' value='bookmark'></form> </html>";
        echo "<html><form action='' method='post'><input type='submit' name='unbookmark' value='unbookmark'></form></html>";
        if (isset($_POST['bookmark']))
        {
            $bookmark_query = "update ads set column bookmark ='ok' WHERE (title , type , city_id , image)=('$title' , '$type' , $city_id , '$image')";
            $bookmark_query_fetch = $conn->query($bookmark_query);
        }
        if (isset($_POST['unbookmark']))
        {
            $unbookmark_query = "update ads set COLUMN bookmark = '' WHERE (title , type , city_id , image)=('$title' , '$type' , $city_id , '$image')";
            $unbookmark_query_fetch = $conn->query($unbookmark_query);
        }
        $number++;
    }
}

?>

<html>
<a href="mainpage.php">MainPage</a>
</html>
