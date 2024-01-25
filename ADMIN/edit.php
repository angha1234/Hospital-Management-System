<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT DOCTORS</title>
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
				include("SIDENAV.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center">EDIT DOCTORS</h5>
				<?php
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$query = "SELECT * FROM doctors WHERE id='$id'";
					$res = mysqli_query($connect,$query);
					$row = mysqli_fetch_array($res);
				}
				?>
				<div class="row">
					<div class="col-md-8">
						<h5 class="text-center">DOCTOR DETAILS</h5>
						<h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
						<h5 class="my-3">Firstname : <?php echo $row['firstname']; ?></h5>
						<h5 class="my-3">Surname : <?php echo $row['surname']; ?></h5>
						<h5 class="my-3">Username : <?php echo $row['username']; ?></h5>
						<h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
						<h5 class="my-3">Phone : <?php echo $row['phone']; ?></h5>
						<h5 class="my-3">Gender : <?php echo $row['gender']; ?></h5>
						<h5 class="my-3">Country : <?php echo $row['country']; ?></h5>
						<h5 class="my-3">Date Registered : <?php echo $row['date_reg']; ?></h5>
						<h5 class="my-3">Salary : <?php echo $row['salary']; ?></h5>
					</div>
					<div class="col-md-4">
						<h5 class="text-center">UPDATE SALARY</h5>
						<?php
						if (isset($_POST['update'])) {
							$salary = $_POST['salary'];
							$query = "UPDATE doctors SET salary='$salary' WHERE id='$id'";
							$res = mysqli_query($connect,$query);
						}
						?>
						<form method="post">
							<label class="my-3">ENTER DOCTOR'S SALARY</label>
							<input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary'] ?>">
							<input type="submit" name="update" class="btn btn-info my-3" value="UPDATE SALARY">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>