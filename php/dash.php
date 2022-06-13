<?php
session_start();
if ($_SESSION["loggedin"]) {
	include '../php/db.php';

	$semail = $_SESSION["email"];
	//$spassword = $_SESSION["pass"];


	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM customer WHERE C_email='$semail'";
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
							<span class='text' style="color: #ee0000;">HOME (All cars)</span>
						</a>
					</li>
					<li>
						<a href='suv.php'>
							<i class='bx bxs-car'></i>
							<span class='text'>SUV</span>
						</a>
					</li>
					<li>
						<a href='sedan.php'>
							<i class='bx bxs-car'></i>
							<span class='text'>SEDAN</span>
						</a>
					</li>
					<li>
						<a href='hatchback.php'>
							<i class='bx bxs-car'></i>
							<span class='text'>HATCHBACK</span>
						</a>
					</li>
					<li>
						<a href='booking.php'>
							<i class='bx bxs-shopping-bag-alt'></i>
							<span class='text'>BOOKINGS</span>
						</a>
					</li>
					<li>
						<a href='rate.php'>

							<i class='bx bx-rupee'></i>
							<span class='text'>RATES</span>
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
						<a href='givereview.php' class='logout'>
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

					</div>

					<?php

					$sql = "SELECT * FROM vehicle WHERE V_city='$row[C_city]'";
					$result = $conn->query($sql);

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
												<th>VEHICLE IMAGE</th>
												<th>VEHICLE NAME</th>
												<th>EMMISION TYPE</th>
												<th>RENTER NAME</th>

												<th></th>
											</tr>
										</thead>
										<tbody>

											<?php while ($row = $result->fetch_assoc()) { ?>
												<tr>
													<?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $row["V_name"]); ?>
													<?php
													$V_name = $row["V_name"];
													?>
													<td><img src='../img/<?php echo "$V_name.jfif"; ?>' style='width:200px; height:100px;'></img></td>

													<td>
														<p style="font-weight: bold;"><?php echo $vname; ?></p>
													</td>

													<td><?php echo $row["V_emmision_type"] ?></td>
													<td><?php $rsql = "SELECT R_name FROM renter WHERE R_email='$row[R_email]'";
														$rresult = $conn->query($rsql); 
														$rrow =  $rresult->fetch_assoc();
														echo $rrow["R_name"]?></td>
													<?php

													$name = $row["V_id"];

													echo "
														<form action='rtype.php' method='POST'>
														<td style='display: none;'><label for='V_id'>V_id</label>
														<input type='text' id='V_id' name='V_id' value='$name' readonly>
													</td>
														<td>
														
														<input type='submit' name='val' value='Book now' id='btn' class='button'>
														</td>
														
													</form>";
													echo "
														<form action='dashview.php' method='POST'>
														<td style='display: none;'><label for='V_id'>V_id</label>
														<input type='text' id='V_id' name='vid' value='$name' readonly>
													</td>
														<td>
														
														<input type='submit' name='val' value='View Details' id='btn' class='button'>
														</td>
														
													</form>";

													//$_SESSION["V_id"] = '<script>document.write(veh_id)</script>';

													?>
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
		header("location: ../html/customerlog.html");
	}
} else {
	header("location: ../html/customerlog.html");
} ?>