<?php

session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_POST["Book"])) {
    $rtype = $_POST["ridetype"];
    if ($rtype == "CityRide") {
        header("location: cityride.php");
    } else if ($rtype == "LongTrip") {
        header("location: longride.php");
    } else if ($rtype == "SoloTrip") {
        header("location: soloride.php");
    }
}
}else{
    header("location: ../html/customerlog.html");
}
?>