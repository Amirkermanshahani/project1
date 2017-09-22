<html>
<body>

    <b><a href="create_ad.html">create ad</a></b><br>
    <a href="tamas_ba_ma.html">tamas ba ma</a>
    <a href="rahnama.php">sharayet va rahnama</a>
    <a href="blog.php">blog</a>
    <a href="about_us.php">about us</a>
    <a href="chat.php">chat</a>
    <a href="divare_man.php">divare man</a><br>
    <a href="cities.php">choose city</a>
    <a href="mainpage.php">MainPage</a><br>

    <hr>

    <form action="" method="post">
        <input type="submit" name="agahi_haye_man" value="my ads">
        <input type="submit" name="bookmarked_ads" value="bookmarked ads">
        <input type="submit" name="last_seens" value="last seens">
        <input type="submit" name="panel" value="panel">
    </form>

</body>
</html>


<?php
$email = $_COOKIE["email"];

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);

if (isset($_POST["agahi_haye_man"]))
{
    $userid = 0;
    $user_id_query = "select (id) from users where email='$email'";
    $user_id_query_fetch = $conn->query($user_id_query);
    if ($user_id_query_fetch->num_rows>0)
    {
        while ($row = $user_id_query_fetch->fetch_assoc())
        {
            $userid = $row["id"];
        }
    }


    $title = '';
    $type = '';
    $image = '';
    $number = 1;
    $ad_id = 0;
    $user_ads_query = "select (ads_id) from creating WHERE  user_id=$userid";
    $user_ads_query_fetch = $conn->query($user_ads_query);
    if ($user_ads_query_fetch->num_rows>0)
    {
        while ($row1 = $user_ads_query_fetch->fetch_assoc())
        {
            $ad_id = $row1["ads_id"];
            $ad_show_query = "select title , type , image from ads where ads_id = $ad_id";
            $ad_show_query_fetch = $conn->query($ad_show_query);
            if ($ad_show_query_fetch->num_rows>0)
            {
                while ($row2 = $ad_show_query_fetch->fetch_assoc())
                {
                    $title = $row2['title'];
                    $type = $row2['type'];
                    $image = $row2['image'];
                    echo $number." : <br>";
                    echo "title : ".$title."<br>";
                    echo "type : ".$type."<br>";
                    echo "<img src='$image'><br>";
                    $number++;
                }
            }
        }
    }


}



if (isset($_POST["bookmarked_ads"]))
{
    $userid = 0;
    $user_id_query = "select (id) from users where email='$email'";
    $user_id_query_fetch = $conn->query($user_id_query);
    if ($user_id_query_fetch->num_rows>0)
    {
        while ($row3 = $user_id_query_fetch->fetch_assoc())
        {
            $userid = $row3["id"];
        }
    }

    $number1 = 1;
    $title1 = '' ;
    $type1 = '' ;
    $image1 = '' ;
    $bookmarked_ad_id = 0;
    $user_bookmarked_query = "select (ads_id) from bookmark WHERE users_id = $userid";
    $user_bookmarked_query_fetch = $conn->query($user_bookmarked_query);
    if ($user_bookmarked_query_fetch->num_rows>0)
        while ($row3 = $user_bookmarked_query_fetch->fetch_assoc())
        {
            $bookmarked_ad_id = $row3["ads_id"];
            $bookmarked_ad_query = "select title , type , image from ads where ads_id = $bookmarked_ad_id";
            $bookmarked_ad_query_fetch = $conn->query($bookmarked_ad_query);
            if ($bookmarked_ad_query_fetch->num_rows>0)
            {
                while ($row4 = $bookmarked_ad_query_fetch->fetch_assoc())
                {
                    $title1 = $row4['title'];
                    $type1 = $row4['type'];
                    $image1 = $row4['image'];
                    echo "$number1 :  <br>";
                    echo "title : " . $title1 . "<br>";
                    echo "type : " . $type1 . "<br>";
                    echo "<img src = '$image1'><br>";
                    $number1++;

                }
            }
        }


}

?>

