<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PROFILE</title>
</head>
<body>
<?php
include('../INCLUDE/header.php');
include("../INCLUDE/connection.php");
$ad = $_SESSION['admin'];
$query = "SELECT * FROM admin WHERE username='$ad' ";
$res = mysqli_query($connect,$query);
while ($row = mysqli_fetch_array($res)) {
	$username = $row['username'];
	$profile = $row['profile'];
}
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
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h4><?php echo $username; ?> PROFILE</h4>
							<?php 
								if (isset($_POST['update'])) {
									$profile = $_FILES['profile']['name'];
									if (empty($profile)) {
									}else{
										$query = "UPDATE admin SET profile='$profile' WHERE username='$ad'";
										$result = mysqli_query($connect,$query);
										if ($result) {
											move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
										}
									}
								}
							?>
							<form method="post" enctype="multipart/form-data">
								<?php
									echo "<img src='img/$profile'  class='col-md-12' style='length: 150px; width: 150px;'>";
								?>
								<br><br>
								<div class="form-group">
									<label>UPDATE PROFILE</label>
									<input type="file" name="profile" class="form-control">
								</div>
								<br>
								<input type="submit" name="update" value="UPDATE" class="btn btn-success">
							</form>
						</div>
						<div class="col-md-6">
							<?php 
							if (isset($_POST['change'])) {
								$uname = $_POST['uname'];
								if (empty($uname)) {
								
								}else{
									$query = "UPDATE admin SET username='$uname' WHERE username='$ad'";
									$res = mysqli_query($connect,$query);
									if ($res) {
										$_SESSION['admin'] = $uname;
									}
								}
							}
							?>
							<form method="post" style="margin-top: 10px;">
							<h5 class="text-center my-4">CHANGE USERNAME</h5>
							<div class="form-group">
								<input type="text" name="uname" class="form-control" autocomplete="off"><br>
								<input type="submit" name="change" class="btn btn-success" value="CHANGE USERNAME">
							</form>
							<br>
							<br>
							<?php
								if (isset($_POST['update_pass'])) {
									$old_pass = $_POST['old_pass'];
									$new_pass = $_POST['new_pass'];
									$con_pass = $_POST['con_pass'];
									$error = array();
									$old = mysqli_query($connect,"SELECT * FROM admin WHERE username='$ad'");
									$row = mysqli_fetch_array($old);
									$pass = $row['password'];
									if (empty($old_pass)) {
										$error['p'] = "ENTER OLD PASSWORD";
									}elseif (empty($new_pass)) {
										$error['p'] = "ENTER NEW PASSWORD";
									}elseif (empty($con_pass)) {
										$error['p'] = "CONFIRM PASSWORD";
									}elseif ($old_pass != $pass) {
										$error['p'] = "INVALID OLD PASSWORD";
									}elseif ($new_pass != $con_pass) {
										$error['p'] = "BOTH PASSWORD DO NOT MATCH";
									}
									if (count($error)==0) {
										$query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";
										mysql_query($connect,$query);
									}
								}
								if (isset($error['p'])) {
										$e = $error['p'];
										$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
									}else{
										$show ="";
									}
									?>
							<form method="post">
								<h5 class="text-center my-4">CHANGE PASSWORD</h5>
								<div>
									<?php 
									echo $show;
									?>
								</div>
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