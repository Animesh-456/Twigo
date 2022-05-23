<?php 
session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  $semail = $_SESSION["email"];
  
  $V_id = $_SESSION["V_id"];
  
  $bid = $_SESSION["bookingid"];
  


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $rent = "SELECT * FROM VEHICLE WHERE V_id = '$V_id' ";
  $rentresult = $conn->query($rent);
  $rentres = $rentresult->fetch_assoc(); 

  $renteremail = $rentres["R_email"];


if (isset($_POST['submit']) && isset($_FILES['filename'])) {
	
	$dn = $_POST["dn"];
	echo "<pre>";
	print_r($_FILES['filename']);
	echo "</pre>";

	$img_name = $_FILES['filename']['name'];
	$img_size = $_FILES['filename']['size'];
	$tmp_name = $_FILES['filename']['tmp_name'];
	$error = $_FILES['filename']['error'];

	if ($error === 0) {
		if ($img_size > 525000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "pdf"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE booking SET B_img_pay = '$new_img_name', D_email='$dn', R_email = '$renteremail'
				        WHERE B_id='$bid'";
						$s="UPDATE driver SET D_status = 1 WHERE  D_email='$dn'";
						$cans = "SELECT * FROM driver WHERE D_status=0";
						$drivresult = $conn->query($cans);
    					$drow = $drivresult->fetch_assoc();
				if($conn->query($sql) && $drow!=null){
					$conn->query($s);
					echo "Inserted";
					header("location: booking.php");
				}else{
					$cancelbooking = "DELETE FROM booking WHERE V_id='$V_id'";
					$conn->query($cancelbooking);
					header("location: ../php/booking.php");
				}
				// header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}
}else {
	header("Location: checkout.php");
}
}else{
    header("location: ../html/customerlog.html");
}