<?php

session_start();
if ($_SESSION["loggedin"]) {
    include '../php/db.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $V_id = $_SESSION["V_id"];

    if (isset($_POST["Book"])) {

        $rtype = $_POST["ridetype"];
        $bdate = $_POST["bdate"];

        $bsql = "SELECT * FROM booking WHERE V_id='$V_id' AND B_date='$bdate'";
        $bresult = $conn->query($bsql);
        $brow = $bresult->fetch_assoc();

        $dsql = "SELECT * FROM driver WHERE D_status=0";
        $dresult = $conn->query($dsql);
        $drow = $dresult->fetch_assoc();
        if ($brow["B_date"] == NULL && $drow["D_email"] != NULL && $rtype != "SoloTrip") {
            //$_SESSION["bdate"] = $bdate; 
            if ($rtype == "CityRide") {
                //echo $_SESSION["b"];
                header("location: cityride.php");
            } else if ($rtype == "LongTrip") {
                header("location: longride.php");
            }
        } else if ($rtype == "SoloTrip") {
            header("location: soloride.php");
        } else {
            echo "<script>alert(' No Driver available OR No booking available for this date!')
    window.location='../php/dash.php';</script>";
        }
    }
} else {
    header("location: ../html/customerlog.html");
}
