<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ghotok";

	$con = new mysqli($host, $username, $password, $dbname);

	if(!$con){
		die("Connection failed".mysqli_connect_error());
	}
?>