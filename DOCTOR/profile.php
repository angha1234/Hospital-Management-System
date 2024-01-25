<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DOCTORS'S PROFILE PAGE</title>
</head>
<body>
<?php
include("../INCLUDE/header.php");
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
				<?php
				include("sidenav.php");
				include("../INCLUDE/connection.php");
				?>
			</div>
			<div class="col-md-10">
				<div class="container-fluid">
					
								<?php
								$doctor = $_SESSION['doctors'];
								$query = "SELECT * FROM doctors WHERE username='$doctor'";
								$res = mysqli_query($connect,$query);
								$row = mysqli_fetch_array($res);
								if (isset($_POST['upload'])) {
									$img = $_FILES['img']['name'];
									if (empty($img)) {
										
									}else{
										$query = "UPDATE doctors SET profile='$img' WHERE username='$doctor'";
										$res = mysqli_query($connect,$query);
										if ($res) {
											move_uploaded_file($_FILES['img']['tmp_name'], "image/$img");
										}
									}
								}
								?>
								
								<div class="my-3">
									<table class="table table-bordered">
										<tr>

											<th colspan="2" class="text-center"><?php
									echo "<img src='image/".$row['profile']."' style='length: 150px; width: 150px;' class='col-md-12 my-3'>";
								?><br>DETAILS</th>
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
											<td>Email</td>
											<td><?php echo $row['email']; ?></td>
										</tr>
										<tr>
											<td>Phone Number</td>
											<td><?php echo $row['phone']; ?></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td><?php echo $row['gender']; ?></td>
										</tr>
										<tr>
											<td>Country</td>
											<td><?php echo $row['country']; ?></td>
										</tr>
										<tr>
											<td>Salary</td>
											<td><?php echo $row['salary'].""; ?></td>
										</tr>
										<tr>
											<td>Profile</td>
											<td><?php echo $row['profile'].""; ?></td>
										</tr>
									</table>
								</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>