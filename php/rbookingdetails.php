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

	$sql = "SELECT * FROM vehicle WHERE R_email='$remail'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
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
					<li >
						<a href='renterdash.php'>
							<i class='bx bxs-dashboard' ></i>
							<span class='text' >MY VEHICLES</span>
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

					$sql = "SELECT * FROM vehicle WHERE V_booking_status='1'";
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
													<th>VEHICLE ID</th>
													<th>CUSTOMER EMAIL</th>
													<th>BOOKING DATE</th>
													<th>BOOKED FOR DATE</th>
													<th></th>
												</tr>
											</thead>
                                            
											<?php while ($row = $result->fetch_assoc()) { ?>
											<tbody>
                                            <?php 
                                            $V_id = $row["V_id"];
                                            $s = "SELECT * FROM booking WHERE V_id = '$V_id'";
                                            $res = $conn->query($s);
                                            $r = $res->fetch_assoc();
                                            ?>

											<?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $row["V_name"]);?>

												<tr>
												<td><img src='../img/<?php echo $row["V_name"] ?>.jfif' style='width:150px; height:100px;'></img></td>
													<td>
														<p style="font-weight: bold;"><?php echo $vname; ?></p>
													</td>
													<td id="V_id"><?php echo $r["V_id"] ?></td>
													
													<td><?php echo $r["C_email"]?></td>
													<td><?php echo $r["B_date"] ?></td>
													
													<?php
													if ($row["V_booking_status"] == 0) {
														$booking = "pending";
														$bookingstatus = "available";
													} else {
														$booking = "completed";
														$bookingstatus = "Booked";
													}
													?>
													<td><span class="status <?php echo $booking ?>"><?php echo $bookingstatus ?></span></td>

													<?php

													$name = $row["V_id"];

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
<?php 
} else {
	header("location: ../html/RenterLogin.html");
} ?>