<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE PROFILE</title>
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
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
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
								<form method="post" enctype="multipart/form-data">
								<?php
									echo "<img src='image/".$row['profile']."' style='height: 250px;' class='col-md-12 my-3'>";
								?>
								<input type="file" name="img" class="form-control my-1">
								<br>
								<input type="submit" name="upload" class="btn btn-success" value="UPDATE PROFILE">
								</form>
								
							</div>
							<div class="col-md-6">
								<h5 class="text-center my-2">CHANGE USERNAME</h5>
								<?php
								if (isset($_POST['change_uname'])) {
									$uname = $_POST['uname'];
									if (empty($uname)) {
										
									}else{
										$query = "UPDATE doctors SET username='$uname' WHERE username='$doctor' ";	
										$res = mysqli_query($connect,$query);
										if ($res) {
											$_SESSION['doctors'] = $uname;
										}								
									}
								}
								?>
								<form method="post">
									<label>CHANGE USERNAME</label>
									<input type="text" name="uname" class="form-control" autocomplete="off">
									<br>
									<input type="submit" name="change_uname" class="btn btn-success" value="CHANGE USERNAME">
								</form>
								<br>
								<br>
								<h5 class="text-center my-2">CHANGE PASSWORD</h5>
								<?php
									if (isset($_POST['update_pass'])) {
										$old = $_POST['old_pass'];
										$new = $_POST['new_pass'];
										$con = $_POST['con_pass'];
										$ol = "SELECT * FROM doctors WHERE username='$doctor'";
										$ols = mysqli_query($connect,$ol);
										$row = mysqli_fetch_array($ols);
										if (empty($old)) {
											echo "<script>alert('ENTER OLD PASSWORD')</script>";
										}
										else if ($old != $row['password']) {
											echo "<script>alert('CHECK THE PASSWORD')</script>";
										}elseif (empty($new)) {
											echo "<script>alert('ENTER NEW PASSWORD')</script>";
										}elseif ($con != $new) {
											echo "<script>alert('BOTH PASSWORD DO NOT MATCH')</script>";
										}else {
											$query = "UPDATE doctors SET password='$new' WHERE username='$doctors'";
											$res = mysqli_query($connect,$query);
										}
									}
								?>
								<form method="post">
								<div class="form-group">
									<label>OLD PASSWORD</label>
									<input type="password" name="old_pass" class="form-control">
								</div>
								<div class="form-group">
									<label>NEW PASSWORD</label>
									<input type="password" name="new_pass" class="form-control">
								</div>
								<div class="form-group">
									<label>CONFIRM PASSWORD</label>
									<input type="password" name="con_pass" class="form-control">
								</div><br>
								<input type="submit" name="update_pass" class="btn btn-info" value="UPDATE PASSWORD">
							</form>
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