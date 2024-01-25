<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW INVOICE</title>
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
				<?php
				include("sidenav.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center my-2">VIEW INVOICE</h5>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<?php
								if (isset($_GET['id'])) {
									$id = $_GET['id'];
									$query = "SELECT * FROM income WHERE id='$id'";
									$res = mysqli_query($connect,$query);
									$row = mysqli_fetch_array($res);
								}
							?>
							<table class="table table-bordered">
										<tr>
											<th colspan="2" class="text-center">INVOICE DETAILS</th>
										</tr>
										<tr>
											<td>ID</td>
											<td><?php echo $row['id']; ?></td>
										</tr>
										<tr>
											<td>DOCTOR</td>
											<td><?php echo $row['doctor']; ?></td>
										</tr>
										<tr>
											<td>PATIENT</td>
											<td><?php echo $row['patient']; ?></td>
										</tr>
										<tr>
											<td>DATE DISCHARGE</td>
											<td><?php echo $row['date_discharge']; ?></td>
										</tr>
										<tr>
											<td>AMOUNT PAID</td>
											<td><?php echo $row['amount_paid']; ?></td>
										</tr>
										<tr>
											<td>DESCRIPTION</td>
											<td><?php echo $row['description']; ?></td>
										</tr>
									</table>
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