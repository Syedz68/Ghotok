<!DOCTYPE html>
<html>
<?php
session_start();
$ID = $_SESSION['id'];
$gender = $_SESSION['gender'];
$g = "";
if ($gender == "Male") {
	$g = "Female";
} else if ($gender == "Female") {
	$g = "Male";
}
if ($ID == true) {
} else {
	header("Location: index.php");
}
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ghotok</title>
	<link rel="stylesheet" type="text/css" href="../css/styletwo.css">
	<link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../icon/favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
	<style type="text/css">
		#people>nav>ul>li.page-item.active>a {
			background-color: black;
		}

		#people>nav>ul>li:nth-child(n):hover>a {
			color: black;
		}

		.pagination a {
			color: black;
		}
	</style>
</head>

<body>
	<section id="header">
		<div>
			<ul id="navbar">
				<li><a class="active" href="main.php">Available People</a></li>
				<li><a href="profile.php"> My Profile </a></li>
				<li><a href="contact.php"> Contact Us </a></li>
				<li><a href="package.php"> Upgrade</a> </li>
				<li><a href="userLogout.php"> Logout </a></li>
			</ul>
		</div>
	</section>

	<!--<section id="people" class="pad">-->

	<div class="container py-5">
		<div class="row mt-2">
			<?php
			require 'connection.php';
			$query = "SELECT * FROM userdata WHERE id!=$ID and gender = '$g'";
			$query_run = mysqli_query($conn, $query);
			$check_pep = mysqli_num_rows($query_run);
			if ($check_pep > 0) {
				while ($row = mysqli_fetch_array($query_run)) {
			?>
					<!-- <div class="col md-6">
						<div class="card" id="card-lists">
							<div class="card-body">
								<img src="../<?php echo $row['pic']; ?>" class="card-img-top" alt="">
								<h2 class="card-title"> <?php echo $row['name']; ?> </h2><br>
								<h4 class="card-title"> <?php echo $row['religion']; ?> </h4>
								<p class="card-text">
									Height: <?php echo $row['height']; ?><br>
									Age: <?php echo $row['age']; ?><br>
									Area: <?php echo $row['pdiv']; ?><br>
								</p>
								<button> <a href="package.php"> View More!</a></button>
							</div>
						</div>
					</div> -->

					<section id="people" class="pad">
						<div class="pep-container">
							<div class="pep">
								<img src="../<?php echo $row['pic']; ?>" class="card-img-top" alt="">
								<div class="des">
									<h2 class="card-title"> <?php echo $row['name']; ?> </h2><br>
									<h4 class="card-title"> <?php echo $row['religion']; ?> </h4>
									<p class="card-text">
										Height: <?php echo $row['height']; ?><br>
										Age: <?php echo $row['age']; ?><br>
										Area: <?php echo $row['pdiv']; ?><br>
									</p>
									<button class="btn btn-danger"> <a style="text-decoration: none; color: #1a1a1a;" href="package.php"> View More!</a></button>
								</div>
							</div>
						</div>
					</section>

			<?php
				}
			} else {
				echo "No People!";
			}

			?>
		</div>
		<script src="test.js"></script>
	</div>
	<!--</section>-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>