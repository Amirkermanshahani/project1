<?php
$servername ="localhost";
$username = "root";
$password = "Typeit9210728252";

$usernameUser = $_REQUEST['email'];
$passwordUser = $_REQUEST['password'];
$repasswordUser = $_REQUEST["repassword"];
$name = $_REQUEST['name'];

if($repasswordUser!=$passwordUser)
    die("your password doesn't match <br>");
else {

// Create connection
    $conn = new mysqli($servername, $username, $password, "Divar");

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: <br>" . $conn->connect_error);
    }
    else echo "Connected successfully<br>";

$insert = "insert into users (name , email , password) 
           VALUES  ('$name' , '$usernameUser' , '$passwordUser')";
if ($conn->query($insert)===true)
{
    echo "records added<br>";
}
else echo "error<br>";$conn->error;


}
?>