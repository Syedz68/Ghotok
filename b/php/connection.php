<?php
$server = "localhost";
$username = "root";
$p = "";
$database = "ghotok";

$conn = mysqli_connect($server, $username, $p, $database);
if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}
