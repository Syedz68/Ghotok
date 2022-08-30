<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ghotok</title>
	<link rel="stylesheet" type="text/css" href="../css/styletwo.css">
	<link rel="stylesheet" type="text/css" href="../css/stylethree.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../icon/favicon.ico" type="image/x-icon">

</head>
<body>
<?php
session_start();
$ID = $_SESSION['id'];
if($ID == true){

}
else{
	header("Location: index.php");
}
$connect = new PDO("mysql:host=localhost;dbname=ghotok", "root", "");
$nameErr = $emailErr = "";
$name = $email = $prob = $story = "";
$n = $e = $p = $s = true;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["name"])) {
    	$nameErr = "Enter your name";
    	$n = false;
  	} else {
    	$name = test_input($_POST["name"]);
    	if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      		$nameErr = "Only letters and white space allowed";
      		$n = false;
    	}
  	}
  	if (empty($_POST["email"])) {
    	$emailErr = "Email is required";
    	$e = false;
  	} else {
    	$email = test_input($_POST["email"]);
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		$emailErr = "Invalid email format";
      		$e = false;
    	}
  	}
  	$prob = test_input($_POST["prob"]);
  	$story = test_input($_POST['story']);
  	
}
if(isset($_POST['email'])){
	if($n && $e){
		sleep(3);
		$que = "INSERT INTO message (name, email, prob, story) VALUES (:name, :email, :prob, :story)";
		$data = array(
			':name' => $name,
			':email' => $email,
			':prob' => $prob,
			':story' => $story

		);
		$state = $connect->prepare($que);
		if($state->execute($data)){
			echo "<script>alert('Message Sent Successfully!')</script>";
			$name = '';
			$email = '';
			$prob = '';
			$story = '';
		} else {
			echo "<script>alert('Oops! Something went wrong!')</script>";
		}
	} 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	<section id="header">
		<div>
			<ul id="navbar">
				<li><a href="main.php">Available People</a></li>
				<li><a href="profile.php">My Profile</a></li>
				<li><a class="active" href="contact.php">Contact Us</a></li>
				<li><a href="package.php">Upgrade</a></li>
				<li><a href="userLogout.php"> Logout </a></li>
			</ul>
		</div>
	</section>

	<section id="contact" class="container-fluid">
		<div class="row">
			<div class="col-md-6" id="bg">
				<div class="container" id="des">	
					&emsp;<h4><i class="material-icons">&#xe55f;</i>&ensp;Address</h2>
					&emsp;<p id="a">&emsp;&emsp;&emsp;Ahsanullah University of Science and Technology</p><br>
					&emsp;<h4><i class="material-icons">&#xe551;</i>&ensp;Let's Talk</h2>
					&emsp;<p>&emsp;&emsp;&emsp;+880 1832829995</p> 
					&emsp;<p>&emsp;&emsp;&emsp;+880 1707596717</p> <br>
					&emsp;<h4><i class="material-icons">&#xe554;</i>&ensp;General Support</h2>
					&emsp;<p>&emsp;&emsp;&emsp;190204059@aust.edu</p>
					&emsp;<p>&emsp;&emsp;&emsp;190204068@aust.edu</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container">
				<h1 style="text-align: center; color: #484A4C ;">Tell Us Your Experience</h1><br><br>
				<form method="post" action="#">
					<div class="row">
						<div class="col-md-12" id="50">
							<span class="error" style="color: red;"><?php echo $nameErr; ?></span><br> 
      						<input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo $name; ?>">
    					</div>
					</div><br>
					<div class="row">
						<div class="col-md-12" id="100">
							<span class="error"style="color: red;"><?php echo $emailErr; ?></span><br>
      						<input type="email" class="form-control" id="Email" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
    					</div>
					</div><br>
					<div class="row">
						<div class="col-md-12" id="100">
      						<textarea id="prob" name="prob" placeholder="Facing any problem? Share with us" style="height:200px"><?php echo $prob; ?></textarea>
    					</div>
					</div><br>
					<div class="row">
						<div class="col-md-12" id="100">
      						<textarea id="story" name="story" placeholder="Tell us about your successful stories!!!" style="height:200px"><?php echo $story; ?></textarea>
    					</div>
					</div><br>
					<div class="row" >
					    <div class="col-md-5"></div>
					    <div class="col-md-4"><button type="submit" class="btn btn-success">SEND MESSAGE</button></div>
					    <div class="col-md-3"></div>
					</div>
				</form>
			</div>
				
			</div>
		</div>
	</section>
</body>
</html>