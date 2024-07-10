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
            <a href="../3_backend/index.php" >
                <span class="material-icons-sharp">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="../5_events_page/index_dash.php">
                <span class="material-icons-sharp">emoji_events</span>
                <h3>Events</h3>
            </a>
            <a href="../7_internship/internship.php">
                <span class="material-icons-sharp">school</span>
                <h3>Internships</h3>
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
                if ($type == 'admin') {
                    echo "
                    <a href='../4_backend/index.php'>
                        <span class='material-symbols-sharp'>campaign</span>
                        <h3>Publish</h3>   
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
            
        <?php
            if ($type == 'admin') {
                echo "
                <h1>Event Organisation Form</h1>
                ";
            }
            ?>
            
            <?php
            if ($type != 'student') {
                echo "
                <form  action='index_approve.php' method='post'>

                <div class='insights'>

                    <!-- Event ID -->
                    
                    <div class='oneform'>
                    <label class='form-label' for='form2Example2'>
                        Event Type
                    </label><br>
                        <select name='event_type'>
                            <option value='None'>---None---</option>
                            <option value='Cultural'>Cultural</option>
                            <option value='Technical'>Technical</option>
                            <option value='Sport'>Sport</option>
                        </select>         
                    </div>

                    <!-- Event Name-->
                    <div class='oneform'>
                        <input type='text' id='form2Example1' name='event_name'/>
                        <label class='form-label' for='form2Example1'>Event Name</label>
                    </div>
                    
                    <div class='oneform'>
                        <input type='text' id='form2Example2' name='event_desc' /><br>
                        <label class='form-label' for='form2Example2'>
                            Event Description
                        </label>
                    </div>

                    <!-- Date -->
                    <div class='oneform'>
                        <input type='date' id='form2Example1' name='start_event_date'/><br>
                        <label class='form-label' for='form2Example1'>Start Date</label>
                    </div>

                    <!-- Date -->
                    <div class='oneform'>
                        <input type='date' id='form2Example1' name='end_event_date'/><br>
                        <label class='form-label' for='form2Example1'>End Date</label>
                    </div>
                    
                    <div class='oneform'>
                        <input type='text' id='form2Example2' name='event_location' /><br>
                        <label class='form-label' for='form2Example2'>Location</label>
                    </div>
                    
                    <div class='oneform'>
                        <input type='text' id='form2Example2' name='payment_mode' /><br>
                        <label class='form-label' for='form2Example2'>Event Mode</label>
                    </div>
                    
                    <div class='oneform'>
                    <label class='form-label' for='form2Example2'>
                        Premium Publishment
                    </label><br>
                        <select name='prem_pub'>
                            <option value='No'>No</option>
                            <option value='Yes'>Yes</option>
                        </select>         
                    </div>
                    
                    <div class='oneform'>
                        <input type='text' id='form2Example2' name='visibilty' /><br>
                        <label class='form-label' for='form2Example2'>
                            Visibility
                        </label>
                    </div>
                    
                    <div class='oneform'>
                        <label for='comment'>
                            Upload the Images of the Event
                        </label>
                        <input type='file' name='mFile'>
                    </div>

                </div>

                <div class='button-unique'>
                    <button type='submit' class=''>Add Event</button>
                </div>

            </form>
            ";
            }
            ?>
     
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
                        <small class="text-muted">Admin</small>
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

            </div>

        </div>
    </div>
    <script src="./index.js"></script>
 
</body>
</html>