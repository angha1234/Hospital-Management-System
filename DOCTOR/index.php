<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DOCTORS'S DASHBOARD</title>
</head>
<body>
<?php
include("../INCLUDE/header.php");
include("../INCLUDE/connection.php");
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
				<?php include("sidenav.php"); ?>
			</div>
			<div class="col-md-10">
				<div class="container-fluid">
					<h5 class="text-center my-3">DOCTOR'S DASHBOARD</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 my-2 bg-info mx-4" style="height: 150px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="text-white my-4">MY PROFILE</h5>
										</div>
										<div class="col-md-4">
											<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 my-2 bg-warning mx-4" style="height: 150px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$patient = mysqli_query($connect,"SELECT * FROM patient");
												$num3 = mysqli_num_rows($patient);
											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">PATIENT</h5>
										</div>
										<div class="col-md-4">
											<a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 my-2 bg-success mx-4" style="height: 150px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$appointment = mysqli_query($connect,"SELECT * FROM appointment WHERE status='Pendding'");
												$num4 = mysqli_num_rows($appointment);
											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num4; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">APPOINTMENT</h5>
										</div>
										<div class="col-md-4">
											<a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>