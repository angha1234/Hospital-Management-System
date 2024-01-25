<?php
session_start();
include("INCLUDE/connection.php");
if (isset($_POST['login'])) {
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	$error = array();
	$query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
	$res = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($res);
	if (empty($username)) {
		$error['login'] = "ENTER YOUR USERNAME";
	}elseif (empty($password)) {
		$error['login'] = "ENTER YOUR PASSWORD";
	}elseif ($row['status'] == "Pendding") {
		$error['login'] = "PLEASE WAIT FOR THE ADMIN TO CONFIRM YOUR REQUEST";
	}elseif ($row['status'] == "Rejected") {
		$error['login'] = "YOUR REQUEST HAS BEEN DECLINED";
	}
	if (count($error) ==0) {
		$query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
		$res = mysqli_query($connect,$query);
		if (mysqli_num_rows($res)) {
			echo "<script>alert('DONE')</script>";
			$_SESSION['doctors'] = $username;
			header("Location:DOCTOR/index.php");
		}else{
			echo "<script>alert('INVALID ACCOUNT')</script>";
		}
	}
}
if (isset($error['login'])) {
	$l = $error['login'];
	$show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
	$show = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DOCTOR LOGIN PAGE</title>
</head>
<body style="background-image: url(PHOTOS/BACK.jpg);background-size: cover;background-repeat: no-repeat;">
<?php
include("INCLUDE/header.php");
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 jumbotron my-3">
				<h5 class="text-center my-2">DOCTORS LOGIN</h5>
				<div>
					<?php echo $show; ?>
				</div>
				<form method="post">
					<div class="form-group">
						<label>USERNAME</label>
						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
					</div>
					<div>
						<label>PASSWORD</label>
						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
					</div>
					<br>
					<input type="submit" name="login" value="LOGIN" class="btn btn-success">
					<br>
					<br>
					<p class="text-center">I DON'T HAVE AN ACCOUNT<br><a href="apply.php"> APPLY HERE</a></p>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
</body>
</html>