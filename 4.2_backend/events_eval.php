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


// $event_id=$_POST['event_id'];
// $event_status=$_POST['event_status'];
// $start_time=$_POST['start_time'];
// $end_time=$_POST['end_time'];
// $event_mode=$_POST['event_mode'];
$event_name=$_POST['event_name'];
$event_date=$_POST['start_event_date'];
$event_date=$_POST['end_event_date'];
$event_location=$_POST['event_location'];
$payment_mode=$_POST['payment_mode'];
$event_desc=$_POST['event_desc'];
$prem_pub=$_POST['prem_pub'];
$visibilty=$_POST['visibilty'];
$event_type=$_POST['event_type'];
$query=mysqli_query($conn,"insert into events
(event_name,start_event_date,end_event_date,event_location,payment_mode,
event_desc,prem_pub,visibilty,event_type)
values('$event_name','$end_event_date','$start_event_date','$event_location','$payment_mode','$event_type','$visibilty','$prem_pub','$event_desc')");
// echo "insert into casic(name,email,organisation,linked_profile,state,description1)values('$name','$email','$organisation','$linked_profile','$state','$description1')";
if($query)
{
	header("Location: ../5_events_page/index_dash.php");
}
else
{
	echo "One value Not inserted into table";
}

?>
