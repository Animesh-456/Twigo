<?php
session_start();
if ($_SESSION["loggedin"]) {
    include '../php/db.php';

    if (isset($_POST["val"])) {
        $V_id = $_POST["V_id"];
    }

    $semail = $_SESSION["email"];


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM vehicle WHERE V_id='$V_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/x-icon" href="../img/fav.png">
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-color: rgb(255, 255, 255);
                }

                * {
                    box-sizing: border-box;
                }

                /* Add padding to containers */
                .container {
                    margin-left: 10%;
                    padding: 16px;
                    background-color: white;
                    margin-top: -30px;
                }

                /* Full-width input fields */
                input[type=text],
                input[type=password],
                select[id=vcity],
                input[type=number],
                input[type=tel],
                input[type=date],
                select[id=rt],
                textarea {
                    width: 50%;
                    padding: 15px;
                    margin: 5px 0px 33px 0px;
                    display: block;
                    border: none;
                    background: #f1f1f1;
                    border-radius: 30px;
                }

                input[type=text]:focus,
                input[type=password]:focus,
                select[id=rt]:focus,
                input[type=number]:focus,
                input[type=date]:focus,
                input[type=tel]:focus,
                textarea:focus {
                    background-color: #ddd;
                    outline: none;
                }

                /* Overwrite default styles of hr */
                hr {
                    border: 0.5px solid #ff0000;
                    margin-bottom: 25px;
                    margin-right: 850px;
                    width: 20%;
                }

                /* Set a style for the submit button */
                /* .registerbtn {
      background-color: #ee0000;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 35%;
      display:inline-block;
      opacity: 0.9;
      border-radius: 30px;
      
    } */

                .registerbtn:hover {
                    opacity: 1;
                }

                .clearbtn {
                    background-color: #ee0000;
                    color: white;
                    padding: 12px 15px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 10%;
                    display: inline-block;
                    opacity: 0.9;
                    border-radius: 30px;
                }

                .clearbtn:hover {
                    opacity: 1;
                }


                .backbtn {
                    background-color: #ee0000;
                    display: inline-block;
                    text-decoration: none;
                    color: rgb(255, 255, 255);
                    cursor: pointer;
                    padding: 16px 30px;
                    font-size: 13px;
                    position: relative;
                    border: none;
                    border-radius: 30px;

                }

                .backbtn:hover {
                    opacity: 1;
                }

                input[type=submit] {
                    background-color: #ee0000;
                    color: white;
                    padding: 16px 20px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 35%;
                    display: inline-block;
                    opacity: 0.9;
                    border-radius: 30px;

                }

                .image {
                    /* padding: 10px ; */
                    width: 80%;
                    padding-right: 10px;
                }

                /* Add a blue text color to links */
                a {
                    color: rgb(255, 9, 9);
                }

                .card {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    max-width: 500px;
                    /* margin: auto; */
                    margin-left: -50%;
                    text-align: center;
                    margin-top: 100px;
                    /* font-family: arial; */
                }

                .title {
                    color: grey;
                    font-size: 18px;
                }

                .button {
                    border: none;
                    outline: 0;
                    display: inline-block;
                    padding: 8px;
                    color: white;
                    background-color: #ee0000;
                    text-align: center;
                    width: 100%;
                    font-size: 18px;
                }

                a {
                    text-decoration: none;
                    font-size: 22px;
                    color: black;
                }
            </style>
        </head>

        <body>
            <form action="rsubmit.php" method="post">
                <div class="container">

                    <table>
                        <tr>
                            <td>
                                <br>
                                <h1>Your <span style="color: #ee0000;">Car</span> Details</h1>
                                <hr>
                                <br>

                                <select id="rt" name="ridetype" required>
                                    <option value="CityRide">City Ride</option>
                                    <option value="LongTrip">Long Trip</option>
                                    <option value="SoloTrip">Solo Ride</option>
                                </select>
                                <input type="submit" name="Book" style="font-size: 20px;">
                                </input>



                                <!-- <table style="width: 100%;"> -->


                                <!-- <a href="renterdash.php" class="backbtn" style="font-size: 20px; margin-left: 250px;">Back</a> -->



                                <!-- <a href="index.html" class="backbtn" style="font-size: 20px; margin-left: 250px;">Back</a> -->

                            </td>

                            <td>
                                <div class="card">
                                    <img src="../img/<?php echo $row["V_name"] ?>.jfif" alt="John" width="80%">
                                    <?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $row["V_name"]); ?>
                                    <h1><?php echo $vname ?></h1>

                                    <p></p>

                                    <p><span class="button">Vehicle ID: - <?php echo $row["V_id"];
                                                                            $_SESSION["V_id"] = $V_id ?></span></p>
                                </div>
                            </td>
                            <!-- <td><img src="../img/undraw_travel_booking_re_6umu.svg" class="image"></img></td> -->
                        </tr>
                    </table>
                </div>
            </form>


        </body>
        <script src="JS/booking.js"></script>
        <?php
        if (isset($_POST["Book"])) {
            $rtype = $_POST["ridetype"];
            if ($rtype == "CityRide") {
                header("location: cityride.php");
            } else if ($rtype == "LongRide") {
                header("location: longride.php");
            } else if ($rtype == "SoloTrip") {
                header("location: solo.php");
            }
        }

        ?>

        </html>
<?php }
} else {
    header("location: ../html/customerlog.html");
} ?>