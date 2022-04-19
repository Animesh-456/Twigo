<?php
session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  if ($_POST["val"]) {
    $V_id = $_POST["V_id"];
  };

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

        /* Full-width input fields */
        /* input[type=text],
        input[type=password],
        select[id=city],
        input[type=number],
        input[type=tel],
        input[type=date],
        select[id=gender] {
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
        select[id=city]:focus,
        input[type=number]:focus,
        input[type=date]:focus,
        input[type=tel]:focus,
        select[id=gender]:focus {
          background-color: #ddd;
          outline: none;
        } */

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
      <form action="" method="post">
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
                  <form method="post" action="">
                    <div class="form_wrap">
                      <div class="form_1 data_info">
                        <h2>Choose</h2>
                        <form>
                          <div class="form_container">
                            <div class="input_wrap">
                              <label for="Ride Type">Ride type</label>

                              <select id="rt" required name="rt">
                                <option>City Ride</option>
                                <option>Long Trip</option>
                                <option>Solo Ride</option>
                              </select>
                            </div><br>
                          </div>
                        </form>
                      </div>
                      <div class="form_2 data_info" style="display: none;">
                        <h2>Personal Info</h2>
                        <form name="f2">
                          <div class="form_container">
                            <div class="input_wrap">
                              <label for="user_name">First Name</label>
                              <input type="text" name="fName" class="input" id="user_name" required>
                            </div>
                            <div class="input_wrap">
                              <label for="first_name">Last Name</label>
                              <input type="text" name="lName" class="input" id="first_name">
                            </div>
                            <div class="input_wrap">
                              <label for="last_name">E-mail</label>
                              <input type="email" name="email" class="input" id="last_name">
                            </div>
                          </div>
                        </form>
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
                  </form>
                </div>

                <div class="modal_wrapper">
                  <div class="shadow"></div>
                  <div class="success_wrap">
                    <span class="modal_icon">
                      <ion-icon name="checkmark-sharp"></ion-icon>
                    </span>
                    <p>You have successfully completed the process.</p>
                    <input type="submit" name="submit"></input>
                  </div>
                </div>

              </td>
              <td>
                <div class="card" id="card">
                  <img src="../img/<?php echo $row["V_name"] ?>.jfif" alt="John" width="80%">
                  <?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $row["V_name"]); ?>
                  <h1><?php echo $vname ?></h1>
                  <p class="title">Vehicle KM Driven:- <?php echo $row["V_km_driven"] ?></p>
                  <p class="title">Vehicle Fuel Type:- <?php echo $row["V_emmision_type"] ?></p>
                  <p class="title">Vehicle Rating:- </p>
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
    <script type="text/javascript" src="../JS/bookingscripts.js"></script>
    <?php 
    
    if(isset($_POST["submit"])){

      $rtype = $_POST["rt"];

      $sql = "INSERT INTO booking(B_img_pay) 
      values('$rtype' )";

      if($conn->query($sql)){
        header("location: ../php/renterdash.php");
      }else{
          echo "Error submitting the form!";
      }

    }
    
    
    ?>

    </html>
<?php }
} else {
  header("location: ../html/customerlog.html");
} ?>