<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Typeit9210728252";
$dbname = "Divar";

$usernameuser = $_REQUEST["email"];
$passworduser = $_REQUEST["password"];
$rememberme = $_REQUEST["rememberme"];
//creating connection
$conn = new mysqli ($servername,$username,$password,$dbname);

//check connection
if ($conn->connect_error)
{
    die ("connection failed : " . $conn->connect_error);
}
else echo "connected successfuly <br>";

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
                    echo ("<h1>you're logged in</h1>");
                }
                else die ("passwords is wrong<br>");
            }
        }
        else die ("password is wrong <br>");
    }
}
else die ("User not found <br>");

if (isset($rememberme)) {
    $_SESSION["email"] = $email;
    if (isset($_SESSION["email"])) echo "Session variables are set";
}

?>


