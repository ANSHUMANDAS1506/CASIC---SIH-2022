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


$fname=$_POST['fname'];
$email=$_POST['email'];
$college=$_POST['college'];
$eve_feed=$_POST['eve_feed'];
$feed_inp1=$_POST['feed_inp1'];
$feed_inp2=$_POST['feed_inp2'];
$feed_inp3=$_POST['feed_inp3'];
$role=$_POST['role'];
$radio_inp1=$_POST['radio_inp1'];
$radio_inp2=$_POST['radio_inp2'];
$radio_inp3=$_POST['radio_inp3'];
$comment=$_POST['comment'];
$UploadDirectory	= "upload/"; //Upload Directory, ends with slash & make sure folder exist
if (!@file_exists($UploadDirectory)) {
	//destination folder does not exist
	die("Make sure Upload directory exist!");
}
if(!isset($_FILES['mFile']))
	{
		//required variables are empty
		die("File is empty!");
	}
	$FileName		= strtolower($_FILES['mFile']['name']); //uploaded file name
	$FileTitle		= 'image'; // file title
	$ImageExt		= substr($FileName, strrpos($FileName, '.')); //file extension
	$FileType		= $_FILES['mFile']['type']; //file type
	$FileSize		= $_FILES['mFile']["size"]; //file size
	$RandNumber   	= rand(0, 9999); //Random number to make each filename unique.
	$edate          = date("d_m_Y");
	//File Title will be used as new File name
	$NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtoupper($FileTitle));
        $NewFileName= $NewFileName.'_'.$RandNumber.'_'.$edate.$ImageExt; 
        
	
   //Rename and save uploded file to destination folder.
   if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory.$NewFileName ))
   {

$query=mysqli_query($conn,"insert into feedback
(fname,email,college,eve_feed,feed_inp1,feed_inp2,feed_inp3,role,radio_inp1,radio_inp2,radio_inp3,comment,upload_file)
values('$fname','$email','$college','$eve_feed','$feed_inp1','$feed_inp2','$feed_inp3',
'$role','$radio_inp1','$radio_inp2','$radio_inp3','$comment','$NewFileName')");
   }
// echo "insert into casic(name,email,organisation,linked_profile,state,description1)values('$name','$email','$organisation','$linked_profile','$state','$description1')";
if($query)
{
	echo "
		<h1>FEEDBACK SUCCESSFULLY SUBMITTED</h1>
	";
}
else
{
	echo "One value Not inserted into table";
}
   
?>
