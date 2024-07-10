<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Sign in & Sign up Form</title>
  </head>
  <body>
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
        $mobile=$_POST['mobile'];
        $otp=$_POST['otp'];
        echo "select *from users where otp='$otp' and mobile='$mobile'";
        $query=mysqli_query($conn,"select *from signup where otp='$otp' and mobile='$mobile'");
        $count=mysqli_num_rows($query);
        if($count=='0')
        {
            echo "<h3>OTP is Invalid, Go back enter OTP send to your mobile";
        }
        if($count!='0')
        {
            mysqli_query($conn,"update signup set status='verified' where mobile='$mobile'");
            echo "You account is now active and ready to login";
        }
    ?>
  </body>
</html>