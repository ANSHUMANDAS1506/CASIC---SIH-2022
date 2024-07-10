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


$username=$_POST['username'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$type=$_POST['type'];
$otp=rand(0, 9999);
$query=mysqli_query($conn,"insert into signup(username,email,mobile,password,type,otp,status)values('$username','$email','$mobile','$password','$type','$otp','unverified')");
// echo "insert into casic(name,email,organisation,linked_profile,state,description1)values('$name','$email','$organisation','$linked_profile','$state','$description1')";
if($query)
{
	$ch = curl_init();
	//set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, "https://www.fast2sms.com/dev/bulkV2?authorization=0DkoqrK5nNmlaGT1WhbPysAtMgj4EYFCIxvXLOe3JfBu7Z8wpUy4TW1LXa6h3ZHpGzCDbxJjSq8AkcRs&route=q&message=Enter%20OTP%20:".$otp."to%20Complete%20Registration&language=english&flash=0&numbers=".$mobile."");

	// echo "https://www.fast2sms.com/dev/bulkV2?authorization=0DkoqrK5nNmlaGT1WhbPysAtMgj4EYFCIxvXLOe3JfBu7Z8wpUy4TW1LXa6h3ZHpGzCDbxJjSq8AkcRs&route=q&message=Enter%20OTP%20:".$otp."to%20Complete%20Registration&language=english&flash=0&numbers=".$mobile."";

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//grab URL and pass it to the browser
	curl_exec($ch);
	//close cURL resource, and free up system resources
	curl_close($ch);

	header("Location: otp_verify.php?mobile=$mobile");
}
else
{
	echo "One value Not inserted into table";
}

?>
