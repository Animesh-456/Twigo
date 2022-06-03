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
	$sq = "SELECT * FROM booking WHERE C_email='$email' AND B_ridestatus=0";

	$result = $conn->query($sql);
	$res = $conn->query($sq);
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


				/* #sidebar .side-menu.top li.active a {
					color: red;
				} */
			</style>
			<!-- SIDEBAR -->

			<section id='sidebar'>
				<a href='#' class='brand'>
					<span class='text' id='twi' style='color: #000;'>Twi<span style='color: red;'>Go</span></span>
				</a>
				<ul class='side-menu top'>
					<li>
						<a href='dash.php'>
							<i class='bx bxs-dashboard'></i>
							<span class='text'>HOME (All cars)</span>
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

					<li >
						<a href='booking.php'>
							<i class='bx bxs-shopping-bag-alt'></i>
							<span class='text' >BOOKINGS</span>
						</a>
					</li>

					<li>
						<a href='rate.php'>

							<i class='bx bx-rupee'></i>
							<span class='text'>RATES</span>
						</a>
					</li>

					<li class='active'>
						<a href='history.php'>
							<i class='bx bxs-doughnut-chart'  style="color: #ee0000;"></i>
							<span class='text'  style="color: #ee0000;">HISTORY</span>
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
			<section id='content'>
				<nav>
				<i class='bx bx-menu'></i>
					<!-- <i class='bx bx-menu'></i> -->
					<!-- <a href='#' class='nav-link'>Categories</a> -->
					<form action='#'>
						<div class='form-input'>
							<!-- <input type='search' placeholder='Search...'>
							<button type='submit' class='search-btn'><i class='bx bx-search'></i></button> -->
						</div>
					</form>
					<a href='profiledash.php' class='profile' id='prop'>
						<img src='../img/undraw_male_avatar_323b.svg'>

					</a>
				</nav>

				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["C_name"]; ?></h1>

						</div>

					</div>
					<div class='table-data'>
						<div class='order' id="booking">
							<div class='head'>
								<h3>Recent Orders</h3>
								<i class='bx bx-search'></i>
								<i class='bx bx-filter'></i>
							</div>
							<table>
								<thead>
									<tr>

										<th>Vehicle Name</th>

										<th>Vehicle ID</th>
										<th>Booking Date</th>
										<th>Payment status</th>
										<th>Driver name</th>
										<th>Driver Contact</th>
										<th>Vehicle Address</th>
										<th>Ride Status</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($r = $res->fetch_assoc()) { ?>
										<tr>

											<?php
											$s = "SELECT * FROM vehicle WHERE V_id='$r[V_id]'";
											$ro = $conn->query($s);
											$po = $ro->fetch_assoc()
											?>
											<td><?php echo $po["V_name"] ?></td>

											<td>
												<p><?php echo $r["V_id"] ?></p>
											</td>
											<td><?php echo $r["B_date"] ?></td>
											<?php
											$pay = $r["B_img_pay"];

											if ($pay != "") {
												$pstat = "pending";
												$wr = "completed";
											} else {
												$pstat = "completed";
												$wr = "pending";
											} ?>
											<td><span class='status <?php echo $pstat ?>'><?php echo $wr ?></span></td>
											<td>
												<?php
												$demail = $r["D_email"];
												$d = "SELECT * FROM driver WHERE D_email='$demail'";
												$rd = $conn->query($d);

												if ($rd->num_rows > 0) {
													$pd = $rd->fetch_assoc();
													echo $pd["D_name"];
												} else {
													echo "No driver for Solo Ride";
												}

												?>
											</td>
											<td><?php $driversql = "SELECT D_contact FROM driver WHERE D_email='$r[D_email]'";
												$driverres = $conn->query($driversql);


												if ($driverres->num_rows > 0) {
													$drivrow = $driverres->fetch_assoc();
													echo $drivrow["D_contact"];
												} else {
													echo "No Driver";
												}
												?></td>
											<td><?php echo $po["V_address"]; ?></td>
											<td><span class='status pending'>complete</span></td>

										</tr>
									<?php } ?>
									<script src='../JS/dash.js'></script>
		</body>

		</html>
<?php }
} else {
	header("location: ../html/customerlog.html");
} ?>