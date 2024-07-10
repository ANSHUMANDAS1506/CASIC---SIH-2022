<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "casic");
$conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
date_default_timezone_set("Asia/Kolkata");

$email=$_POST['email'];
$password=$_POST['password'];
$query=mysqli_query($conn,"select * from signup where email='$email' and password='$password' and status='verified'");
$check=mysqli_num_rows($query);
$ctype=mysqli_fetch_object($query);
$type1=$ctype->type;
if($check!='0')
{
    if($type1=='student')
    {
    header("Location:../3_backend/index.php?type=student");
    }
    else
    {
    header("Location:../3_backend/index.php?type=admin");
    }
//    header("Location:../3_backend/index.php");
}
else
{
echo "Username and password is Wrong";
}

?>