<!DOCTYPE html>
<html>
<?php
session_start();
$ID = $_SESSION['id'];
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
	<link rel="stylesheet" type="text/css" href="../css/stylethree.css">
	<link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../icon/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/stylefour.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<section id="header">
		<div>
			<ul id="navbar">
				<li><a href="main.php">Available People</a></li>
				<li><a href="profile.php">My Profile</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a class="active" href="package.php">Upgrade</a></li>
				<li><a href="userLogout.php"> Logout </a></li>
			</ul>
		</div>
	</section>
	<section id="price">
		<h1 id="title">Choose Your Plan</h1>
		<div class="wrapper">
			<div class="single-price">
				<h1>Basic</h1>
				<div class="price">
					<h2>199<sub>BDT</sub></h2>
				</div>
				<div class="deals">
					<h5>More personal details</h5>
					<h5>Contact number</h5>
					<h5>Address details</h5>
					<h5>Upto 2 photoes from gallery</h5><br>
					<h3>Duration One Month</h3>
				</div>
				<button>Select</button>
			</div>
			<div class="single-price">
				<h1>Standard</h1>
				<div class="price">
					<h2>499<sub>BDT</sub></h2>
				</div>
				<div class="deals">
					<h5>More personal details</h5>
					<h5>Contact number</h5>
					<h5>Address details</h5>
					<h5>Upto 5 photoes from gallery</h5><br>
					<h3>Duration Six Month</h3>
				</div>
				<button>Select</button>
			</div>
			<div class="single-price">
				<h1>Premium</h1>
				<div class="price">
					<h2>999<sub>BDT</sub></h2>
				</div>
				<div class="deals">
					<h5>More personal details</h5>
					<h5>Contact number</h5>
					<h5>Address details</h5>
					<h5>Full access to gallery</h5>
					<h5>Conversation facility</h5>
					<h3>Duration One Year</h3>
				</div>
				<button>Select</button>
			</div>

		</div>
	</section>

</body>

</html>