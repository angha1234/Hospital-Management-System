
<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
</head>
<body style="background-image: url(PHOTOS/TRY.jpg);background-repeat: no-repeat; background-size: cover;">
<?php
include("INCLUDE/header.php");
?>
<div style="margin-top: 50px;"></div>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3 mx-1 shadow">
				<img src="PHOTOS/MORE INFORMATION.jpg" style="width: 100%;height: 190px;">
				<h5 class="text-center">FOR MORE INFORMATION PLEASE CLICK HERE</h5>
				<a href="#">
					<button class="btn btn-success my-3" style="margin-left: 25%;">CLICK HERE</button>
				</a>
			</div>
			<div class="col-md-3 mx-1 shadow">
				<img src="PHOTOS/PATIENT.jpg" style="width: 100%;height: 190px;">
				<h5 class="text-center">ALLOW US TO TAKE CARE OF YOU</h5>
				<a href="account.php">
					<button class="btn btn-success my-3" style="margin-left: 20%;">CREATE ACCOUNT</button>
				</a>
			</div>
			<div class="col-md-3 mx-1 shadow">
				<img src="PHOTOS/EMPLOYEMENT.jpg" style="width: 100%;height: 190px;">
				<h5 class="text-center">WE ARE EMPLOYING DOCTORS</h5>
				<a href="apply.php">
					<button class="btn btn-success my-3" style="margin-left: 25%;">APPLY NOW</button>
				</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>