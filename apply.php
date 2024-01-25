<?php
include("INCLUDE/connection.php");
if (isset($_POST['apply'])) {
	$firstname = $_POST['fname'];
	$surname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];
	$error = array();
	if (empty($firstname)) {
		$error['apply'] = "ENTER YOUR FIRSTNAME";
	}elseif (empty($surname)) {
		$error['apply'] = "ENTER YOUR SURNAME";
	}elseif (empty($username)) {
		$error['apply'] = "ENTER YOUR USERNAME";
	}elseif (empty($email)) {
		$error['apply'] = "ENTER YOUR EMAIL";
	}elseif ($gender == "") {
		$error['apply'] = "ENTER YOUR GENDER";
	}elseif (empty($phone)) {
		$error['apply'] = "ENTER YOUR PHONE NUMBER";
	}elseif ($country == "") {
		$error['apply'] = "ENTER YOUR COUNTRY";
	}elseif (empty($password)) {
		$error['apply'] = "ENTER YOUR PASSWORD";
	}elseif ($confirm_password != $password) {
		$error['apply'] = "BOTH PASSWORD DO NOT MATCH";
	}
	if (count($error)==0) {
		$query = "INSERT INTO doctors(`firstname`, `surname`, `username`, `email`, `gender`, `phone`, `country`, `password`, `salary`, `date_reg`, `status`, `profile`) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
		$result = mysqli_query($connect,$query);
		if ($result) {
			echo "<script>alert('YOU HAVE SUCCESSFULLY APPLIED')</script>";
			header("Location: doctorlogin.php");
		}else{
			echo "<script>alert('FAILED')</script>";
		}
	}
}
if (isset($error['apply'])) {
	$s = $error['apply'];
	$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
	$show = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>APPLY FOR DOCTORS</title>
</head>
<body style="background-image: url(PHOTOS/BACK.jpg);background-size: cover;background-repeat: no-repeat;">
<?php
include("INCLUDE/header.php");
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 my-3 jumbotron">
				<h5 class="text-center">APPLICATION FOR DOCTORS</h5>
				<div>
					<?php echo $show; ?>
				</div>
				<form method="post">
					<div class="form-group">
						<label>FIRSTNAME</label>
						<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
					</div>
					<div class="form-group">
						<label>SURNAME</label>
						<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
					</div>
					<div class="form-group">
						<label>USERNAME</label>
						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
					</div>
					<div class="form-group">
						<label>EMAIL</label>
						<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
					</div>
					<div class="form-group">
						<label>SELECT YOUR GENDER </label>
						<select name="gender" class="form-control">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label>PHONE NUMBER</label>
						<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
					</div>
					<div class="form-group">
						<label>SELECT YOUR COUNTRY </label>
						<select name="country" class="form-control">
							<option value="">Select Country</option>
							<option value="INDIA">INDIA</option>
							<option value="USA">USA</option>
							<option value="UK">UK</option>
							<option value="EUROPE">EUROPE</option>
						</select>
					</div>
					<div class="form-group">
						<label>PASSWORD</label>
						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
					</div>
					<div class="form-group">
						<label>CONFIRM PASSWORD</label>
					<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
					</div>
					<input type="submit" name="apply" value="APPLY NOW" class="btn btn-success">
					<br>
					<p class="text-center">I ALREADY HAVE AN ACCOUNT<br><a href="doctorlogin.php">LOGIN HERE</p>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
</body>
</html>