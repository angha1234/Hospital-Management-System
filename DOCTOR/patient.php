<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TOTAL PATIENT</title>
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
				<h5 class="text-center">TOTAL PATIENT</h5>
				<?php
					$query = "SELECT * FROM patient";
					$res = mysqli_query($connect,$query);
					$output = "";
					$output .= "
						<table class='table table-bordered table-hover'>
						<thead>
						<tr>
						<th scope='col'>ID</th>
						<th scope='col'>FIRSTNAME</th>
						<th scope='col'>SURNAME</th>
						<th scope='col'>USERNAME</th>
						<th scope='col'>EMAIL</th>
						<th scope='col'>PHONE</th>
						<th scope='col'>GENDER</th>
						<th scope='col'>COUNTRY</th>
						<th scope='col'>DATE REGISTERED</th>
						<th scope='col'>ACTION</th>
						</tr>
						</thead>
						<tbody>
					";
					if (mysqli_num_rows($res) < 1) {
						$output .="
							<tr>
							<td colspan='10' class='text-center'>NO PATIENT YET.</td>
							</tr>
						";
					}
					while ($row = mysqli_fetch_array($res)) {
						$output .="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['firstname']."</td>
							<td>".$row['surname']."</td>
							<td>".$row['username']."</td>
							<td>".$row['email']."</td>
							<td>".$row['phone']."</td>
							<td>".$row['gender']."</td>
							<td>".$row['country']."</td>
							<td>".$row['date_reg']."</td>
							<td>
								<a href='view.php?id=".$row['id']."'>
									<button class='btn btn-info'>VIEW</button>
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
</body>
</html>