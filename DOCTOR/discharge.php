<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHECK PATIENT APPOINTMENT</title>
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
				<h5 class="text-center">TOTAL APPOINTMENT</h5>
				<?php
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						$query = "SELECT * FROM appointment WHERE id='$id'";
						$res = mysqli_query($connect,$query);
						$row = mysqli_fetch_array($res);
					}
				?>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-bordered">
								<tr>
									<th colspan="2" class="text-center">APPOINTMENT DETAILS</th>
								</tr>
								<tr>
									<td>ID</td>
									<td><?php echo $row['id']; ?></td>
								</tr>
								<tr>
									<td>Firstname</td>
									<td><?php echo $row['firstname']; ?></td>
								</tr>
								<tr>
									<td>Surname</td>
									<td><?php echo $row['surname']; ?></td>
								</tr>
								<tr>
									<td>Username</td>
									<td><?php echo $row['username']; ?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><?php echo $row['gender']; ?></td>
								</tr>
								<tr>
									<td>Phone Number</td>
									<td><?php echo $row['phone']; ?></td>
								</tr>
								<tr>
									<td>APPONTMENT DATE</td>
									<td><?php echo $row['appointment_date']; ?></td>
								</tr>
								<tr>
									<td>SYMPTOMS</td>
									<td><?php echo $row['symptoms']; ?></td>
								</tr>
								<tr>
									<td>DATE BOOKED</td>
									<td><?php echo $row['date_booked']; ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<h5 class="text-center">INVOICE</h5>
							<?php
								if (isset($_POST['send'])) {
									$fee = $_POST['fee'];
									$des = $_POST['des'];
									if (empty($fee)) {
										
									}elseif (empty($des)) {
										
									}else{
										$doc = $_SESSION['doctors'];
										$fname = $row['firstname'];
										$query = "INSERT INTO income(`doctor`, `patient`, `date_discharge`, `amount_paid`, `description`) VALUES('$doc','$fname',NOW(),'$fee','$des')";
										$res = mysqli_query($connect,$query);
										if ($res) {
											echo "<script>alert('YOU HAVE SENT INVOICE')</script>";
											$query = mysqli_query($connect,"UPDATE appointment SET status='Discharge' WHERE id='$id'");
										}
									}
								}
							?>
							<form method="post">
								<label>FEE CHARGED</label>
								<input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">
								<br>
								<label>DESCRIPTION</label>
								<input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
								<br>
								<input type="submit" name="send" class="btn btn-info my-2" value="SEND">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>