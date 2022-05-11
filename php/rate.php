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
					<li>
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
					<li class='active'>
						<a href='rate.php'>

							<i class='bx bx-rupee' style="color: #ee0000;"></i>
							<span class='text' style="color: #ee0000;">RATES</span>
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
					<!-- <i class='bx bx-menu'></i>
					<a href='#' class='nav-link'>Categories</a> -->
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
				<!-- NAVBAR -->

				<!-- MAIN -->
				<main>
					<div class='head-title'>
						<div class='left'>
							<h1><?php echo $row["C_name"]; ?></h1>

						</div>
						<!-- <a href='#' class='btn-download'>
							<i class='bx bxs-cloud-download'></i>
							<span class='text'>Download PDF</span>
						</a> -->
					</div>
					<div class="table-data">
						<div class="order">
							<div class="head">
								<h3><span style="color: #ee0000;">CITY RIDE</span>  </h3>
								<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
							</div>
							<table>
								<thead>
									<tr>
										<th>HATCHBACK</th>
										<th>SEDAN</th>
										<th>SUV</th>
                                        <th>SEDAN EV</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<p>1-10km -> ₹80</p>
										</td>
										<td>1-10km -> ₹100</td>
										<td>1-10km -> ₹160</td>
                                        <td>1-10km -> ₹50</td>


									</tr>
									<tr>
										<td>
											<p>10-20km -> ₹200</p>
										<td>10-20km -> ₹250</td>
										<td>10-20km -> ₹300</td>
                                        <td>10-20km -> ₹180</td>
										</td>
									</tr>
									<tr>
										<td>
											<p>20-30km -> ₹380</p>
										<td>20-30km -> ₹400</td>
										<td>20-30km -> ₹500</td>
                                        <td>20-30km -> ₹320</td>
										</td>
									</tr>
								</tbody>
							</table>
                            
						</div>
                        
					</div>
                    <div class="table-data">
						<div class="order">
							<div class="head">
								<h3><span style="color: #ee0000;">LONG RIDE</span>  </h3>
								<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
							</div>
							<table>
								<thead>
									<tr>
										<th>HATCHBACK</th>
										<th>SEDAN</th>
										<th>SUV</th>
                                        <th>SEDAN EV</th>
									</tr>
								</thead>
								<tbody>
                                <tr>
										<td>
											<p>NON-AC -> 10/km</p>
										</td>
										<td>NON-AC -> 12/km</td>
                                        <td>NON-AC -> 17/km</td>
                                        <td>NON-AC -> 12/km</td>


									</tr>
									<tr>
										<td>
											<p>AC -> 11/km</p>
										<td>AC -> 13/km</td>
										<td>AC -> 18/km</td>
                                        <td>AC -> 13/km</td>
										</td>
									</tr>
								</tbody>
							</table>
                            
						</div>
                        
					</div>
                    <div class="table-data">
						<div class="order">
							<div class="head">
								<h3><span style="color: #ee0000;">SOLO RIDE</span>(NO OF DAYS x RATE)  </h3>
								<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
							</div>
							<table>
								<thead>
									<tr>
										<th>HATCHBACK</th>
										<th>SEDAN</th>
										<th>SUV</th>
                                        <th>SEDAN EV</th>
									</tr>
								</thead>
								<tbody>
                                <tr>
										<td>
											<p>1 DAY -> 3500</p>
										</td>
										<td>1 DAY -> 5000</td>
                                        <td>1 DAY -> 8000</td>
                                        <td>1 DAY -> 4000</td>
									</tr>
								</tbody>
							</table>
                            
						</div>
                        
					</div>
				</main>

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