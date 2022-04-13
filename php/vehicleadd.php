<?php
session_start();
if ($_SESSION["remail"]) {
  include '../php/db.php';

  $remail = $_SESSION["remail"];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM renter WHERE R_email='$remail'";
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
        select[id=city],
        input[type=number],
        input[type=tel],
        input[type=date],
        select[id=gender],
        select[id=vtype],
        select[id=ftype],
        select[id=sedancname],
        select[id=suvcname],
        select[id=hatchbackcname],
        select[id=evcname]{
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
        select[id=gender]:focus,
        select[id=vtype]:focus,
        select[id=ftype]:focus,
        select[id=sedancname]:focus,
        select[id=suvcname]:focus,
        select[id=hatchbackcname]:focus,
        select[id=ev]:focus{
          background-color: #ddd;
          outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
          border: 0.5px solid #ff0000;
          margin-bottom: 25px;
          margin-right: 1150px;
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
          margin-left: -70%;
          text-align: center;
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

        /* .container .sedan {
          display: none;
        }

        .container .suv {
          display: none;
        }

        .container .hatchback {
          display: none;
        } */
      </style>
    </head>

    <body>
      <form action="customersubmit.php" method="post">
        <div class="container">



          <br>
          <h1>Twi<span style="color: #ee0000;">Go</span> Add Vehicle </h1>
          <hr>
          <br>


          <!-- <table style="width: 100%;"> -->




          <label for="F_type" name="ftype"><b>Fuel Type</b></label>
          <select id="ftype" name="ftype">
            <option value="diesel">Diesel</option>
            <option value="electric">Electric</option>
          </select>

          <label for="V_type" name="vtype"><b>Vehicle Type</b></label>
          <select id="vtype" name="vtype" >
            <option value="sedan" selected="selected">Sedan</option>
            <option value="suv">Suv</option>
            <option value="hatchback">Hatchback</option>
            <option value="evsedan">EV-Sedan</option>
          </select>

          <label for="sedancname" name="sedancname"><b>Car name</b></label>
          <div id="sedan" >
            <select id="sedancname" name="carname">
              <option value="Suzukidzire">Suzuki Dzire</option>
              <option value="TataTigor">Tata Tigor</option>
              <option value="HondaCity">Honda City</option>
              <option value="SuzukiCiaz">Suzuki Ciaz</option>
              <option value="HyundaiVerna">Hyundai Verna</option>
              <option value="VolkswagenVento">Volkswagen Vento</option>
              <option value="SkodaSlavia">Skoda Slavia</option>
              <option value="HyundaiAura">Hyundai Aura</option>
            </select>
          </div>
          <div id="suv">

            <select id="suvcname"  name="carname">
              <option value="KiaSeltos">Kia Seltos</option>
              <option value="HyundaiCreta">Hyundai Creta</option>
              <option value="MahindraThar">Mahindra Thar</option>
              <option value="MahindraScorpio">Mahindra Scorpio</option>
              <option value="TataSafari">Tata Safari</option>
              <option value="HyundaiAlcazar">Hyundai Alcazar</option>
              <option value="SuzukiErtiga">Suzuki Ertiga</option>
              <option value="MahindraMarazzo">Mahindra Marazzo</option>
              <option value="InnovaCrysta">Innova Crysta</option>
              <option value="SuzukiXL6">Suzuki XL6</option>
            </select>
          </div>
          <div id="hatchback">
          <select id="hatchbackcname"  name="carname">
          <option value="RenaultKwid">Renault Kwid</option>
              <option value="HyundaiSantro">Hyundai Santro</option>
              <option value="TataTiago">Tata Tiago</option>
              <option value="HyundaiGrandi10nios">Hyundai Grand i10 nios</option>
              <option value="SuzukiSwift">Suzuki Swift</option>
              <option value="VolkswagenPolo">Volkswagen Polo</option>
              <option value="Hyundaii20">Hyundai i20</option>
              <option value="SuzukiWagonR">Suzuki WagonR </option>
              <option value="TataAltroz">Tata Altroz</option>
          </select>
          </div>
          <div id="ev">
          <select id="evcname" name="carname">
              <option value="TataTigorEV">Tata Tigor EV</option>
          </select>
          </div>

          <!-- <label for="V_type"><b>Start Date</b></label>
                <input type="text" placeholder="" name="sdate" id="sdate" required> -->

          <label for="edate"><b>End Date</b></label>
          <input type="date" placeholder="" name="edate" id="edate" required>

          <label for="days"><b>No of days</b></label>
          <input type="number" placeholder="for how many days" name="days" id="days" required>

          <label for="days"><b>Bill Amount</b></label>
          <input type="number" placeholder="total money to pay" name="amt" id="amt" required>

          <label for="days"><b>A/C Number- 6734565784654</b></label><br>
          <br>
          <input type="submit" name="Book" value="Book" style="font-size: 20px;">
          </input>

          <!-- <a href="index.html" class="backbtn" style="font-size: 20px; margin-left: 250px;">Back</a> -->
          <button type="reset" class="clearbtn" style="font-size: 20px; margin-left: 150px">Clear</button>


          <!-- <td><img src="../img/undraw_travel_booking_re_6umu.svg" class="image"></img></td> -->


        </div>
      </form>

    </body>
    <!-- <script src="JS/booking.js"></script> -->
    <script>
      var e = document.getElementById("vtype");
      var strUser;
      function show() {
        var as = document.forms[0].vtype.value;
        strUser = e.options[e.selectedIndex].value;
        console.log(as, strUser);
        if (strUser == "sedan") {
          console.log("This is a sedan car");
          document.getElementById("sedan").style.display = "block";
          document.getElementById("suv").style.display = "none";
          document.getElementById("hatchback").style.display = "none";
          document.getElementById("ev").style.display = "none";
        } else if (strUser == "suv") {
          console.log("This is a suv car");
          document.getElementById("sedan").style.display = "none";
          document.getElementById("suv").style.display = "block";
          document.getElementById("hatchback").style.display = "none";
          document.getElementById("ev").style.display = "none";
        } else if (strUser == "hatchback") {
          console.log("This is a hatchback car");
          document.getElementById("sedan").style.display = "none";
          document.getElementById("suv").style.display = "none";
          document.getElementById("hatchback").style.display = "block";
          document.getElementById("ev").style.display = "none";
        }else if(strUser=="evsedan"){
          console.log("This is a ev car");
          document.getElementById("sedan").style.display = "none";
          document.getElementById("suv").style.display = "none";
          document.getElementById("hatchback").style.display = "none";
          document.getElementById("ev").style.display = "block";
        }

      }
      e.onchange = show;
      show();
    </script>

    </html>
<?php }
} else {
  header("location: ../html/customerlog.html");
} ?>