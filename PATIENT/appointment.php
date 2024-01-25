<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>BOOK APPOINTMENT</title>
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
				<h5 class="text-center my-2">BOOK APPOINTMENT</h5>
				<?php
					$patient = $_SESSION['patient'];
					$sel = mysqli_query($connect,"SELECT * FROM patient WHERE username='$patient'");
					$row = mysqli_fetch_array($sel);
					$firstname = $row['firstname'];
					$surname = $row['surname'];
					$username = $row['username'];
					$gender = $row['gender'];
					$phone = $row['phone'];
					if (isset($_POST['book'])) {
						$date = $_POST['date'];
						$sym = $_POST['sym'];
						if (empty($sym)) {
							
						}else{
							$query = "INSERT INTO appointment(`firstname`, `surname`, `username`, `gender`, `phone`, `appointment_date`, `symptoms`, `status`, `date_booked`) VALUES('$firstname','$surname','$username','$gender','$phone','$date','$sym','Pendding',NOW())";
							$res = mysqli_query($connect,$query);
							if ($res) {
								echo "<script>alert('YOU HAVE BOOKED AN APPOINTMENT')</script>";
							}
						}
					}
				?>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3">
							
						</div>
						<div class="col-md-6 jumbotron">
							<form method="post">
								<div class="form-group">
									<label>APPOINTMENT DATE</label>
									<input type="date" name="date" class="form-control">
								</div>
								<div class="form-group">
									<label>SYMPOTMS</label>
									<input type="text" name="sym" class="form-control" autocomplete="off" placeholder="ENTER SYMPOTMS">
								</div>
								<br>
								<input type="submit" name="book" value="BOOK APPOINTMENT" class="btn btn-info my-2">
							</form>	
						</div>
						<div class="col-md-3">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>