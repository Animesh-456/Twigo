<?php
session_start();
if ($_SESSION["aemail"]) {
	include '../php/db.php';

	//$aemail = $_SESSION["aemail"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    
     $rem = $_POST["r"];
    

	$sql = "SELECT * FROM renter WHERE R_email='$rem'";
	$result = $conn->query($sql);
	//$row = $result->fetch_assoc();
	while($row = $result->fetch_assoc()){
		//$_SESSION["A_name"] = $row["A_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twigo Admin</title>
    <link rel="stylesheet" href="../CSS/admincustomer.css">
    <link rel='icon' type='image/x-icon' href='../img/fav.png'>
</head>
<body>
  <div class="wrapper">
    <div class="blog_post">
      <div class="img_pod">
        <img src="../img/undraw_male_avatar_323b.svg" alt="random image">
      </div>
      <div class="container_copy">
        <h3><?php echo $row["R_email"]?></h3>
        <h1><?php echo $row["R_name"]?></h1>
        <ul>
          <li>Adhar number - <?php echo $row["R_aadhar_id"]?></li>
          <li>License number - <?php echo $row["R_lisence_no"]?></li>
          <li>Dob - <?php echo $row["R_DOB"]?></li>
          <li>Contact number - <?php echo $row["R_contact"]?></li>
          <li>Gender - <?php echo $row["R_gender"]?></li>
          <li>City - <?php echo $row["R_city"]?></li>
          <li>Address - <?php echo $row["R_address"]?></li>
          <li>A/C Number- <?php echo $row["R_acno"]?></li>
          <li>IFSC - <?php echo $row["R_ifsc"]?></li>
        </ul>
      </div>
      <br>
      <br>
      <br>
      <a class="btn_primary" href='renteradminetails.php'>GO BACK</a>
    </div>
  </div>
</body>
</html>
<?php }
    }else{
        header("location: ../html/adminlog.html");
    }?>