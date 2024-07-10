<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
        
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu|Pompiere|Poppins|Nunito" rel="stylesheet">
	<title>
		Build a Survey Form using HTML and CSS
	</title>

	<style>

		/* Styling the Body element i.e. Color,
		Font, Alignment */
		body {
			font-family: Verdana;
			text-align: center;
		}

		/* Styling the Form (Color, Padding, Shadow) */
		form {
			background-color: #fff;
			/* max-width: 500px; */
			margin: 3rem 3rem;
			padding: 2rem 3rem;
			box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
		}

		/* Styling form-control Class */
		.form-control {
			text-align: left;
			margin-bottom: 25px;
		}

		/* Styling form-control Label */
		.form-control label {
			display: block;
			margin-bottom: 10px;
		}

		/* Styling form-control input,
		select, textarea */
		.form-control input,
		.form-control select,
		.form-control textarea {
			border: 1px solid #777;
			border-radius: 2px;
			font-family: inherit;
			padding: 10px;
			display: block;
			width: 95%;
		}

		/* Styling form-control Radio
		button and Checkbox */
		.form-control input[type="radio"],
		.form-control input[type="checkbox"] {
			display: inline-block;
			width: auto;
		}

        h1 {
            font-family: Poppins;
        }

		/* Styling Button */
		button {
			background-color: #05c46b;
			border: 1px solid #777;
			border-radius: 2px;
			font-family: inherit;
			font-size: 21px;
			display: block;
			width: 100%;
			margin-top: 50px;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>

	<!-- Create Form -->
	<form id="form" action="./feedback_check.php" method="post" enctype='multipart/form-data'>

        <h1>Feedback Form</h1>

		<!-- Details -->
		<div class="form-control">
			<label for="name" id="label-name">
				Name
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="name"
                name="fname"
				placeholder="Enter your name" />
		</div>

		<div class="form-control">
			<label for="email" id="label-email">
				Email
			</label>

			<!-- Input Type Email-->
			<input type="email"
				id="email"
                name="email"
				placeholder="Enter your email" />
		</div>

		<div class="form-control">
			<label id="label-email">
				College
			</label>

			<!-- Input Type Email-->
			<input type="text"
				id="email"
                name="college"
				placeholder="Enter your University" />
		</div>

		<div class="form-control">
			<label>
                How was the event?
			</label>

			<!-- Input Type Radio Button -->
			<label for="recommed-1">
				<input type="radio"
					id="recommed-1"
					name="feed_inp1">Nice</input>
			</label>
			<label for="recommed-2">
				<input type="radio"
					id="recommed-2"
					name="feed_inp2">Fair</input>
			</label>
			<label for="recommed-3">
				<input type="radio"
					id="recommed-3"
					name="feed_inp3">Poor</input>
			</label>
		</div>



		<div class="form-control">
			<label for="role" id="label-role">
				Which option best describes you?
			</label>
			
			<!-- Dropdown options -->
			<select name="role" id="role">
				<option value="student">Student</option>
				<option value="intern">Intern</option>
				<option value="professional">
					Professional
				</option>
				<option value="other">Other</option>
			</select>
		</div>

		<div class="form-control">
			<label>
				Would you recommend this event
				to a friend?
			</label>

			<!-- Input Type Radio Button -->
			<label for="recommed-1">
				<input type="radio"
					id="recommed-1"
					name="radio_inp1">Yes</input>
			</label>
			<label for="recommed-2">
				<input type="radio"
					id="recommed-2"
					name="radio_inp2">No</input>
			</label>
			<label for="recommed-3">
				<input type="radio"
					id="recommed-3"
					name="radio_inp3">Maybe</input>
			</label>
		</div>

        <div class="form-control">
            <label for="comment">
                Upload the Images of the Event
            </label>
            <input type="file" name='mFile'>
        </div>

		

		<div class="form-control">
			<label for="comment">
				Any comments or suggestions
			</label>

			<!-- multi-line text input control -->
			<textarea name="comment" id="comment"
				placeholder="Enter your comment here">
			</textarea>
		</div>

		<!-- Multi-line Text Input Control -->
		<input type="submit" value="submit">
			Submit
		</input>
	</form>

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
		$image1=$mysqli_fetch_object($image);
		$image2=$image1->upload_file;
		echo "<img src='upload/".$image2."'>";
	?>

</body>

</html>
