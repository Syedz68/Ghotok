<?php session_start();
$uname = $_SESSION['uname'];
if($uname == true){

}
else{
	header("Location: index.php");
}
?>
<?php include('include/header.php');?>
<?php include('dbconnection.php'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2>All the messages sent by the users</h2>
		</div>
	</div>
	<table class="table">
		<thead class="table-info">
			<tr>
				<td>Action</td>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Problem</td>
				<td>Story</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM message";
			$res = $con->query($sql);
			if(!$res){
				die("Invalid Query".$con->error);
			}
			while($row = $res->fetch_assoc()){
				echo "<tr>
					<td>
						<form action='code.php' method='post'>
							<input type='hidden' name='del_Id' value=" . $row["id"] . ">
							<button type='submit' class='btn btn-danger' name='delM'>Delete</button>
						</form>
					</td>
					<td>" . $row["id"] . "</td>
					<td>" . $row["name"] . "</td>
					<td>" . $row["email"] . "</td>
					<td>" . $row["prob"] . "</td>
					<td>" . $row["story"] . "</td>
				</tr>";
			}
			?>
			
		</tbody>
	</table>
</div>

<?php include('include/footer.php');?>
