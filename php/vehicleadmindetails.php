<?php
session_start();
if ($_SESSION["aemail"]) {
	include '../php/db.php';

	$aemail = $_SESSION["aemail"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM adm WHERE A_email='$aemail'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($row) {
		$_SESSION["A_name"] = $row["A_name"];
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

			<title>TwiGo Admin</title>
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
						<a href='admindash.php'>
							<i class='bx bxs-car'></i>
							<span class='text'>BOOKING DETAILS</span>
						</a>
					</li>

					<!-- <li>
						<a href=''>
							<i class='bx bxs-doughnut-chart'></i>
							<span class='text'>HISTORY</span>
						</a>
					</li> -->
					<li>
						<a href='admincustomerdetails.php'>
							<i class='bx bx-body'></i>
							<span class='text'>CUSTOMER DETAILS</span>
						</a>
					</li>

					<li>
						<a href='driveradmindetails.php'>
							<i class='bx bxs-car'></i>
							<span class='text'>DRIVER DETAILS</span>
						</a>
					</li>

					<li>
						<a href='renteradminetails.php'>
							<i class='bx bx-body'></i>
							<span class='text'>RENTER DETAILS</span>
						</a>
					</li>

					<li class='active'>
						<a href='vehicleadmindetails.php'>
							<i class='bx bxs-car' style="color: #ee0000;"></i>
							<span class='text' style="color: #ee0000;">VEHICLE DETAILS</span>
						</a>
					</li>
				</ul>
				<ul class='side-menu'>

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
					<!-- <i class='bx bx-menu'></i>
					<a href='#' class='nav-link'>Categories</a> -->
					<form action='#'>
						<div class='form-input'>
							<!-- <input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button> -->
						</div>
					</form>
				</nav>
				<!-- NAVBAR -->

				<!-- MAIN -->
				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["A_design."]; ?></h1>

						</div>

					</div>
					<?php

					$bsql = "SELECT * FROM vehicle";
					$bresult = $conn->query($bsql);

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
												<th>VEHICLE ID</th>
												<th>VEHICLE NAME</th>
												<th>VEHICLE ADDRESS</th>

												<th></th>


												<th></th>
											</tr>
										</thead>
										<?php while ($brow = $bresult->fetch_assoc()) { ?>
											<tbody>

												<tr>
													<?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $brow["V_name"]); ?>
													<?php
													$V_name = $brow["V_name"];
													?>
													<td><img src='../img/<?php echo "$V_name.jfif"; ?>' style='width:200px; height:100px;'></img></td>
													<td>
														<p style="font-weight: bold;"><?php echo $brow["V_id"]; ?></p>
													</td>
													<td id="V_id"><?php echo $vname ?></td>

													<td><?php echo $brow["V_address"] ?></td>

													<?php

													$name = $brow["V_id"];
													echo "
														<form action='vehicleadmindetailsview.php' method='POST'>
														<td style='display: none;'><label for='B_id'>V_id</label>
														<input type='text' id='B_id' name='V_id' value='$name' readonly>
													</td>
														<td>
														<input type='submit' name='val' value='View Details' id='btn' class='button'>
														</td>
													</form>";


													//$name = $row["V_id"];


													// echo "
													// 	<form action='cardetails.php' method='POST'>
													// 	<td style='display: none;'><label for='V_id'>V_id</label>
													// 	<input type='text' id='V_id' name='V_id' value='$name' readonly>
													// </td>
													// 	<td>

													// 	<input type='submit' name='val' value='View Details' id='btn' class='button'>
													// 	</td>
													// </form>";
													//$_SESSION["V_id"] = '<script>document.write(veh_id)</script>';

													?>
												</tr>
											<?php
										} ?>


											</tbody>
											<!-- <form action='bookingform.php' method='POST'>
												<input type='submit' value='Submit' id='btn' class='button'>
											</form> -->

									</table>
									<script src='../JS/dash.js'></script>
		</body>


		</html>
<?php } else {
		echo "No data";
	}
} else {
	header("location: ../html/adminlog.html");
} ?>