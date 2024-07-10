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

		$image=mysqli_query($conn,"select *from feedback where id='10'");
		$image1=mysqli_fetch_object($image);
		$image2=$image1->upload_file;
		echo "<img src='upload/".$image2."'>";
?>