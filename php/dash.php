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
							<i class='bx bxs-dashboard' style="color: #ee0000;"></i>
							<span class='text' style="color: #ee0000;">HOME</span>
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
					<a href='#' class='nav-link'>Categories</a>
					<form action='#'>
						<div class='form-input'>
							<input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button>
						</div>
					</form>

					<a href='profiledash.php' class='profile' id='prop'>

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
					while ($row = $result->fetch_assoc()) {
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
													<th>VEHICLE NAME</th>
													<th>VEHICLE ID</th>
													<th>VEHICLE RATING</th>
													<th>KM DRIVEN</th>
													<th>EMMISION TYPE</th>
													<th>RATE PER HOUR</th>
													<th>BOOKING STATUS</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<p style="font-weight: bold;"><?php echo $row["V_name"] ?></p>
													</td>
													<td><?php echo $row["V_id"] ?></td>
													<td>0</td>
													<td><?php echo $row["V_km_driven"] ?></td>
													<td><?php echo $row["V_emmision_type"] ?></td>
													<td><?php echo $row["V_rate-per_hour"] ?></td>
													<?php
													if ($row["V_booking_status"] == 0) {
														$booking = "pending";
														$bookingstatus = "available";
													} else {
														$booking = "completed";
														$bookingstatus = "unavailable";
													}
													?>
													<td><span class="status <?php echo $booking ?>"><?php echo $bookingstatus ?></span></td>
													<?php
													if ($row["V_booking_status"] == 0) {
														echo "<td>
															<form action='bookingform.php' method='POST'><input type='submit' name='' value='Book now'></input></form>
															</td>";
													}
													?>
												</tr>

											</tbody>
										</table>
									</div>

								</div>
							<?php } ?>
							<script src='../JS/dash.js'></script>
		</body>

		</html>
<?php }
} else {
	header("location: ../html/customerlog.html");
} ?>