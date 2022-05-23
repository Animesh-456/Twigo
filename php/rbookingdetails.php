<?php
session_start();
if ($_SESSION["remail"]) {
	include '../php/db.php';

	$remail = $_SESSION["remail"];
	$rname = $_SESSION["R_name"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM booking WHERE R_email='$remail'";
	$result = $conn->query($sql);
	// $row = $result->fetch_assoc();

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

		<title>TwiGo Renter Dashboard</title>
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
		</style>
		<!-- SIDEBAR -->

		<section id='sidebar'>
			<a href='#' class='brand'>
				<span class='text' id='twi' style='color: #000;'>Twi<span style='color: red;'>Go</span></span>
			</a>
			<ul class='side-menu top'>
				<li>
					<a href='renterdash.php'>
						<i class='bx bxs-dashboard'></i>
						<span class='text'>MY VEHICLES</span>
					</a>
				</li>
				<li class='active'>
					<a href=''>
						<i class='bx bxs-shopping-bag-alt' style="color: #ee0000;"></i>
						<span class='text' style="color: #ee0000;">BOOKING DETAILS</span>
					</a>
				</li>
				<!-- <li>
						<a href=''>
							<i class='bx bxs-doughnut-chart'></i>
							<span class='text'>HISTORY</span>
						</a>
					</li> -->
				<li>
					<a href='renterprofiledash.php'>
						<i class='bx bxs-message-dots'></i>
						<span class='text'>MY PROFILE</span>
					</a>
				</li>

			</ul>
			<ul class='side-menu'>
				<li>
					<a href='rhelpcenter.php'>
						<i class='bx bxs-cog'></i>
						<span class='text'>HELP CENTER</span>
					</a>
				</li>
				<li>
					<a href='logout.php' class='logout'>
						<i class='bx bxs-log-out-circle' style="color: #ee0000;"></i>
						<span class='text' style="color: #ee0000;">Logout</span>
					</a>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->

		<!-- CONTENT -->
		<section id='content'>
			<!-- NAVBAR -->
			<nav>
				<!-- <i class='bx bx-menu'></i>
					<a href='#' class='nav-link'>Categories</a> -->
				<form action='#'>
					<div class='form-input'>
						<!-- <input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button> -->
					</div>
				</form>

				<a href='renterprofiledash.php' class='profile' id='prop'>

					<img src='../img/undraw_male_avatar_323b.svg'>

				</a>
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<div class='head-title'>
					<div class='left'>
						<h1><?php
							echo $rname; ?></h1>

					</div>

				</div>
				<?php

				?>
				<div class='table-data'>
					<div class='order' id="booking">
						<div class='head'>
						</div>
						<div class="table-data">
							<div class="order">
								<div class="head">
									<h3></h3>
								</div>
								<table>
									<thead>
										<tr>
											
											
											<th>VEHICLE ID</th>
											<th>CUSTOMER NAME</th>
											<th>BOOKED FOR DATE</th>
											<th></th>
										</tr>
									</thead>

									
										<tbody>
											<?php while($row = $result->fetch_assoc()){?>
											<tr>
												

												<td id="V_id"><?php echo $row["V_id"] ?></td>

												<td><?php $cemail =  $row["C_email"];
												$csq = "SELECT * FROM customer WHERE C_email='$cemail'";
												$cr = $conn->query($csq);
												$cres = $cr->fetch_assoc();
												echo $cres["C_name"];
												?></td>
												<td><?php echo $row["B_date"] ?></td>

												
												<?php

												$name = $row["V_id"];
												?>
											</tr>
											<?php } ?>
										</tbody>
										<!-- <form action='bookingform.php' method='POST'>
												<input type='submit' value='Submit' id='btn' class='button'>
											</form> -->

								</table>
								<script src='../JS/dash.js'></script>
	</body>


	</html>
<?php
} else {
	header("location: ../html/RenterLogin.html");
} ?>