<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD ADMINS</title>
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
					include("SIDENAV.php");
					include("../INCLUDE/connection.php")
				?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12 my-2 jumbotron">
							<?php
								if (isset($_POST['add'])) {
									$uname = $_POST['uname'];
									$pass = $_POST['pass'];
									$image = $_FILES['img']['name'];
									$error = array();
									if (empty($uname)) {
										$error['u'] = "ENTER ADMIN USERNAME";
									}elseif (empty($pass)) {
										$error['u'] = "ENTER ADMIN PASSWORD";
									}elseif (empty($image)) {
										$error['u'] = "ENTER ADMIN PICTURE";
									}
									if (count($error) ==0) {
										$query = "INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')";
										$res = mysqli_query($connect,$query);
										if ($res) {
											
										}
										else{
											move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
										}
									}
									
								}
							?>
							<h5 class="text-center">ADD ADMINS</h5>
							<form method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>USERNAME</label>
									<input type="text" name="uname" class="form-control" autocomplete="off">
								</div>
								<div class="form-group">
									<label>PASSWORD</label>
									<input type="text" name="pass" class="form-control" autocomplete="off">
								</div>
								<div class="form-group">
									<label>ADD ADMIN PICTURE</label>
									<input type="file" name="img" class="form-control">
								</div>
								<input type="submit" name="add" value="ADD NEW ADMIN" class="btn btn-success">
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