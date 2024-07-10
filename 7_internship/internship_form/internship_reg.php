<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_hours", "");
define("DB_DATABASE", "casic");
$conn = mysqli_connect(DB_SERVER , DB_USER, DB_hours, DB_DATABASE);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
date_default_timezone_set("Asia/Kolkata");


$comp_name=$_POST['comp_name'];
$location=$_POST['location'];
$duration=$_POST['duration'];
$hours=$_POST['hours'];
$event_date=$_POST['event_date'];
$stipend=$_POST['stipend'];
$remote=$_POST['remote'];
$job_desc=$_POST['job_desc'];
$query=mysqli_query($conn,"insert into internship(comp_name,location,duration,hours,stipend,remote,event_date,job_desc)values('$comp_name','$location','$duration','$hours','$stipend','$remote','$event_date','$job_desc')");
// echo "insert into casic(name,duration,organisation,linked_profile,state,description1)values('$name','$duration','$organisation','$linked_profile','$state','$description1')";
if($query)
{
	header("Location: ../internship.php");
}
else
{
	echo "One value Not inserted into table";
}

?>
