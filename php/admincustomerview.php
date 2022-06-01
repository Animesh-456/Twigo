<?php
session_start();
if ($_SESSION["aemail"]) {
	include '../php/db.php';

	//$aemail = $_SESSION["aemail"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    
     $cem = $_POST["c"];
    

	$sql = "SELECT * FROM customer WHERE C_email='$cem'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($row) {
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
        <h3><?php echo $row["C_email"]?></h3>
        <h1><?php echo $row["C_name"]?></h1>
        <ul>
          <li>Adhar number - <?php echo $row["C_adhar_id"]?></li>
          <li>License number - <?php echo $row["C_lisence_no"]?></li>
          <li>Dob - <?php echo $row["C_dob"]?></li>
          <li>Contact number - <?php echo $row["C_contact"]?></li>
          <li>Gender - <?php echo $row["C_gender"]?></li>
          <li>City - <?php echo $row["C_city"]?></li>
          <li>Address - <?php echo $row["C_address"]?></li>
        </ul>
      </div>
      <br>
      <br>
      <a class="btn_primary" href='admincustomerdetails.php'>GO BACK</a>
    </div>
  </div>
</body>
</html>



<?php } else {
		echo "No data";
	}
} else {
	header("location: ../html/adminlog.html");
} ?>