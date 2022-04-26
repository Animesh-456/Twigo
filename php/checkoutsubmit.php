<?php 
session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  $semail = $_SESSION["email"];
  //$spassword = $_SESSION["pass"];
  $V_id = $_SESSION["V_id"];


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


if (isset($_POST['submit']) && isset($_FILES['filename'])) {
	include "db.php";

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
				$sql = "UPDATE booking SET B_img_pay = '$new_img_name'
				        WHERE V_id='$V_id'";
				if($conn->query($sql)){
					echo "Inserted";
					header("location: booking.php");
				}else{
					echo $conn->error;
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