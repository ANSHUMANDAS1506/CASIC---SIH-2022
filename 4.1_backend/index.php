<?php
$type = isset($_GET['type']) ? $_GET['type'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <!--MATERTIAL CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@40,500,1,200" />

    <!--STYLESHEET CDN-->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="images/logo1.png">
                    <h2><span class="danger">CASIC</span> </h2>
                </div>
                <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>                        
                </div>
            </div>
            <div class="sidebar">
            <a href="#">
                <span class="material-icons-sharp">manage_accounts</span>
                <h3>Account</h3>
            </a>
            <a href="../3_backend/index.php" class="active">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <?php
            if($type=='student')
            {
            echo "
            <a href='../5_events_page/index_dash.php?type=student'>
                <span class='material-icons-sharp'>emoji_events</span>
                <h3>Events</h3>
            </a>
            <a href='../7_internship/internship.php?type=student'>
                <span class='material-icons-sharp'>school</span>
                <h3>Internships</h3>
            </a>
            ";
            }
            if($type=='admin')
            {
            echo "
            <a href='../5_events_page/index_dash.php?type=admin'>
                <span class='material-icons-sharp'>emoji_events</span>
                <h3>Events</h3>
            </a>
            <a href='../7_internship/internship.php?type=admin'>
                <span class='material-icons-sharp'>school</span>
                <h3>Internships</h3>
            </a>
            ";
            }
            ?>  
            <a href="#">
                <span class="material-icons-sharp">groups</span>
                <h3>Community</h3>
                <span class="message-count" >50</span>
            </a>
            <a href="../8_calendar/index.html">
                <span class="material-icons-sharp">calendar_month</span>
                <h3>Academic Calender</h3>
                <span class="message-count" >10</span>                
            </a>            
            <a href="#">
                <span class="material-icons-sharp">notifications_active</span>
                <h3>Notification</h3>
                <span class="message-count" >5</span>
            </a>
            <?php
            if($type=='admin')
            {
            echo "
            <a href='../4_backend/index.php'>
                <span class='material-symbols-sharp'>campaign</span>
                <h3>Publicize</h3>   
            </a>
            ";
            }
            ?>
            <a href="../2_signin_signup/login.html">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a>
            </div>                  
        </aside>

        <!--------------------------------END OF ASIDE-------------------------------------------------------->
        <main>
            <h1>Account</h1>
     
            <div class="date">
                <input type="date">
                <span class="material-icons-sharp">calendar_month</span>
            </div>

            <div class="insights">
                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Events</h3>
                            <h2>4</h2>
                            <h3>Registered Events</h3>                           
                            <h2>3</h2>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>80%</p>
                            </div>                            
                        </div>
                    </div>
                    <small class="text-muted">Last 7 Days</small>
                </div>
                <!----------------- END OF SALES------------------->
                <div class="expenses">
                    <span class="material-icons-sharp">insights</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Web-Shops</h3>
                            <h2>6</h2>
                            <h3>Attended Web-Shops</h3>                           
                            <h2>3</h2>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>70%</p>
                            </div>                            
                        </div>
                    </div>
                    <small class="text-muted">Last 3 Days</small>
                </div>
                <!----------------- END OF COURSE PROGRESS------------------->
                <div class="income">
                    <span class="material-icons-sharp">psychology</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Task Points</h3>
                            <h2>20</h2>
                            <h3>Completed Tasks</h3>                           
                            <h2>14</h2>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>50%</p>
                            </div>                            
                        </div>
                    </div>
                    <small class="text-muted">Last 7 Days</small>
                </div>
                <!----------------- END OF TOTAL POINTS------------------->
            </div>
            <!-----------------END OF INSIGHTS------------------------------------------>
            <div class="recent-orders">
                <h2>Recent Events</h2>
                <table>
                    <thead>
                        <tr>
                            <th width="25%">Event Name</th>
                            <th width="25%">Event ID</th>
                            <th width="25%">Event Date</th>
                            <th width="25%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
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
<tr>
<td>".$event['event_id']."</td>
<td>".$event['event_name']."</td>
<td>".$event['event_date']."</td>";
if ($event['event_status']=='registered')
{
echo "<td class='success'>".$event['event_status']."</td>";
}
if ($event['event_status']=='pending')
{
echo "<td class='warning'>".$event['event_status']."</td>";
}
echo "</tr>
";
}
?>
                        
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!--------------------------------END OF MAIN------------------------------------------------->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey,<b>Harsh Kumar</b></p>
                        <small class="text-muted">
                        <?php
                            if($type!='student')
                            {
                            echo "
                            Admin";
                            }
                            if($type!='admin')
                            {
                            echo "
                            Student";
                            }
                            ?>
                        </small>
                    </div>
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg" >
                    </div>
                </div>
            </div>
            <!----------------------END OF TOP---------------------->
            <div class="recent-updates">
                <h2>Recents</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-2.jpg">
                        </div>
                        <div class="message">
                            <p><b>Madhur Patel</b> also participated in
                            VIT Tech week.</p>
                            <small class="">10 Minutes Ago!</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg">
                        </div>
                        <div class="message">
                            <p><b>Shashank Suggala</b> also participated in
                                 IITB E-CELL 
                                 Mania  .</p>
                            <small class="">4 Hours Ago!</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg">
                        </div>
                        <div class="message">
                            <p><b>Sweta Soundarya</b> also registered for SIH 2022.</p>
                            <small class="">6 Hours Ago!</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg">
                        </div>
                        <div class="message">
                            <p><b>Sushrith Reddy</b> also registered NIT CodeFest.</p>
                            <small class="">23 Hours Ago!</small>
                        </div>
                    </div>

                </div>
                </div>
                <!-----------------------END OF RECENT UPDATES----------------->
                <div class="sales-analytics">
                    <h2>SCOPES</h2>
                    <div class="item online">
                        <div class="icon">
                            <span class="material-icons-sharp">alarm_add</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Online Internships</h3>
                                <small class="text-muted">Last 24 Hours!</small>
                            </div>
                            <h5 class="success">+5new</h5>
                            <h3>10</h3>
                        </div>
                    </div>
                    <div class="item offline">
                        <div class="icon">
                            <span class="material-icons-sharp">alarm_add</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Offline Internships</h3>
                                <small class="text-muted">Last 24 Hours!</small>
                            </div>
                            <h5 class="success">+2new</h5>
                            <h3>4</h3>
                        </div>
                    </div>
                    <div class="item tasks">
                        <div class="icon">
                            <span class="material-icons-sharp">alarm_add</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Research Program</h3>
                                <small class="text-muted">Last 24 Hours!</small>
                            </div>
                            <h5 class="success">+2new</h5>
                            <h3>3</h3>
                        </div>
                    </div>
                    <div class="item add-product">
                        <div>
                            <span class="material-icons-sharp">add_task</span>
                            <h3>Add Tasks</h3>
                        </div>

                    </div>

                </div>

                <div class="sales-analytics">
                    <a href="../3_backend/feedbackform.html">
                    <h2>COMPLETED EVENTS</h2>
                    <div class="item online">
                        <!-- <div class="icon">
                            <span class="material-icons-sharp">alarm_add</span>
                        </div> -->
                        <div class="right">
                            <div class="info">
                                <h3>Smart India Hackathon (SIH)</h3>
                                <small class="text-muted">Feedback Form</small>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="item offline">
                        <div class="right">
                            <div class="info">
                                <h3>graVITas</h3>
                                <small class="text-muted">Feedback Form</small>
                            </div>
                        </div>
                    </div>
                    <div class="item tasks">
                        <div class="right">
                            <div class="info">
                                <h3>Riviera</h3>
                                <small class="text-muted">Feedback Form</small>
                            </div>
                        </div>
                    </div>
                    <div class="item add-product">
                        <div>
                            <span class="material-icons-sharp">add_task</span>
                            <h3>Add Tasks</h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <script src="./index.js"></script>
 
</body>
</html>