<?php
session_start();
if ($_SESSION["loggedin"]) {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vehicle_rent";

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
			</style>
			<!-- SIDEBAR -->
			<section id='sidebar'>
				<a href='#' class='brand'>
					<span class='text' id='twi' style='color: #000;'>Twi<span style='color: red;'>Go</span></span>
				</a>
				<ul class='side-menu top'>
					<li class='active'>
						<a href='#'>
							<i class='bx bxs-dashboard' style="color: red;"></i>
							<span class='text' style="color: red;">HOME</span>
						</a>
					</li>
					<li>
						<a href='#'>
							<i class='bx bxs-shopping-bag-alt' style="color: red;"></i>
							<span class='text' style="color: red;">BOOKINGS</span>
						</a>
					</li>
					<li>
						<a href='#'>
							<i class='bx bxs-doughnut-chart' style="color: red;"></i>
							<span class='text' style="color: red;">HISTORY</span>
						</a>
					</li>
					<li>
						<a href='#'>
							<i class='bx bxs-message-dots' style="color: red;"></i>
							<span class='text' style="color: red;">TRANSACTIONS</span>
						</a>
					</li>

				</ul>
				<ul class='side-menu'>
					<li>
						<a href='helpdash.html'>
							<i class='bx bxs-cog'></i>
							<span class='text'>HELP CENTER</span>
						</a>
					</li>
					<li>
						<a href='logout.php' class='logout'>
							<i class='bx bxs-log-out-circle' style="color: red;"></i>
							<span class='text' style="color: red;">Logout</span>
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
					<a href='profiledash.html' class='profile' id='prop'>
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

					<!-- <ul class='box-info'>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class='text'>
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class='text'>
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class='text'>
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul> -->

					<div class='table-data'>
						<div class='order'>
							<div class='head'>
								<h3>Recent Orders</h3>
								<i class='bx bx-search'></i>
								<i class='bx bx-filter'></i>
							</div>
							<table>
								<thead>
									<tr>
										<th>User</th>
										<th>Date Order</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<!-- <img src=''> -->
											<p>John Doe</p>
										</td>
										<td>01-10-2021</td>
										<td><span class='status completed'>Completed</span></td>
									</tr>
									<!-- <tr>
								<td>
									<img src='img/people.png'>
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class='status pending'>Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src='img/people.png'>
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class='status process'>Process</span></td>
							</tr>
							<tr>
								<td>
									<img src='img/people.png'>
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class='status pending'>Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src='img/people.png'>
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class='status completed'>Completed</span></td>
							</tr> -->
								</tbody>
							</table>
						</div>
						<!-- <div class='todo'>
					<div class='head'>
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class='todo-list'>
						<li class='completed'>
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class='completed'>
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class='not-completed'>
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class='completed'>
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class='not-completed'>
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div> -->
					</div>
				</main>
				<!-- MAIN -->
			</section>
			<!-- CONTENT -->


			<script src='../JS/dash.js'></script>
		</body>

		</html>
<?php }
} else {
	header("location: ../html/customerlog.html");
} ?>