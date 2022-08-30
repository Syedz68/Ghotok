<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <title>Ghotok - Register</title>

    <!--Bootstrap 5 css Link-->
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

    <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../icon/favicon.ico" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
		* {
		  box-sizing: border-box;
		}

		#regForm {
		  background-color: #ffffff;
		  margin: 50px auto;
		  font-family: Raleway;
		  padding: 30px;
		  width: 70%;
		  min-width: 300px;
		}

		h1, #h {
		  text-align: center;  
		}

		input {
		  padding: 10px;
		  width: 100%;
		  font-size: 17px;
		  font-family: Raleway;
		  border: 1px solid #aaaaaa;
		}

		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}

		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		button {
		  background-color: #F47E7E;
		  color: #ffffff;
		  border: none;
		  padding: 10px 20px;
		  font-size: 17px;
		  font-family: Raleway;
		  cursor: pointer;
		}

		button:hover {
		  opacity: 0.8;
		}

		#prevBtn {
		  background-color: #bbbbbb;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none;  
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #F56161 ;
		}
	</style>
</head>
<body>
<?php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=ghotok", "root", "");
if(isset($_POST['email'])){
    sleep(5);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM userdata WHERE email = ? ";
    $pd = $connect->prepare($sql);
    $pd->execute([$email]);
    $row = $pd->rowCount();
    if($row>0){
        echo "<script>alert('This email already exists!')</script>";
    } else {
        $picname = $_FILES['uploadpic']['name'];
        $tempic = $_FILES['uploadpic']['temp_name'];
        $pic = 'pic/'.$picname;
        move_uploaded_file($tempic, $pic);
        $cvname = $_FILES['uploadcv']['name'];
        $tempcv = $_FILES['uploadcv']['temp_name'];
        $cv = "cv/".$cvname;
        move_uploaded_file($tempcv, $cv);

        $query = "INSERT INTO userdata (name, email, phone, pass, dob, age, gender, height, religion, cast, nation, mstat, fstat, ftype, pdiv, pdis, pthana, ppost, pzip, prd, parea, ldiv, ldis, lthana, lpost, lzip, lrd, larea, edu, emp, ocu, pic, cv, bio) VALUES (:name, :email, :phone, :pass, :dob, :age, :gender, :height, :religion, :cast, :nation, :mstat, :fstat, :ftype, :pdiv, :pdis, :pthana, :ppost, :pzip, :prd, :parea, :ldiv, :ldis, :lthana, :lpost, :lzip, :lrd, :larea, :edu, :emp, :ocu, :pic, :cv, :bio)";
        $userData = array(
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':phone' => $_POST['phone'],
            ':pass' => $_POST['password'],
            ':dob' => $_POST['dob'],
            ':age' => $_POST['age'],
            ':gender' => $_POST['gender'],
            ':height' => $_POST['height'],
            ':religion' => $_POST['religion'],
            ':cast' => $_POST['cast'],
            ':nation' => $_POST['nationality'],
            ':mstat' => $_POST['mstat'],
            ':fstat' => $_POST['fstat'],
            ':ftype' => $_POST['ftype'],
            ':pdiv' => $_POST['pdivision'],
            ':pdis' => $_POST['pdistrict'],
            ':pthana' => $_POST['pthana'],
            ':ppost' => $_POST['ppostoff'],
            ':pzip' => $_POST['pzip'],
            ':prd' => $_POST['prd'],
            ':parea' => $_POST['parea'],
            ':ldiv' => $_POST['ldivision'],
            ':ldis' => $_POST['ldistrict'],
            ':lthana' => $_POST['lthana'],
            ':lpost' => $_POST['lpostoff'],
            ':lzip' => $_POST['lzip'],
            ':lrd' => $_POST['lrd'],
            ':larea' => $_POST['larea'],
            ':edu' => $_POST['education'],
            ':emp' => $_POST['emp'],
            ':ocu' => $_POST['occupation'],
            ':pic' => $pic,
            ':cv' => $cv,
            ':bio' => $_POST['bio']
        );
        $statement = $connect->prepare($query);
        if($statement->execute($userData)){
            echo "<script>alert('Data Stored Successfully!')</script>";
            $s = "SELECT * FROM userdata WHERE email = '$email' ";
            $st = $connect->query($s);
            if($st){
                foreach ($st as $r) {
                    $_SESSION['id'] = $r['id'];
                };   
            }
            header("Location: main.php");
        }else {
            echo "<script>alert('Oops! Something went wrong!')</script>";
        }
    }
}
?>
	<div class="container">
		<form method="post" id="regForm" enctype="multipart/form-data">
			<!-- One "tab" for each step in the form: -->
			<div class="tab">
				<h1>Find Your Life Partner</h1>
            	<p id="h">With the most trusted matrimony side in our country</p>
				<label style="font-size: 20px; color:#545658 ;">TELL US YOUR NAME*</label>
				<span id="error" style="color: red;"></span><br>
				<input type="text" id="name" name="name" placeholder="Enter your full name" oninput="this.className = ''">
				<label style="font-size: 20px; color: #545658 ;">ENTER YOUR EMAIL*</label><br>
				<span id="errorEmail"style="color: red;"></span>
				<input type="email" class="form-control" id="email" placeholder="Eg. example@gmail.com" name="email" oninput="this.className = ''">
				<label style="font-size: 20px; color: #545658 ;">ENTER PHONE NUMBER*</label><br>
				<span id="errorPhone"style="color: red;"></span>
				<input type="text" id="phone" placeholder="Eg. 01*********" name="phone" oninput="this.className = ''">
				<label style="font-size: 20px; color: #545658 ;">PASSWORD*</label><br>
				<span id="errorPass"style="color: red;"></span>
				<input type="password" id="password" placeholder="Minimum 8 digits" name="password" oninput="this.className = ''"><br>
                <p>Already have an account? <a href="index.php">Login</a></p>
			</div>
			<div class="tab">
				<h1>Provide Us Your Basic Details</h1>
                <p id="h">Make your profile more convenient</p>
                <div class="row">
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">DATE OF BIRTH*</label>
                                    <input type="date" id="dob" placeholder="Date of Birth" name="dob" oninput="this.className = ''">
                                </div>
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">Age*</label> 
                                    <input type="text" id="age" name="age" oninput="this.className = ''">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">GENDER*</label> 
                                    <input class="form-control" list="lists" type="text" id="gender" placeholder="Select any" name="gender" oninput="this.className = ''">
                                    <datalist id="lists">
                                        <option value="Male">
                                        <option value="Female">
                                        <option value="Others">
                                    </datalist>
                                </div>
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">HEIGHT*</label> 
                                    <input class="form-control" list="heights" type="text" id="height" placeholder ="Feet" name="height" oninput="this.className = ''">
                                    <datalist id="heights">
                                        <option value="7'">
                                        <option value="6'11&#x201D;">
                                        <option value="6'10&#x201D;">
                                        <option value="6'9&#x201D;">
                                        <option value="6'8&#x201D;">
                                        <option value="6'7&#x201D;">
                                        <option value="6'6&#x201D;">
                                        <option value="6'5&#x201D;">
                                        <option value="6'4&#x201D;">
                                        <option value="6'3&#x201D;">
                                        <option value="6'2&#x201D;">
                                        <option value="6'1&#x201D;">
                                        <option value="6'">
                                        <option value="5'11&#x201D;">
                                        <option value="5'10&#x201D;">
                                        <option value="5'9&#x201D;">
                                        <option value="5'8&#x201D;">
                                        <option value="5'7&#x201D;">
                                        <option value="5'6&#x201D;">
                                        <option value="5'5&#x201D;">
                                        <option value="5'4&#x201D;">
                                        <option value="5'3&#x201D;">
                                        <option value="5'2&#x201D;">
                                        <option value="5'1&#x201D;">
                                        <option value="5'">
                                        <option value="4'11&#x201D;">
                                        <option value="4'10&#x201D;">
                                        <option value="4'9&#x201D;">
                                        <option value="4'8&#x201D;">
                                        <option value="4'7&#x201D;">
                                        <option value="4'6&#x201D;">
                                        <option value="4'5&#x201D;">
                                    </datalist>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">RELIGION*</label> 
                                    <input class="form-control" list="religions" type="text" id="religion" placeholder="Select any" name="religion" oninput="this.className = ''">
                                    <datalist id="religions">
                                        <option value="Islam">
                                        <option value="Hindu">
                                        <option value="Christian">
                                        <option value="Buddhism">
                                    </datalist>
                                </div>
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">CAST*</label>
                                    <input class="form-control" list="casts" type="text" id="cast" placeholder="Select any" name="cast" oninput="this.className = ''">
                                    <datalist id="casts">
                                        <option value="Sunni">
                                        <option value="Shi'a">
                                        <option value="Ibadi">
                                        <option value="Ahmadiyya">
                                        <option value="Sufism">
                                        <option value="Brahmins">
                                        <option value="Kshatriyas">
                                        <option value="Vaishyas">
                                        <option value="Shudras">
                                        <option value="Catholicism">
                                        <option value="Protestantism">
                                        <option value="Eastern Orthodoxy">
                                        <option value="Oriental Orthodoxy">
                                        <option value="Restorationism">
                                        <option value="Theravada">
                                        <option value="Mahayana">
                                        <option value="Vajrayana">
                                    </datalist>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">NATONALITY*</label> 
                                    <input class="form-control" list="nationalities" type="text" id="nationality" placeholder="Select any" name="nationality" oninput="this.className = ''">
                                    <datalist id="nationalities">
                                        <option value="Bangladeshi">
                                    </datalist>
                                </div>
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">MARITAL STATUS*</label> 
                                    <input class="form-control" list="mstatus" type="text" id="mstat" placeholder="Select any" name="mstat" oninput="this.className = ''">
                                    <datalist id="mstatus">
                                        <option value="Never Married">
                                        <option value="Divorced">
                                        <option value="Separated">
                                        <option value="Widowed">
                                    </datalist>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">FAMILY STATUS*</label>
                                    <input class="form-control" list="fstatus" type="text" id="fstat" placeholder="Select any" name="fstat" oninput="this.className = ''">
                                    <datalist id="fstatus">
                                        <option value="Rich">
                                        <option value="Upper Middle Class">
                                        <option value="Middle Class">
                                        <option value="Affluent">
                                    </datalist>
                                </div>
                                <div class="col-md-6" id="100">
                                    <label style="font-size: 20px; color:#545658 ;">FAMILY TYPE*</label>
                                    <input class="form-control" list="types" type="text" id="ftype" placeholder="Select any" name="ftype" oninput="this.className = ''">
                                    <datalist id="types">
                                        <option value="Joint">
                                        <option value="Neuclear">
                                    </datalist>
                                </div>
                            </div>
			</div>
			<div class="tab">
				<h1>Provide Us Your Address Details</h1>
                <p id="h">Make your profile more trustworthy</p>
                <label style="font-size: 20px; color:#545658 ;">PERMANENT ADDRESS*</label>
                                <div class="row">
                                    <div class="col-md-6" id="100">
                                        <input class="form-control" list="divisions" type= "text" placeholder="Division" name="pdivision" id="pdivision" oninput="this.className = ''">
                                                <datalist id="divisions">
                                                  <option value="Dhaka">
                                                  <option value="Chittagong">
                                                  <option value="Barisal">
                                                  <option value="Sylhet">
                                                  <option value="Rajshahi">
                                                  <option value="Khulna">
                                                  <option value="Rangpur">
                                                  <option value="Mymensingh">   
                                                </datalist>
                                    </div>
                                    <div class="col-md-6" id="100"> 
                                        <input class="form-control" list="districts" type= "text" placeholder="District" name="pdistrict" id="pdistrict" oninput="this.className = ''">
                                                <datalist id="districts">
                                                  <option value="Dhaka">
                                                  <option value="Faridpur">
                                                  <option value="Gazipur">
                                                  <option value="Gopalganj">
                                                  <option value="Kishoreganj">
                                                  <option value="Munshiganj">
                                                  <option value="Madaripur">
                                                  <option value="Manikganj">
                                                  <option value="Narayanganj">
                                                  <option value="Narshingdi">
                                                  <option value="Rajbari">
                                                  <option value="Shariatpur">
                                                  <option value="Tangail">   
                                                </datalist>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" id="100">
                                        <input class="form-control" list="upazillas" type= "text" placeholder="Upazilla" name="pthana" id="pthana" oninput="this.className = ''">
                                                <datalist id="upazillas">
                                                  <option value="Dhamrai">
                                                  <option value="Dohar">
                                                  <option value="Keraniganj">
                                                  <option value="Nawabganj">
                                                  <option value="Savar">
                                                   
                                                </datalist>
                                    </div>
                                    <div class="col-md-4" id="100"> 
                                        <input class="form-control" list="posts" type= "text" placeholder="Post Office" name="ppostoff" id="ppostoff" oninput="this.className = ''">
                                                <datalist id="posts">
                                                  <option value="Demra">
                                                  <option value="Newmarket">
                                                  <option value="Banani">
                                                  <option value="Jigatola">
                                                  <option value="Kamalapur">
                                                  <option value="Keraniganj">
                                                  <option value="Ati">
                                                  <option value="Gulshan Model Town">   
                                                </datalist>
                                    </div>
                                    <div class="col-md-4" id="100">
                                        <input class="form-control" list="zips" type= "text" placeholder="Zip Code" name="pzip" id="pzip" oninput="this.className = ''">
                                                <datalist id="zips">
                                                  <option value="1360">
                                                  <option value="1205">
                                                  <option value="1213">
                                                  <option value="1209">
                                                  <option value="1351">
                                                  <option value="1310">
                                                  <option value="1312">
                                                  <option value="1212">   
                                                </datalist>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" id="100">
                                        <input type="text" id="prd" placeholder="Road no" name="prd" oninput="this.className = ''">
                                    </div>
                                    <div class="col-md-8" id="100">
                                        <input type="text" id="parea" placeholder="Area" name="parea" oninput="this.className = ''">
                                    </div>
                                </div><br>
                                <label style="font-size: 20px; color:#545658 ;">LIVING ADDRESS*</label>
                                <div class="row">
                                    <div class="col-md-6" id="100">
                                        <input class="form-control" list="divisions" type= "text" placeholder="Division" name="ldivision" id="ldivision" oninput="this.className = ''">
                                                <datalist id="divisions">
                                                  <option value="Dhaka">
                                                  <option value="Chittagong">
                                                  <option value="Barisal">
                                                  <option value="Sylhet">
                                                  <option value="Rajshahi">
                                                  <option value="Khulna">
                                                  <option value="Rangpur">
                                                  <option value="Mymensingh">   
                                                </datalist>
                                    </div>
                                    <div class="col-md-6" id="100"> 
                                        <input class="form-control" list="districts" type= "text" placeholder="District" name="ldistrict" id="ldistrict" oninput="this.className = ''">
                                                <datalist id="districts">
                                                  <option value="Dhaka">
                                                  <option value="Faridpur">
                                                  <option value="Gazipur">
                                                  <option value="Gopalganj">
                                                  <option value="Kishoreganj">
                                                  <option value="Munshiganj">
                                                  <option value="Madaripur">
                                                  <option value="Manikganj">
                                                  <option value="Narayanganj">
                                                  <option value="Narshingdi">
                                                  <option value="Rajbari">
                                                  <option value="Shariatpur">
                                                  <option value="Tangail">   
                                                </datalist>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" id="100">
                                        <input class="form-control" list="upazillas" type= "text" placeholder="Upazilla/Thana" name="lthana" id="lthana" oninput="this.className = ''">
                                                <datalist id="upazillas">
                                                  <option value="Dhamrai">
                                                  <option value="Dohar">
                                                  <option value="Keraniganj">
                                                  <option value="Nawabganj">
                                                  <option value="Savar">   
                                                </datalist>
                                    </div>
                                    <div class="col-md-4" id="100"> 
                                        <input class="form-control" list="posts" type= "text" placeholder="Post Office" name="lpostoff" id="lpostoff" oninput="this.className = ''">
                                                <datalist id="posts">
                                                  <option value="Demra">
                                                  <option value="Newmarket">
                                                  <option value="Banani">
                                                  <option value="Jigatola">
                                                  <option value="Kamalapur">
                                                  <option value="Keraniganj">
                                                  <option value="Ati">
                                                  <option value="Gulshan Model Town">   
                                                </datalist>
                                    </div>
                                    <div class="col-md-4" id="100">
                                        <input class="form-control" list="zips" type= "text" placeholder="Zip Code" name="lzip" id="lzip" oninput="this.className = ''">
                                                <datalist id="zips">
                                                  <option value="1360">
                                                  <option value="1205">
                                                  <option value="1213">
                                                  <option value="1209">
                                                  <option value="1351">
                                                  <option value="1310">
                                                  <option value="1312">
                                                  <option value="1212">   
                                                </datalist>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" id="100">
                                        <input type="text" id="lrd" placeholder="Road no" name="lrd" oninput="this.className = ''">
                                    </div>
                                    <div class="col-md-8" id="100">
                                        <input type="text" id="larea" placeholder="Area" name="larea" oninput="this.className = ''">
                                    </div>
                                </div>
			</div>
			<div class="tab">
				<h1>Your Proffessional Details</h1>
                <p id="h">Make your profile more strong</p>
                <div class="row">
                                    <label style="font-size: 20px; color:#545658 ;">HIGHEST EDUCATION*</label>
                                    <div class="col-md-12" id="100">
                                        <span class="error" style="color: red;"></span><br> 
                                        <input class="form-control" list="educations" type="text" id="education" placeholder="Select any" name="education" oninput="this.className = ''">
                                        <datalist id="educations">
                                            <option value="M.Sc">
                                            <option value="MBA">
                                            <option value="MA">
                                            <option value="B.Sc">
                                            <option value="BBA">
                                            <option value="BA">
                                            <option value="Higher Secondary">
                                            <option value="Secondary">
                                            <option value="Primary">
                                        </datalist>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label style="font-size: 20px; color: #545658 ;">EMPLOYMENT STATUS*</label>
                                    <div class="col-md-12" id="100">
                                        <span class="error" style="color: red;"></span><br> 
                                        <input class="form-control" list="elist" type="text" id="emp" placeholder="Select any" name="emp" oninput="this.className = ''">
                                        <datalist id="elist">
                                            <option value="Government">
                                            <option value="Private">
                                            <option value="Business">
                                            <option value="Self Employed">
                                            <option value="Defence">
                                            <option value="Unemployed">
                                        </datalist>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <label style="font-size: 20px; color: #545658 ;">OCCUPATION*</label>
                                    <div class="col-md-12" id="100">
                                        <span class="error" style="color: red;"></span><br> 
                                        <input class="form-control" list="occupations" type="text" id="occupation" placeholder="Select any" name="occupation" oninput="this.className = ''">
                                        <datalist id="occupations">
                                            <option value="Service Holder">
                                            <option value="Govt. Employee">
                                            <option value="Entrepreneur">
                                        </datalist>
                                    </div>
                                </div><br>
			</div>
			<div class="tab">
				<h1>Beautify Your Profile</h1>
                <p id="h">Make your profile more attractive</p>
                <label style="font-size: 20px; color:#545658 ;">UPLOAD YOUR PROFILE PICTURE</label>
                <input type="file" id="uploadpic" name="uploadpic" oninput="this.className = ''">
                <label style="font-size: 20px; color: #545658 ;">UPLOAD YOUR CV</label>
                <input type="file" id="uploadcv" name="uploadcv" oninput="this.className = ''">
                <label style="font-size: 20px; color:#545658 ;">BIO</label>
                <textarea id="bio" name="bio" placeholder="Write something about yourself(Hobbies, Favorite colors,Favorite sports, Motives and so on)..." oninput="this.className = ''" style="height:200px"></textarea>

			</div>
			<div style="overflow:auto;">
				<div style="float:right;">

					<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
					<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
				</div>
			</div>
			<!-- Circles which indicates the steps of the form: -->
			<div style="text-align:center;margin-top:40px;">
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
			</div>
		</form>
	</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  var email_Err = '';
  var pas = document.getElementById("password").value;
  var pho = document.getElementById("phone").value;
  var pass_Err = '';
  var pho_Err = '';
  var phoneVal = /^\d{11}$/;
  var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  if(!pattern.test($('#email').val())){
    email_Err = 'Invalid email';
    $('#errorEmail').text(email_Err);
    $('#email').addClass('invalid');
    valid = false;
  }else{
    email_Err = '';
    $('#errorEmail').text(email_Err);
  }
  if(pas.length < 8){
    pass_Err = 'Minimum 8 characters required'
    $('#errorPass').text(pass_Err);
    $('#password').addClass('invalid');
    valid = false;
  }else{
    pass_Err = '';
    $('#errorPass').text(pass_Err);
  }
  if(!phoneVal.test($('#phone').val())){
    pho_Err = 'Invalid number';
    $('#errorPhone').text(pho_Err);
    $('#phone').addClass('invalid');
    valid = false;
  }
  else if(pho[0]== '0' && pho[1]== '1'){
    if(pho[2]== '0' || pho[2]== '1' || pho[2]== '2'){
        pho_Err = 'Invalid number';
        $('#errorPhone').text(pho_Err);
        $('#phone').addClass('invalid');
        valid = false;
    }
    else{
        pho_Err = '';
        $('#errorPhone').text(pho_Err);
    }
  }
  else{
    pho_Err = '';
    $('#errorPhone').text(pho_Err);
  }
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</body>
</html>