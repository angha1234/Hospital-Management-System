<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN DASHBOARD</title>
</head>
<body style="background-image: url(PHOTOS/BACKGROUND.jpg); background-size: cover; background-repeat: no-repeat;">
	<?php
	include("../INCLUDE/header.php");
	include("../INCLUDE/connection.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
					include("sidenav.php");
					?>
				</div>
				<div class="col-md-10">
					<h4 class="text-center my-3">ADMIN'S DASHBOARD</h4>
					<div class="col-md-12 my-1">
						<div class="row">
							<div class="col-md-3 bg-success mx-4" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$admin =mysqli_query($connect,"SELECT * FROM admin");
												$num = mysqli_num_rows($admin);
											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">ADMIN</h5>
										</div>
										<div class="col-md-4">
											<a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 bg-info mx-4" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
											$doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");
											$num2 = mysqli_num_rows($doctor);
											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">DOCTORS</h5>
										</div>
										<div class="col-md-4">
											<a href="doctor.php"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 bg-warning mx-4" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$patient = mysqli_query($connect,"SELECT * FROM patient");
												$num3 = mysqli_num_rows($patient);

											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">PATIENTS</h5>
										</div>
										<div class="col-md-4">
											<a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 bg-danger mx-4 my-5" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$report = mysqli_query($connect,"SELECT * FROM report");
												$num4 = mysqli_num_rows($report);

											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num4; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">REPORTS</h5>
										</div>
										<div class="col-md-4">
											<a href="report.php"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 bg-warning mx-4 my-5" style="height: 130px;">
								<?php
								$job = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pendding'");
								$num1 = mysqli_num_rows($job);
								?>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">JOB REQUEST</h5>
										</div>
										<div class="col-md-4">
											<a href="job_request.php"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 bg-success mx-4 my-5" style="height: 130px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$income =mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income");
												$row = mysqli_fetch_array($income);
												$inc = $row['profit'];
											?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "$inc"; ?></h5>
											<h5 class="text-white">TOTAL</h5>
											<h5 class="text-white">INCOME</h5>
										</div>
										<div class="col-md-4">
											<a href="income.php"><i class="fa fa-money-check fa-3x my-4" style="color: white;"></i></a>
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