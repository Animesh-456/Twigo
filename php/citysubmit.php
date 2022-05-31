<?php

session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  //   if (isset($_POST["val"])) {
  //     $V_id = $_POST["V_id"];
  //   };

  $email = $_SESSION["email"];
  $V_id = $_SESSION["V_id"];
  $R_email = $_SESSION["R_email"];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $bdate = $_POST["bdate"];

  $d = "SELECT * FROM driver WHERE D_status=0";
  $b = "SELECT * FROM booking WHERE B_date='$bdate' AND V_id = '$V_id'";
  $dresult = $conn->query($d);
  $drivrow = $dresult->fetch_assoc();
  $bresult = $conn->query($b);
  $brivrow = $bresult->fetch_assoc();

  if (isset($_POST['submit']) && $drivrow != NULL && $brivrow == NULL) {

    $rtype = $_POST["rt"];
    //$bdate = $_POST["bdate"];
    $distance = $_POST["km"];
    $pickup = $_POST["padd"];
    $drop = $_POST["dadd"];
    $V_type = $_SESSION["V_type"];
    $round = $_POST["roundtrip"];
    if ($V_type == "Sedan") {
      if ($distance == "0-10") {
        if ($round == "null") {
          $amount = "100";
        } else if ($round == "yes") {
          $amount = "200";
        }
      } else if ($distance == "10-20") {
        if ($round == "null") {
          $amount = "250";
        } else if ($round == "yes") {
          $amount = "500";
        }
      } else if ($distance == "20-30") {
        if ($round == "null") {
          $amount = "400";
        } else if ($round == "yes") {
          $amount = "800";
        }
      }
    } else if ($V_type == "Suv") {
      if ($distance == "0-10") {
        if ($round == "null") {
          $amount = "160";
        } else if ($round == "yes") {
          $amount = "320";
        }
      } else if ($distance == "10-20") {
        if ($round == "null") {
          $amount = "300";
        } else if ($round == "yes") {
          $amount = "600";
        }
      } else if ($distance == "20-30") {
        if ($round == "null") {
          $amount = "500";
        } else if ($round == "yes") {
          $amount = "1000";
        }
      }
    } else if ($V_type == "Hatchback") {
      if ($distance == "0-10") {
        if ($round == "null") {
          $amount = "80";
        } else if ($round == "yes") {
          $amount = "160";
        }
      } else if ($distance == "10-20") {
        if ($round == "null") {
          $amount = "200";
        } else if ($round == "yes") {
          $amount = "400";
        }
      } else if ($distance == "20-30") {
        if ($round == "null") {
          $amount = "300";
        } else if ($round == "yes") {
          $amount = "600";
        }
      }
    } else if ($V_type == "EV-Sedan") {
      if ($distance == "0-10") {
        if ($round == "null") {
          $amount = "50";
        } else if ($round == "yes") {
          $amount = "100";
        }
      } else if ($distance == "10-20") {
        if ($round == "null") {
          $amount = "100";
        } else if ($round == "yes") {
          $amount = "200";
        }
      } else if ($distance == "20-30") {
        if ($round == "null") {
          $amount = "320";
        } else if ($round == "yes") {
          $amount = "640";
        }
      }
    }
    $date = date('d-m-y h:i:s');

    if($round == "yes"){
      $rtrip = 1;
    }elseif($round == "null"){
      $rtrip = 0;
    }

    $sq = "INSERT INTO booking(C_email, V_id, B_type, B_distance, B_pickup_address, B_drop_address, B_date, 
    B_amount, B_round_trip) 
    values('$email', '$V_id', '$rtype', '$distance', '$pickup', '$drop', '$bdate',
    '$amount', '$rtrip')";

    $sql = "SELECT B_id FROM booking WHERE V_id = '$V_id' AND B_date='$bdate'";

    if ($conn->query($sq)) {

      $dres = $conn->query($sql);
      $drow = $dres->fetch_assoc();
      $bid = $drow["B_id"];
      $_SESSION["bookingid"] = $bid;

      header("location: ../php/checkout.php");
    } else {
      echo $R_email;
      echo "Error submitting the form!" . $conn->error;
    }
  } else {
    echo "<script>alert(' No Driver available OR No booking available for this date!')
    window.location='../php/cityride.php';</script>";
  }
} else {
  header("location: ../html/customerlog.html");
}
