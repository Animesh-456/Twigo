<?php
session_start();
if ($_SESSION["loggedin"]) {
	include '../php/db.php';

    if (isset($_POST["val"])) {
        $V_id = $_POST["V_id"];
    }

	$email = $_SESSION["email"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "DELETE FROM booking WHERE V_id='$V_id'";
    $s="UPDATE VEHICLE SET V_booking_status = '0'";

	if($conn->query($sql)){
        $conn->query($s);
        header("location: booking.php");
    }else{
        echo $conn->error;
    }
}else{
    header("location: ../html/customerlog.html");
}	
?>



    