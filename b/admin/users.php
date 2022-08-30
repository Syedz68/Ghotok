<?php session_start();
$uname = $_SESSION['uname'];
if($uname == true){

}
else{
	header("Location: index.php");
}
?>
<?php include('include/header.php');?>
<?php
include('dbconnection.php');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2>List of all the registered users</h2>
		</div>
	</div>
	<div>
		<table class="table">
			<thead class="table-danger">
				<tr>
					<td>Action</td>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Password</td>
					<td>DOB</td>
					<td>Age</td>
					<td>Gender</td>
					<td>Height</td>
					<td>Religion</td>
					<td>Caste</td>
					<td>Nationality</td>
					<td>Mstat</td>
					<td>Fstat</td>
					<td>Ftype</td>
					<td>PDivision</td>
					<td>PDistrict</td>
					<td>PThana</td>
					<td>PPostoffice</td>
					<td>PZip</td>
					<td>PRd</td>
					<td>PArea</td>
					<td>LDivision</td>
					<td>LDistrict</td>
					<td>LThana</td>
					<td>LPostoffice</td>
					<td>LZip</td>
					<td>LRd</td>
					<td>LArea</td>
					<td>Education</td>
					<td>Employment</td>
					<td>Occupation</td>
					<td>Picture</td>
					<td>CV</td>
					<td>Bio</td>

				</tr>
			</thead>
			<tbody>
				<?php
					$Sql = "SELECT * FROM userdata";
					$rest = $con->query($Sql);
					if(!$rest){
						die("Invalid Query".$con->error);
					}
					while ($Row = $rest->fetch_assoc()) {
						echo "<tr>
							<td>
								<form action='code.php' method='post'>
									<input type='hidden' name='del_id' value=" . $Row["id"] . ">
									<button type='submit' class='btn btn-danger' name='del'>Delete</button>
								</form>
							</td>
							<td>" . $Row["id"] . "</td>
							<td>" . $Row["name"] . "</td>
							<td>" . $Row["email"] . "</td>
							<td>" . $Row["phone"] . "</td>
							<td>" . $Row["pass"] . "</td>
							<td>" . $Row["dob"] . "</td>
							<td>" . $Row["age"] . "</td>
							<td>" . $Row["gender"] . "</td>
							<td>" . $Row["height"] . "</td>
							<td>" . $Row["religion"] . "</td>
							<td>" . $Row["cast"] . "</td>
							<td>" . $Row["nation"] . "</td>
							<td>" . $Row["mstat"] . "</td>
							<td>" . $Row["fstat"] . "</td>
							<td>" . $Row["ftype"] . "</td>
							<td>" . $Row["pdiv"] . "</td>
							<td>" . $Row["pdis"] . "</td>
							<td>" . $Row["pthana"] . "</td>
							<td>" . $Row["ppost"] . "</td>
							<td>" . $Row["pzip"] . "</td>
							<td>" . $Row["prd"] . "</td>
							<td>" . $Row["parea"] . "</td>
							<td>" . $Row["ldiv"] . "</td>
							<td>" . $Row["ldis"] . "</td>
							<td>" . $Row["lthana"] . "</td>
							<td>" . $Row["lpost"] . "</td>
							<td>" . $Row["lzip"] . "</td>
							<td>" . $Row["lrd"] . "</td>
							<td>" . $Row["larea"] . "</td>
							<td>" . $Row["edu"] . "</td>
							<td>" . $Row["emp"] . "</td>
							<td>" . $Row["ocu"] . "</td>
							<td>" . $Row["pic"] . "</td>
							<td>" . $Row["cv"] . "</td>
							<td>" . $Row["bio"] . "</td>

						</tr>";
					}
				?>
				
			</tbody>
		</table>
	</div>
</div>

<?php include('include/footer.php');?>
