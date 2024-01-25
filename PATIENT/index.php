<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PATIENT DASHBOARD</title>
</head>
<body>
<?php
include("../INCLUDE/header.php");
include("../INCLUDE/connection.php");
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php
				include("sidenav.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center my-3">PATIENT'S DASHBOARD</h5>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3 bg-info mx-4" style="height: 150px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<h5 class="text-white my-4">MY PROFILE</h5>
									</div>
									<div class="col-md-4">
										<a href="profile.php">
											<i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
										</a>
									</div>
								</div>
							</div>	
						</div>
						<div class="col-md-3 bg-warning mx-4" style="height: 150px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<h5 class="text-white my-4">BOOK APPOINTMENT</h5>
									</div>
									<div class="col-md-4">
										<a href="appointment.php">
											<i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
										</a>
									</div>
								</div>
							</div>	
						</div>
						<div class="col-md-3 bg-success mx-4" style="height: 150px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<h5 class="text-white my-4">MY INVOICE</h5>
									</div>
									<div class="col-md-4">
										<a href="invoice.php">
											<i class="fa fa-file-invoice fa-3x my-4" style="color: white;"></i>
										</a>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<?php
					if (isset($_POST['send'])) {
						$title = $_POST['title'];
						$message = $_POST['message'];
						if (empty($title)) {
							
						}elseif (empty($message)) {
							
						}else{
							$user = $_SESSION['patient'];
							$query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";
							$res = mysqli_query($connect,$query);
							if ($res) {
								echo "<script>alert('YOU HAVE SENT YOUR REPORT')</script>";
							}
						}
					}
				?>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 jumbotron bg-info my-5">
							<h5 class="text-center my-2">SEND A REPORT</h5>
							<form method="post">
								<label>TITLE</label>
								<input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Title Of The Report">
								<br>
								<label>MESSAGE</label>
								<input type="text" name="message" class="form-control" autocomplete="off" placeholder="Enter Message">
								<br>
								<input type="submit" name="send" value="SEND REPORT" class="btn btn-success my-2">
							</form>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>