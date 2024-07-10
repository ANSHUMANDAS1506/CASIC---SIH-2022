<?php
$mobile=$_GET['mobile'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="otp_confirmed.php" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="OTP" name="otp"/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <input type='hidden' name='mobile' value='<?php echo $mobile; ?>'>
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
