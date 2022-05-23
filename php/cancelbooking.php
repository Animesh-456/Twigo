<?php
session_start();
if ($_SESSION["loggedin"]) {
	include '../php/db.php';

    if (isset($_POST["val"])) {
        $B_id = $_POST["B_id"];
    }

	$email = $_SESSION["email"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "DELETE FROM booking WHERE B_id='$B_id'";
    
    $ds="SELECT * FROM booking WHERE B_id='$B_id'";
    $drivresult = $conn->query($ds);
    $drow = $drivresult->fetch_assoc();
    $driveremail = $drow["D_email"];

    $drivupdate="UPDATE driver SET D_status = '0' WHERE D_email = '$driveremail'";
    // $s="UPDATE driver SET D_status = 1 WHERE  D_email='$Driver'";
	if($conn->query($sql)){
        
        $conn->query($drivupdate);
        header("location: booking.php");
    }else{
        echo $conn->error;
    }
}else{
    header("location: ../html/customerlog.html");
}	
?>



    