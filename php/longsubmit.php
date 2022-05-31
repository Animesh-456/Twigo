<?php

session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  //   if (isset($_POST["val"])) {
  //     $V_id = $_POST["V_id"];
  //   };

  $email = $_SESSION["email"];
  $V_id = $_SESSION["V_id"];
  $bdate = $_POST["bdate"];


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $d = "SELECT * FROM driver WHERE D_status=0";
  $b = "SELECT * FROM booking WHERE B_date='$bdate' AND V_id = '$V_id'";
  $dresult = $conn->query($d);
  $drivrow = $dresult->fetch_assoc();
  $bresult = $conn->query($b);
  $brivrow = $bresult->fetch_assoc();

  if (isset($_POST['submit']) && $drivrow!=NULL && $brivrow==NULL) {

    $rtype = $_POST["rt"];
    $km = $_POST["km"];
    $pickup = $_POST["padd"];
    $drop = $_POST["dadd"];
    $V_type = $_SESSION["V_type"];
    $ACNONAC = $_POST["acnonac"];
    $round = $_POST["roundtrip"];
    if ($V_type == "Sedan") {
        if($ACNONAC == "AC"){
          $amount = "1300";
        }else if($ACNONAC == "NONAC"){
          $amount = "1200";
        }
        if($round == "null"){
          $amount = $amount*1;
        }else if($round == "yes"){
          $amount = $amount*2;
        }
      }
     else if ($V_type == "Suv") {
      if($ACNONAC == "AC"){
        $amount = "1800";
      }else if($ACNONAC == "NONAC"){
        $amount = "1700";
      }
      if($round == "null"){
        $amount = $amount*1;
      }else if($round == "yes"){
        $amount = $amount*2;
      }
    } else if ($V_type == "Hatchback") {
      if($ACNONAC == "AC"){
        $amount = "1100";
      }else if($ACNONAC == "NONAC"){
        $amount = "1000";
      }
      if($round == "null"){
        $amount = $amount*1;
      }else if($round == "yes"){
        $amount = $amount*2;
      }
    } else if ($V_type == "EV-Sedan") {
      if($ACNONAC == "AC"){
        $amount = "1300";
      }else if($ACNONAC == "NONAC"){
        $amount = "1200";
      }
      if($round == "null"){
        $amount = $amount*1;
      }else if($round == "yes"){
        $amount = $amount*2;
      }
    }
    //$date = date('d-m-y h:i:s');
    //$paymentstatus = "0";
    $dist = "100";

    if($round == "yes"){
      $rtrip = 1;
    }elseif($round == "null"){
      $rtrip = 0;
    }


    $sq = "INSERT INTO booking(C_email, V_id, B_type, B_passenger, B_pickup_address, B_drop_address, B_date, 
    B_amount, B_distance, B_round_trip) 
    values('$email', '$V_id', '$rtype', '$km', '$pickup', '$drop', '$bdate',
    '$amount', '$dist', '$rtrip')";

    $sql = "SELECT B_id FROM booking WHERE V_id = '$V_id' AND B_date='$bdate'";

    if ($conn->query($sq)) {
      $dres = $conn->query($sql);
      $drow = $dres->fetch_assoc();
      $bid = $drow["B_id"];
      $_SESSION["bookingid"]= $bid;
      header("location: checkout.php");
    } else {
      echo "Error submitting the form!" . $conn->error;
    }
  }else{
    echo "<script>alert(' No Driver available OR No booking available for this date!')
    window.location='../php/longride.php';</script>";
   } 
} else {
  header("location: ../html/customerlog.html");
}
