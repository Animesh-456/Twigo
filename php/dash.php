<?php
session_start();
if ($_SESSION["loggedin"]) {
	include '../php/db.php';

	$email = $_SESSION["email"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM customer WHERE C_email='$email'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($row) {
?>

		<!DOCTYPE html>
		<html lang='en'>

		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>

			<!-- Boxicons -->
			<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
			<!-- My CSS -->
			<link href='../CSS/dash.css' rel='stylesheet'>
			<link rel='icon' type='image/x-icon' href='../img/fav.png'>

			<title>TwiGo Dashboard</title>
		</head>

		<body>
			<style>
				* {
					color: #000;
				}

				input[type=submit] {
					background-color: #ee0000;
					color: white;
					padding: 16px 20px;
					margin: 8px 0;
					border: none;
					cursor: pointer;
					width: 80%;
					display: inline-block;
					opacity: 0.9;
					border-radius: 30px;
				}

				
				#sidebar .side-menu.top li.active a {
	color: red;	
}
			
			</style>
			<!-- SIDEBAR -->
			
			<section id='sidebar'>
				<a href='#' class='brand'>
					<span class='text' id='twi' style='color: #000;'>Twi<span style='color: red;'>Go</span></span>
				</a>
				<ul class='side-menu top'>
					<li class='active'>
						<a href='dash.php'>
							<i class='bx bxs-dashboard'></i>
							<span class='text'>HOME</span>
						</a>
					</li>
					<li>
						<a href='booking.php'>
							<i class='bx bxs-shopping-bag-alt'></i>
							<span class='text'>BOOKINGS</span>
						</a>
					</li>
					<li>
						<a href='history.php'>
							<i class='bx bxs-doughnut-chart'></i>
							<span class='text'>HISTORY</span>
						</a>
					</li>
					<li>
						<a href='profiledash.php'>
							<i class='bx bxs-message-dots'></i>
							<span class='text'>MY PROFILE</span>
						</a>
					</li>

				</ul>
				<ul class='side-menu'>
					<li>
						<a href='helpdash.php'>
							<i class='bx bxs-cog'></i>
							<span class='text'>HELP CENTER</span>
						</a>
					</li>
					<li>
						<a href='logout.php' class='logout'>
							<i class='bx bxs-log-out-circle'></i>
							<span class='text'>Logout</span>
						</a>
					</li>
				</ul>
			</section>
			<!-- SIDEBAR -->

			<!-- CONTENT -->
			<section id='content'>
				<!-- NAVBAR -->
				<nav>
					<i class='bx bx-menu'></i>
					<a href='#' class='nav-link'>Categories</a>
					<form action='#'>
						<div class='form-input'>
							<input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button>
						</div>
					</form>
					<!-- <input type='checkbox' id='switch-mode' hidden> -->
					<!-- <label for='switch-mode' class='switch-mode'></label> -->
					<a href='profiledash.php' class='profile' id='prop'>
						<!-- <script>
					document.body.classList.add('dark');
				</script> -->
						<img src='../img/undraw_male_avatar_323b.svg'>

					</a>
				</nav>
				<!-- NAVBAR -->

				<!-- MAIN -->
				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["C_name"]; ?></h1>

						</div>
						<a href='#' class='btn-download'>
							<i class='bx bxs-cloud-download'></i>
							<span class='text'>Download PDF</span>
						</a>
					</div>

					<?php

					$sql = "SELECT * FROM vehicle";
					$result = $conn->query($sql);
					// $row = $result->fetch_assoc();
					// $total = mysqli_num_rows($row);
					while ($row = $result->fetch_assoc()) {
					?>
					<div id="home">

						<ul class='box-info'>
							<!-- <li>
							<i class='bx bxs-calendar-check'></i>
							<span class='text'>
								<h3>1020</h3>
								<p>New Order</p>
							</span>
						</li>
						<li>
							<i class='bx bxs-group'></i>
							<span class='text'>
								<h3>2834</h3>
								<p>Visitors</p>
							</span>
						</li> -->
							<li>
								<!-- <img src="https://www.hyundai.com/content/dam/hyundai/in/en/data/Proposed-homepage/Pc_1600x590.jpg"></img> -->
								<!-- <i class='bx bxs-dollar-circle' ></i> -->
								<span class='text'>
									<h3><?php echo $row["V_name"]; ?></h3>
									<img src="../img/fav.png"></img>
									<!-- <img class="veh_img" src="https://www.hyundai.com/content/dam/hyundai/in/en/data/Proposed-homepage/Pc_1600x590.jpg"></img> -->
									<hr><br>
									<h4>Vehicle ID: <?php echo $row["V_id"];?></h4>
									<br>
									<h4>Booking Status: <?php echo $row["V_booking_status"];?></h4>
									<br>
									<h4>Km Driven: <?php echo $row["V_km_driven"];?></h4>
									<br>
									<h4>Emmision type: <?php echo $row["V_emmision_type"];?></h4>
									<br>
									<h4>Rate per hour: <?php echo $row["V_rate-per_hour"];?></h4>
									<br>
									<form action="bookingform.php" method="POST">
									<input type="submit" name="book" value="Book now"></input>
									</form>
									</a>
								</span>
							</li>
						</ul>
						</div>
					<?php } ?>
			<script src='../JS/dash.js'></script>
		</body>

		</html>
<?php }
} else {
	header("location: ../html/customerlog.html");
} ?>