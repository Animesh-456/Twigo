<?php
session_start();
if ($_SESSION["dloggedin"]) {
	include '../php/db.php';

	$demail = $_SESSION["demail"];



	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM driver WHERE D_email='$demail'";
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

			<title>TwiGo Driver Dashboard</title>
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
					<li class='active'>
						<a href='driverdash.php'>
							<i class='bx bxs-dashboard' style="color: #ee0000;"></i>
							<span class='text' style="color: #ee0000;">YOUR BOOKINGS</span>
						</a>
					</li>
					<li>
						<a href='driverhistory.php'>	
							<i class='bx bxs-doughnut-chart'></i>
							<span class='text'>HISTORY</span>
						</a>
					</li>
					<li>
						<a href='driverprofile.php'>
							<i class='bx bxs-message-dots'></i>
							<span class='text'>MY PROFILE</span>
						</a>
					</li>

				</ul>
				<ul class='side-menu'>
					<li>
						<a href='driverhelpcenter.php'>
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
					<i class='bx bx-menu'></i>
					<!-- <a href='#' class='nav-link'>Categories</a> -->
					<!-- <h1>Book for</h1> -->
					<form action='#'>
						<div class='form-input'>

							<!-- <button type='submit' class='search-btn'><i class='bx bx-search'></i></button> -->
						</div>
					</form>

					<a href='driverprofile.php' class='profile' id='prop'>

						<img src='../img/undraw_male_avatar_323b.svg'>

					</a>
				</nav>
				<!-- NAVBAR -->

				<!-- MAIN -->
				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["D_name"]; ?></h1>

						</div>

					</div>

					<?php

					$bsql = "SELECT * FROM booking WHERE D_email = '$demail' AND B_ridestatus=0";
					$bresult = $conn->query($bsql);
					?>
					<div class='table-data'>
						<div class='order' id="booking">
							<div class='head'>
							</div>
							<div class="table-data">
								<div class="order">
									<div class="head">
										<h3>Booking Details</h3>
									</div>
									<table>
										<thead>
											<tr>
												
												<th>BOOKING_ID</th>
												<th>BOOKING DATE</th>
												<th>VEH. NUMBER</th>
												<th>VEH. ADDRESS</th>
												<th>CUSTOMER NAME</th>
												<th>CUSTOMER CONTACT</th>
												<th>PICKUP ADDRESS</th>
												<th>DROP ADDRESS</th>
												<th>RENTER CONTACT</th>
												<th></th>
											</tr>
										</thead>
										<tbody>

											<?php while ($brow = $bresult->fetch_assoc()) {
												$V_id = $brow["V_id"];
												$vsql = "SELECT * FROM vehicle WHERE V_id='$V_id'";
												$vresult = $conn->query($vsql);
												$vrow = $vresult->fetch_assoc();


											?>
												<tr>
													<?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $vrow["V_name"]); ?>
													<?php
													$V_name = $vrow["V_name"];
													?>
													<!-- <td><img src='../img/<?php echo "$V_name.jfif"; ?>' style='width:200px; height:100px;'></img></td> -->
													
													<!-- <td>
														<p style="font-weight: bold;"><?php echo $vname; ?></p>
													</td> -->
													<td><?php echo $brow["B_id"]?></td>
													<td><?php echo $brow["B_date"]?></td>
													<td><?php echo $vrow["V_no"] ?></td>
													<td><?php echo $vrow["V_address"] ?></td>
													<td><?php
														$csql = "SELECT * FROM customer WHERE C_email = '$brow[C_email]'";
														$cresult = $conn->query($csql);
														while ($crow = $cresult->fetch_assoc()) {
															echo $crow["C_name"];

														?></td>
													<td><?php
															echo $crow["C_contact"];
														}
														?></td>
													<td><?php echo $brow["B_pickup_address"] ?></td>
													<td><?php echo $brow["B_drop_address"] ?></td>
													<td><?php $rsql = "SELECT * FROM renter WHERE R_email = '$brow[R_email]'";
														$rresult = $conn->query($rsql); 
														while ($rrow = $rresult->fetch_assoc()) {
															echo $rrow["R_contact"];
														}
														?></td>

												</tr>
											<?php } ?>

										</tbody>
										<!-- <form action='bookingform.php' method='POST'>
												<input type='submit' value='Submit' id='btn' class='button'>
											</form> -->

									</table>

								</div>

							</div>

							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
							<script src='../JS/dash.js'></script>

		</body>


		</html>
<?php } else {
		header("location: ../html/driverLogin.html");
	}
} else {
	header("location: ../html/customerlog.html");
} ?>