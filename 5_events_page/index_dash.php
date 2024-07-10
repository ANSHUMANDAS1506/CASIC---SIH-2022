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
                <?php
                if($type=='admin')
                {
                echo "
                <a href='../4_backend/index.php'>
                    <li>ADD EVENTS</li>
                </a>
                ";
                }
                ?>
                <li>PAGES</li>
            </ul>
            <ul class="account-ul">
                <li>MY <span>ACCOUNT</span></li>
            </ul>
        </div>
    </nav>

    <h1 class="event-heading">EVENTS</h1>
    
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
                    $display=mysqli_query($conn,"select *from events");
                    while($event=mysqli_fetch_array($display))
                    {
                    
                echo "

        <div class='item-container'>";
                     echo "
                     <div class='img-container'>";
                    $image=mysqli_query($conn,"select *from events where event_name='".$event['event_name']."'");
                    $image1=mysqli_fetch_object($image);
                    $image2=$image1->upload_file;
                    echo "<img src='http://localhost/casic_final/casic_final/3_backend/upload/".$image2."'>";
                        echo "

                     </div>
                     <div class='body-container'>
                         <div class='overlay'></div>
 
                         <div class='event-info'>
                             <p class='title'>".$event['event_name']."</p>
                             <!-- <div class='separator'></div> -->
                             <p class='info'>".$event['event_location']."</p>
                             <p class='price'>".$event['payment_mode']."</p>
                             <div class='additional-info'>
                                 <p class='info'>
                                     <i class='fas fa-map-marker-alt'></i>
                                     ".$event['event_mode']."
                                 </p>
                                 <p class='info'>
                                     <i class='far fa-calendar-alt'></i>
                                     ".$event['event_date']."
                                     ".$event['start_time']."
                                 </p>
                                 <p style='text-align:center;'>to</p><br>
                                 <p class='info'>
                                     <i class='far fa-calendar-alt'></i>
                                     ".$event['event_date']."
                                     ".$event['end_time']."
                                 </p>
                                 <p class='info description'>
                                     ".$event['event_status']."
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