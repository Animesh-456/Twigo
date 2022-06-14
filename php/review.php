<?php
session_start();
	include '../php/db.php';

	//$aemail = $_SESSION["aemail"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM review";
	$result = $conn->query($sql);
	//$row = $result->fetch_assoc();
	
		//$_SESSION["A_name"] = $row["A_name"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <link rel="stylesheet" href="../CSS/reviewstyle.css">
    <link rel='icon' type='image/x-icon' href='../img/fav.png'>
</head>

<body>
    <nav class="nav-bar">
        <h1>Twi<span style="color: red;">Go</span></h1>
        <div class="nav-links" id="nav-links">
          <ul>
            <li><a href="../html/index.html">HOME</a></li>
            <li><a href="../html/chooselog.html">LOGIN</a></li>
          </ul>
        </div>
      </nav>
    <table>
        <?php while($row = $result->fetch_assoc()){?>
        <tr>
            <td>
                <div class="courses-container">
                    
                    <div class="course">
                        <div class="course-preview">
                            <h6></h6>
                            <h2><?php 
                            $csq = "SELECT * FROM customer WHERE C_email = '$row[C_email]'";
                            $cresult = $conn->query($csq);
	                        $crow = $cresult->fetch_assoc();
                            echo $crow["C_name"]?></h2>
                            <a href="#"><?php echo $crow["C_email"]?><i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="course-info">
                            <div class="progress-container">
                                
                                    <!-- <style>
                                        .progress::after {
                                            border-radius: 3px;
                                            background-color: red;
                                            content: "";
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            height: 5px;
                                            width: <?php 
                                            echo $row["RV_rate"]*10?>px;
                                        }
                                    </style> -->
                                <!-- <div class="progress"></div> -->
                                <h3><?php echo $row["RV_rate"]?>/5</h3>
                                <span class="progress-text">
                                    rating
                                </span>
                            </div>
                            <h6>comment</h6>
                            <h2><?php echo $row["RV_comment"]?></h2>
                        </div>
                    </div>
                </div>
            </td> 
        </tr>  
            <!-- <td>
                <div class="courses-container">
                    <div class="course">
                        <div class="course-preview">
                            <h6>ID OF CUSTOMER</h6>
                            <h2>ARPAN GANGULY</h2>
                            <a href="#">EMAIL OF CUSTOMER <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="course-info">
                            <div class="progress-container">
                                <style>
                                    .progress::after {
                                        border-radius: 3px;
                                        background-color: red;
                                        content: "";
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        height: 5px;
                                        width: 90%;
                                    }
                                </style>
                                <div class="progress"></div>
                                <span class="progress-text">
                                    rating
                                </span>
                            </div>
                            <h6>comment</h6>
                            <h2>i dont like this website ..</h2>
                        </div>
                    </div>
                </div>
            </td>
            

        </tr>
        <tr>
            <td>
                <div class="courses-container">
                    <div class="course">
                        <div class="course-preview">
                            <h6>ID OF CUSTOMER</h6>
                            <h2>ARPAN GANGULY</h2>
                            <a href="#">EMAIL OF CUSTOMER <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="course-info">
                            <div class="progress-container">
                                <style>
                                    .progress::after {
                                        border-radius: 3px;
                                        background-color: red;
                                        content: "";
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        height: 5px;
                                        width: 90%;
                                    }
                                </style>
                                <div class="progress"></div>
                                <span class="progress-text">
                                    rating
                                </span>
                            </div>
                            <h6>comment</h6>
                            <h2>i dont like this website ..</h2>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="courses-container">
                    <div class="course">
                        <div class="course-preview">
                            <h6>ID OF CUSTOMER</h6>
                            <h2>ARPAN GANGULY</h2>
                            <a href="#">EMAIL OF CUSTOMER <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="course-info">
                            <div class="progress-container">
                                <style>
                                    .progress::after {
                                        border-radius: 3px;
                                        background-color: red;
                                        content: "";
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        height: 5px;
                                        width: 90%;
                                    }
                                </style>
                                <div class="progress"></div>
                                <span class="progress-text">
                                    rating
                                </span>
                            </div>
                            <h6>comment</h6>
                            <h2>i dont like this website ..</h2>
                        </div>
                    </div>
                </div>
            </td>
        </tr> -->
        <?php } ?>
       
    </table>
    </body>


    <script>
        // INSERT JS HERE


        // SOCIAL PANEL JS
        const floating_btn = document.querySelector('.floating-btn');
        const close_btn = document.querySelector('.close-btn');
        const social_panel_container = document.querySelector('.social-panel-container');

        floating_btn.addEventListener('click', () => {
            social_panel_container.classList.toggle('visible')
        });

        close_btn.addEventListener('click', () => {
            social_panel_container.classList.remove('visible')
        });
    </script>


</html>
