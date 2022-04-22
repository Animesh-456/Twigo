<?php

session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  //   if (isset($_POST["val"])) {
  //     $V_id = $_POST["V_id"];
  //   };

  $email = $_SESSION["email"];
  $V_id = $_SESSION["V_id"];


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_POST['submit'])) {

    $rtype = $_POST["rt"];
    $distance = $_POST["km"];
    $pickup = $_POST["padd"];
    $drop = $_POST["dadd"];
    $V_type = $_SESSION["V_type"];
    if ($V_type == "Sedan") {
      if ($distance == "0-10") {
        $amount = "100";
      } else if ($distance == "10-20") {
        $amount = "250";
      } else if ($distance == "20-30") {
        $amount = "400";
      }
    } else if ($V_type == "Suv") {
      if ($distance == "0-10") {
        $amount = "160";
      } else if ($distance == "10-20") {
        $amount = "300";
      } else if ($distance == "20-30") {
        $amount = "500";
      }
    } else if ($V_type == "Hatchback") {
      if ($distance == "0-10") {
        $amount = "80";
      } else if ($distance == "10-20") {
        $amount = "200";
      } else if ($distance == "20-30") {
        $amount = "300";
      }
    } else if ($V_type == "EV-Sedan") {
      if ($distance == "0-10") {
        $amount = "50";
      } else if ($distance == "10-20") {
        $amount = "100";
      } else if ($distance == "20-30") {
        $amount = "320";
      }
    }
    $date = date('d-m-y h:i:s');
    $paymentstatus = "0";




    $sq = "INSERT INTO booking(C_email, V_id, B_type, B_distance, B_pickup_address, B_drop_address, B_date, 
    B_amount, B_payment) 
    values('$email', '$V_id', '$rtype', '$distance', '$pickup', '$drop', '$date',
    '$amount', '$paymentstatus')";

    $sql = "UPDATE vehicle SET V_booking_status='1' WHERE V_id='$V_id'";

    if ($conn->query($sq)) {
      $conn->query($sql);
      header("location: ../php/booking.php");
    } else {
      echo "Error submitting the form!" . $conn->error;
    }
  }
} else {
  header("location: ../html/customerlog.html");
}
