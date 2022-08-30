<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Ghotok Admin Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2c988112ad.js" crossorigin="anonymous"></script>

    <!--Css Link-->
    <link rel="stylesheet" href="../css/cstyle.css" />
    <link rel="stylesheet" type="text/css" href="../css/styleone.css">

    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
    	*{
    		box-sizing: border-box;
    	}
    	body{
    		display: flex;
			justify-content: center;
			background-color: #E8CECE;
    	}
    	section{
    		position: relative;
    		height: 100vh;
    		width: 100%;
    	}
    	.form-container{
    		position: absolute;
    		top: 50%;
    		left: 50%;
    		transform: translate(-50%, -50%);
    		background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3));
    		width: 380px;
    		padding: 50px 30px;
    		border-radius: 10px;
    		box-shadow: 7px 7px 60px #000;
    	}
    	h1{
    		text-transform: uppercase;
    		font-size: 2em;
    		text-align: center;
    		margin-bottom: 2em;
    	}
    	.control input{
    		width: 100%;
    		display: block;
    		padding: 10px;
    		color: #222;
    		border: none;
    		outline: none;
    		margin: 1em 0;
    	}
    	.control input[type="submit"]{
    		background: black;
    		color: #fff;
    		text-transform: uppercase;
    		font-size: 1.2em;
    		opacity: .7;
    		transition: opacity .3s ease;
    	}
    	.control input[type="submit"]:hover{
    		opacity: 1;
    	}
    </style>
</head>
<body>
<?php
include('dbconnection.php');
session_start();
$uname = $psw = "";
$uErr = $pasErr = "";
$u = $p = true;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["uname"])) {
        $u = false;
    } else {
        $uname = test_input($_POST["uname"]);
    }
    if (empty($_POST["psw"])) {
        $p = false;
    } else {
        $psw = test_input($_POST["psw"]);
    }
}
if(isset($_POST['uname'])){
    if($u && $p){
        $sql = "SELECT * FROM admin WHERE uname = '$uname' AND passw = '$psw'";
        $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['uname'] = $row['uname'];
            header("Location: admin.php");
            die;
        }else {
            echo "<script>alert('Wrong Username or Password Given')</script>";
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
	<section>
		<div class="form-container">
			<h1>Admin Login</h1>
			<form method="post">
				<div class="control">
					<label for="uname">Username</label>
					<input type="text" name="uname" id="uname">
				</div>
				<div class="control">
					<label for="psw">Password</label>
					<input type="password" name="psw" id="psw">
				</div>
				<div class="control">
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
	</section>

</body>
</html>