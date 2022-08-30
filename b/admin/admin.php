<?php session_start();
$uname = $_SESSION['uname'];
if($uname == true){

}
else{
	header("Location: index.php");
}
?>
<?php include('include/header.php');?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Logged in as: <?php echo $uname; ?></h2>
		</div>
	</div>
</div>

<?php include('include/footer.php');?>
