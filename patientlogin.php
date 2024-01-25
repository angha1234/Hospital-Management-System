<?php
session_start();
include("INCLUDE/connection.php");
if (isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	if (empty($uname)) {
		echo "<script>alert('Enter Username')</script>";
	}else if (empty($pass)) {
		echo "<script>alert('Enter Password')</script>";
	}else{
		$query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
		$res = mysqli_query($connect,$query);
		if (mysqli_num_rows($res)==1) {
			header("Location: PATIENT/index.php");
			$_SESSION['patient'] = $uname;
		}else{
			echo "<script>alert('Invalid Account')</script>";
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PATIENT LOGIN PAGE</title>
</head>
<body style="background-image: url(PHOTOS/BACK.jpg);background-repeat: no-repeat; background-size: cover;">
<?php
include("INCLUDE/header.php");
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 my-5 jumbotron">
				<h5 class="text-center my-3">PATIENT LOGIN</h5>
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
					<input type="submit" name="login" class="btn btn-info my-3" value="LOGIN">
					<p class="text-center">I DON'T HAVE AN ACCOUNT<br> <a href="account.php">CLICK HERE</a></p>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
</body>
</html>