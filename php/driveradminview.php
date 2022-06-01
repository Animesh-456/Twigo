<?php
session_start();
if ($_SESSION["aemail"]) {
	include '../php/db.php';

	//$aemail = $_SESSION["aemail"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    
     $dem = $_POST["d"];
    

	$sql = "SELECT * FROM driver WHERE D_email='$dem'";
	$result = $conn->query($sql);
	//$row = $result->fetch_assoc();
	while($row = $result->fetch_assoc()) {
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
        <h3><?php echo $row["D_email"]?></h3>
        <h1><?php echo $row["D_name"]?></h1>
        <ul>
          <li>Adhar number - <?php echo $row["D_adhar"]?></li>
          <li>License number - <?php echo $row["D_lisence"]?></li>
          <li>Dob - <?php echo $row["D_dob"]?></li>
          <li>Contact number - <?php echo $row["D_contact"]?></li>
          <li>Gender - <?php echo $row["D_gender"]?></li>
          <li>City - <?php echo $row["D_city"]?></li>
          <li>Address - <?php echo $row["D_address"]?></li>
        </ul>
      </div>
      <br>
      <br>
      <a class="btn_primary" href='driveradmindetails.php'>GO BACK</a>
    </div>
  </div>
</body>
</html>
<?php }

    }else{
        header("location: ../html/adminlog.html");
    }?>