<?php
session_start();
include('dbconnection.php');

if(isset($_POST['del'])){
	$u_id = mysqli_real_escape_string($con, $_POST['del_id']);
	$del_sql = "DELETE FROM userdata WHERE id = '$u_id'";
	$del_sql_run = $con->query($del_sql);
	if(!$del_sql_run){
		echo "<script>alert('Oops! Something went wrong!')</script>";
		header("Location: users.php");
	}
	else{
		header("Location: users.php");
	}
}
if(isset($_POST['delM'])){
	$u_id = mysqli_real_escape_string($con, $_POST['del_Id']);
	$del_sql = "DELETE FROM message WHERE id = '$u_id'";
	$del_sql_run = $con->query($del_sql);
	if(!$del_sql_run){
		echo "<script>alert('Oops! Something went wrong!')</script>";
		header("Location: message.php");
	}
	else{
		header("Location: message.php");
	}
}

?>