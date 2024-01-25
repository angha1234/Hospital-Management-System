<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ALL ADMIN</title>
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
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<br>
							<h5 class="text-center">ALL ADMINS</h5>
							<?php
				$query = "SELECT * FROM admin";
				$res = mysqli_query($connect,$query);
					$output = "";
					$output .= "
						<table class='table table-bordered table-hover'>
						<thead>
						<tr>
						<th scope='col'>ID</th>
						<th scope='col'>USERNAME</th>
						<th scope='col'>PASSWORD</th>
						<th scope='col'>PROFILE</th>
						<th scope='col' style='width: 10%'>ACTION</th>
						</tr>
						</thead>
						<tbody>
					";
					if (mysqli_num_rows($res) < 1) {
						$output .="
							<tr>
							<td colspan='10' class='text-center'>NO ADMIN YET.</td>
							</tr>
						";
					}
					while ($row = mysqli_fetch_array($res)) {
						$output .="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['username']."</td>
							<td>".$row['password']."</td>
							<td>".$row['profile']."</td>
							<td>
							<a href='remove.php?id=".$row['id']."'>
							<button class='btn btn-danger'>REMOVE</button>
							</a>
							</td>
						";
					}
					$output .= "
						</tbody>
						</table>
					";
					echo $output;
				?>
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


				