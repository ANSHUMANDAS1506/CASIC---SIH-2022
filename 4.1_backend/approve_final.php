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

$status=$_GET['status'];
$id=$_GET['id'];
'status'='unapproved'
$check=mysqli_query($conn,"update events set status='approved' where event_name='$id'");
echo "update events set status='approved' and event_name='$id'";
if($check)
{

    header("Location: http://localhost/casic_final/casic_final/5_events_page/index_dash.php");
}

?>