<?php
session_start();
if ($_SESSION["aemail"]) {
    include '../php/db.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['cancel'])) {
        $demail = $_POST["de"];
        $bid = $_POST["bid"];

        $drivq = "UPDATE driver SET D_status = 0  WHERE D_email='$demail'";
        $bsql = "DELETE FROM booking WHERE B_id='$bid'";
        if ($conn->query($drivq)) {
            if ($conn->query($bsql)) {
                echo "<script>alert('Booking cancelled Succcessfuly!')
                window.location='admindash.php';</script>";
            }
        }
    } elseif (isset($_POST['complete'])) {
        $bid = $_POST["bid"];
        $demail = $_POST["de"];
        $rvsql = "UPDATE booking SET B_ridestatus=1 WHERE B_id = '$bid'";
        $drivsq = "UPDATE driver SET D_status = 0  WHERE D_email='$demail'";
        if($conn->query($rvsql)){
            if($conn->query($drivsq)){
                echo "<script>alert('Vehicle Returned Succcessfuly!')
                window.location='admindash.php';</script>";
            }
        }
       
    }
} else {
    echo "<script>alert('Please Login!')
    window.location='../html/adminlog.html';</script>";
}
