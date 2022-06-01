<?php
session_start();
if ($_SESSION["aemail"]) {
    include '../php/db.php';

    //$aemail = $_SESSION["aemail"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $vid = $_POST["V_id"];

    $sql = "SELECT * FROM vehicle WHERE V_id='$vid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row) {
        //$_SESSION["A_name"] = $row["A_name"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard</title>
            <link rel="stylesheet" href="../CSS/vehdetail.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel='icon' type='image/x-icon' href='../img/fav.png'>
        </head>
        <style>
            input[type=submit] {
                background-color: #ee0000;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 30%;
                display: inline-block;
                opacity: 0.9;
                border-radius: 30px;
            }
        </style>

        <body>
            <div class="cont_principal">
                <div class="cont_central">
                    <div class="cont_modal cont_modal_active">
                        <div class="cont_photo">
                            <div class="cont_img_back">
                                <img src="../img/<?php echo $row["V_name"] ?>.jfif" alt="" />


                            </div>
                            <div class="detailtext">
                                <h3><?php echo $row["V_name"] ?></h3>
                            </div>


                        </div>
                        <div class="cont_text_ingredients">
                            <div class="cont_over_hidden">

                                <div class="cont_tabs">
                                    <ul>
                                        <li><a href="#">
                                                <h4>CAR DETAILS</h4>
                                            </a></li>
                                    </ul>
                                </div>

                                <div class="cont_text_det_preparation">
                                    <div class="cont_text_det_preparation">

                                        <div class="cont_title_preparation">
                                            <p><?php echo $row["V_name"] ?></p>
                                        </div>
                                        <div class="cont_info_preparation">
                                            <p>Vehicle ID - <?php echo $row["V_id"] ?></p>
                                            <p>Vehicle Type - <?php echo $row["V_type"] ?></p>
                                            <p>Vehicle Number - <?php echo $row["V_no"] ?></p>
                                            <p>Vehicle Chasis Number - <?php echo $row["V_Chasis_no"] ?></p>
                                            <p>Vehicle Km Driven - <?php echo $row["V_km_driven"] ?></p>
                                            <p>Vehicle Capacity - <?php echo $row["V_no_seats"] ?> persons</p>
                                            <p>Vehicle City - <?php echo $row["V_city"] ?></p>
                                            <p>Vehicle Address- <?php echo $row["V_address"] ?></p>
                                            <p>Vehicle Description - <?php echo $row["V_description"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <form action="vehicleadmindetails.php" method="post">
                                    <input type='submit' name='val' value='BACK' id='btn' class='button'>
                                </form>
                            </div>

                            <div class="cont_btn_open_dets">
                                <a href="#e" onclick="open_close()"><i class="material-icons">&#xE314;</i></a>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    window.onload = function() {
                        document.querySelector('.cont_modal').className = "cont_modal";
                    }
                    var c = 0;

                    function open_close() {
                        if (c % 2 == 0) {
                            document.querySelector('.cont_modal').className = "cont_modal cont_modal_active";
                            c++;
                        } else {
                            document.querySelector('.cont_modal').className = "cont_modal";
                            c++;
                        }
                    }
                </script>
        </body>

        </html>
<?php }
} else {
    header("location: ../html/adminlog.html");
} ?>