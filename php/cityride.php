<?php
session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';


  $V_id = $_SESSION["V_id"];


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
      <link rel="stylesheet" type="text/css" href="../CSS/bookingstyles.css">
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

      <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
          background-color: black;
        }

        * {
          box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
          margin-left: 10%;
          padding: 16px;
          background-color: black;
          margin-top: -30px;
        }



        /* Overwrite default styles of hr */
        hr {
          border: 0.5px solid #ff0000;
          margin-bottom: 25px;
          margin-right: 850px;
          width: 20%;
        }



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
          box-shadow: 0 10px 10px 0 rgba(202, 18, 18, 0.856);
          max-width: 600px;
          /* margin: auto; */
          margin-left: 20%;
          margin-top: 70px;
          text-align: center;
          background-color: white;

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
      <form action="citysubmit.php" method="post" name="f">
        <div class="container">
          <table>
            <tr>
              <td>
                <br>
                <div class="wrapper">
                  <div class="head">
                    <header>
                      <center>Twi<span style="color : red;" color="red">GO</span> Booking Form</center>
                    </header>
                  </div>
                  <div class="header">

                    <ul>
                      <li class="active form_1_progessbar">
                        <div>
                          <p>1</p>
                        </div>
                      </li>
                      <li class="form_2_progessbar">
                        <div>
                          <p>2</p>
                        </div>
                      </li>
                      <li class="form_3_progessbar">
                        <div>
                          <p>3</p>
                        </div>
                      </li>
                    </ul>
                  </div>

                  <div class="form_wrap">
                    <div class="form_1 data_info">
                      <h2>Choose</h2>

                      <div class="form_container">
                        <?php $date  = new DateTime();
                        $maxdate = $date->modify("+28 days");
                        $newd = $maxdate->format("Y-m-d");

                        ?>
                        <div class="input_wrap">
                          <label for="Ride Type">Book for</label>
                          <input type="date" id="txtDate" style="width: 100%;
                          border: 2px solid var(--secondary);
                          border-radius: 3px;
                          padding: 10px;
                          display: block;
                          width: 100%;	
                          font-size: 16px;
                          transition: 0.5s ease;" name="bdate" min="<?php echo date("Y-m-d") ?>" max="<?php echo $newd ?>"></input>
                          <br>

                          <select id="rt" required name="rt">
                            <option value="CityRide">City Ride</option>

                          </select>

                          <!-- <select id="rt" required name="rt">
                            <option>City Ride</option> -->

                          </select>
                        </div><br>
                      </div>

                    </div>
                    <div class="form_2 data_info" style="display: none;">
                      <h2>Travel Info</h2>
                      <!-- <form name="f2"> -->
                      <div class="form_container">

                        <div class="input_wrap">
                          <label for="Ride Type">Select Distance</label>

                          <select id="km" required name="km">
                            <option value="0-10">0-10 KM</option>
                            <option value="10-20">10-20 KM</option>
                            <option value="20-30">20-30 KM</option>
                          </select>
                          <br>
                          <label for="Round Trip">Round Trip</label>
                          <select id="roundtrip" required name="roundtrip">
                            <option value="null">Select</option>
                            <option value="yes">Yes</option>

                          </select>
                        </div><br>
                      </div>
                      <!-- </form> -->
                    </div>
                    <div class="form_3 data_info" style="display: none;">
                      <h2>Address</h2>
                      <form name="f3">
                        <div class="form_container">
                          <div class="input_wrap">
                            <label for="company">Pick-Up Address</label>
                            <input type="text" name="padd" class="input" id="company" required>
                          </div>
                          <div class="input_wrap">
                            <label for="experience">Drop Address</label>
                            <input type="text" name="dadd" class="input" id="experience" required>
                          </div><br>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="btns_wrap">
                    <div class="common_btns form_1_btns">
                      <button type="button" class="btn_next">Next <span class="icon">
                          <ion-icon name="arrow-forward-sharp"></ion-icon>
                        </span></button>
                    </div>
                    <div class="common_btns form_2_btns" style="display: none;">
                      <button type="button" class="btn_back"><span class="icon">
                          <ion-icon name="arrow-back-sharp"></ion-icon>
                        </span>Back</button>
                      <button type="button" class="btn_next">Next <span class="icon">
                          <ion-icon name="arrow-forward-sharp"></ion-icon>
                        </span></button>
                    </div>
                    <div class="common_btns form_3_btns" style="display: none;">
                      <button type="button" class="btn_back"><span class="icon">
                          <ion-icon name="arrow-back-sharp"></ion-icon>
                        </span>Back</button>
                      <button type="button" class="btn_done">Done</button>
                    </div>
                  </div>

                </div>

                <div class="modal_wrapper">
                  <div class="shadow"></div>
                  <div class="success_wrap">
                    <span class="modal_icon">
                      <ion-icon name="checkmark-sharp"></ion-icon>
                    </span>
                    <p>You have successfully completed the process.</p>
                    <input type="submit" name="submit"></input>

      </form>
      </div>
      </div>

      </td>
      <td>
        <div class="card" id="card">
          <img src="../img/<?php echo $row["V_name"] ?>.jfif" alt="John" width="80%">
          <?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $row["V_name"]); ?>
          <h1><?php echo $vname ?></h1>
          <p class="title">Vehicle KM Driven:- <?php echo $row["V_km_driven"] ?></p>
          <p class="title">Vehicle Fuel Type:- <?php echo $row["V_emmision_type"];
                                                $_SESSION["V_type"] = $row["V_type"];
                                                $_SESSION["V_id"] = $row["V_id"];
                                                $_SESSION["R_email"] = $row["R_email"] ?></p>

          <p></p>

          <p><span class="button">Vehicle ID: - <?php echo $row["V_id"] ?></span></p>
        </div>
      </td>

      <td>

      </td>
      <!-- <td><img src="../img/undraw_travel_booking_re_6umu.svg" class="image"></img></td> -->
      </tr>
      </table>
      </div>
      </form>

    </body>
    <!-- <script src="JS/booking.js"></script> -->
    <script type="text/javascript" src="../JS/citybookingscripts.js"></script>



    </html>
<?php }
} else {
  header("location: ../html/customerlog.html");
} ?>