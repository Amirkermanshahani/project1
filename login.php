<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";
$conn = new mysqli ($servername,$username,$password,$dbname);


$usernameuser = $_REQUEST["email"];
$passworduser = $_REQUEST["password"];
$rememberme = $_REQUEST["rememberme"];

//check connection
if ($conn->connect_error)
{
    die ("connection failed : " . $conn->connect_error);
}

$emailquery = "select email from users where email= '$usernameuser'";
$emailfetch = $conn->query($emailquery);

if ($emailfetch->num_rows>0)
{
    while ($row = $emailfetch->fetch_assoc())
    {
        $email=$row['email'];
        $passwordquery = "select password from users where email = \"$email\" ";
        $passwordfetch = $conn->query($passwordquery);
        if($passwordfetch->num_rows>0)
        {
            while ($row1=$passwordfetch->fetch_assoc())
            {
                $password=$row1['password'];
                if ($password==$passworduser)
                {
                  header('location:profile.php');
                }
                else die ("passwords is wrong<br>");
            }
        }
        else die ("password is wrong <br>");
    }
}
else die ("User not found <br>");

if (isset($rememberme))
{
    $cookie_name = "email";
    $cookie_value = $usernameuser;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
else
    $_SESSION["email"] = $usernameuser;

?>


<html>
<a href="mainpage.php">MainPages</a>
</html>