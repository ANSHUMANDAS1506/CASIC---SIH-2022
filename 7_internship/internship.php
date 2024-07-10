<?php
$type=$_GET['type'];
// echo $type;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu|Pompiere|Poppins|Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Events</title>
</head>
<body>
        
    <nav>
        <div>
            <ul class="logo-ul">
                <h1>CAS<span>IC</span></h1>
            </ul>
            <ul class="links-ul">
                <li>HOME</li>
                <li>ABOUT</li>
                <li>CALENDER</li>
                <a href="../7_internship/internship_form/index.html" class="active">
                    <?php
                    if($type=='admin')
                    {
                       echo "<li>ADD INTERNSHIPS</li>";
                    }
                    ?>
                </a>
                
                <li>PAGES</li>
            </ul>
            <ul class="account-ul">
                <li>MY <span>ACCOUNT</span></li>
            </ul>
        </div>
    </nav>

    <h1 class="event-heading">INTERNSHIPS</h1>
    
    <div class="container">
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
                    $display=mysqli_query($conn,"select *from internship");
                    while($event=mysqli_fetch_array($display))
                    {
                    
                echo "

        <div class='item-container'>
            <div class='img-container'>
                <img src='./images/img1.jpg' alt='Event image'>
            </div>";
                     echo "
                     <div class='body-container'>
                         <div class='overlay'></div>
 
                         <div class='event-info'>
                             <p class='title'>".$event['comp_name']."</p>
                             <!-- <div class='separator'></div> -->
                             <p class='info'>".$event['location']."</p>
                             <p class='price'>".$event['duration']."</p>
                             <div class='additional-info'>
                                 <p class='info'>
                                     <i class='fas fa-map-marker-alt'></i>
                                     ".$event['remote']."
                                 </p>
                                 <p class='info'>
                                     <i class='far fa-calendar-alt'></i>
                                     ".$event['hours']."
                                 </p>
                                 <p class='info'>
                                    <i class='far fa-calendar-alt'></i>
                                    ".$event['event_date']."
                                    ".$event['hours']."
                                 </p>
                                 <p class='info description'>
                                    ".$event['stipend']."
                                 </p>
                                 <p class='info description class-desc-12'>
                                    ".$event['job_desc']."
                                 </p>
                             </div>
                 
                    </div>                    
                <button class='action'>Book it</button>
            </div>
            
        </div>    
        ";
} 
?>   
    </div>
                    
</body>
</html>