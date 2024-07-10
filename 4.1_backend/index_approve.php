<html>
<head>    
    <title>Integrated Calendar Event</title>
    
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


        echo "
        <table align='center' border='1'>
        <tr>
        <td>Id</td>
        <td>Event Name</td>
        <td>Event Location</td>
        <td>Payment Mode</td>
        <td>Event type</td>
        <td>Duration</td>
        <td>Start Event Date</td>
        <td>End Event Date</td>
        <td>Status</td>

        </tr>
        ";
        // $id='1';
        $query=mysqli_query($conn,"select *from events where status='unapproved'");

        while($elist=mysqli_fetch_array($query))
        {
        echo "
        <tr>
        <td>".$elist['id']."</td>
        <td>".$elist['event_name']."</td>
        <td>".$elist['event_location']."</td>
        <td>".$elist['payment_mode']."</td>
        <td>".$elist['event_type']."</td>
        <td>".$elist['prem_pub']."</td>
        <td>".$elist['start_event_date']."</td>
        <td>".$elist['end_event_date']."</td>
        <td><button type='button'>
            <a href='approve_final.php?status=approved&id=".$elist['event_name']."'>
                Approve
            </a>
        </button></td>
        </tr>
        
        ";
        $id++;
        }
        echo "</table>";
        ?>
</body>

</html>