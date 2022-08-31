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
	<link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../icon/favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>

<body>
	<section id="header">
		<div>
			<ul id="navbar">
				<li><a href="main.php"> Available People </a></li>
				<li><a class="active" href="profile.php"> My Profile </a></li>
				<li><a href="contact.php"> Contact Us </a></li>
				<li><a href="package.php"> Upgrade </a></li>
				<li><a href="userLogout.php"> Logout </a></li>
			</ul>
		</div>
	</section>

	<section class="container prof my-2 pt-2">
		<div class="row mt-5">
			<?php
			require 'connection.php';
			$sql = "SELECT * FROM userdata WHERE id='$ID'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result) > 0;
			if ($resultCheck) {
				while ($row = mysqli_fetch_array($result)) {
			?>
					<div class="col-lg-4 col-md-12 col-12">
						<img class="img-fluid w-100 pd-1" src="../<?php echo $row['pic']; ?>">
						<div class="bio" style="text-align: justify;"><?php echo $row['bio']; ?></div>
						<div class="but-group pt-2">
							<button>Upload Photo</button>
							<button> <a href="update.php"> Edit Profile </a> </button>
						</div>
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<div class="row">
							<h1><?php echo $row['name']; ?></h1><br><br><br><br>
						</div>
						<div class="row" style="font-size: 18px;">
							<h4>Personal Details : </h4>
							<div class="col md-6" style="margin-left: 5%;">
								<table class="table table-hover">
									<tr>
										<th width="50%" style="text-align:end;"> Date of Birth: </th>
										<td> <?php echo $row['dob']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Gender: </th>
										<td> <?php echo $row['gender']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Height: </th>
										<td> <?php echo $row['height']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Religion: </th>
										<td> <?php echo $row['religion']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Cast: </th>
										<td> <?php echo $row['cast']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Nationality: </th>
										<td> <?php echo $row['nation']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Marital Status: </th>
										<td> <?php echo $row['mstat']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Family Status & Type: </th>
										<td> <?php echo $row['fstat'];
												echo ' & ';
												echo $row['ftype']; ?> </td>
									</tr>

									<tr>
										<th width="50%" style="text-align:end;"> Contact No.: </th>
										<td> <?php echo $row['phone']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Email: </th>
										<td> <?php echo $row['email']; ?> </td>
									</tr>
								</table><br><br>
							</div>
							<div class="col md-6" style="margin-left: 2%;">
								<h4>Proffessional Details : </h4>
								<table class="table table-hover">
									<tr>
										<th width="50%" style="text-align:end;"> Highest Education: </th>
										<td> <?php echo $row['edu']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Employment Status: </th>
										<td> <?php echo $row['emp']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Occupation: </th>
										<td> <?php echo $row['ocu']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> CV/Resume: </th>
										<td> N/A </td>
									</tr>
								</table><br><br>
							</div>
						</div>
						<div class="row" style="font-size: 18px;">
							<div class="col md-6" style="margin-left: 5%;">
								<h4>Permanent Address : </h4>
								<table class="table table-hover">
									<tr>
										<th width="50%" style="text-align:end;"> Division: </th>
										<td> <?php echo $row['pdiv']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> District: </th>
										<td> <?php echo $row['pdis']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Upazilla/Thana: </th>
										<td> <?php echo $row['pthana']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Post Office: </th>
										<td> <?php echo $row['ppost']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Zip Code: </th>
										<td> <?php echo $row['pzip']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Road No.: </th>
										<td> <?php echo $row['prd']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Area: </th>
										<td> <?php echo $row['parea']; ?> </td>
									</tr>
								</table><br><br>
							</div>
							<div class="col md-6" style="margin-left: 2%;">
								<h4>Present Address : </h4>
								<table class="table table-hover">
									<tr>
										<th width="50%" style="text-align:end;"> Division: </th>
										<td> <?php echo $row['ldiv']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> District: </th>
										<td> <?php echo $row['ldis']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Upazilla/Thana: </th>
										<td> <?php echo $row['lthana']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Post Office: </th>
										<td> <?php echo $row['lpost']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Zip Code: </th>
										<td> <?php echo $row['lzip']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Road No.: </th>
										<td> <?php echo $row['lrd']; ?> </td>
									</tr>
									<tr>
										<th width="50%" style="text-align:end;"> Area: </th>
										<td> <?php echo $row['larea']; ?> </td>
									</tr>
								</table>
							</div>
						</div>
				<?php
				}
			}
				?>

					</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>