<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MY INVOICE</title>
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
				<h5 class="text-center my-2">MY INVOICE</h5>
				<?php
					$pat = $_SESSION['patient'];
					$query = "SELECT * FROM patient WHERE username='$pat'";
					$res = mysqli_query($connect,$query);
					$row = mysqli_fetch_array($res);
					$fname = $row['firstname'];
					$querys = mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname'");
					$output = "";
					$output .= "
						<table class='table table-bordered table-hover'>
						<thead>
						<tr>
						<th scope='col'>ID</th>
						<th scope='col'>DOCTOR</th>
						<th scope='col'>PATIENT</th>
						<th scope='col'>DATE DISCHARGE</th>
						<th scope='col'>AMOUNT PAID</th>
						<th scope='col'>DESCRIPTION</th>
						<th scope='col'>ACTION</th>
						</tr>
						</thead>
						<tbody>
					";
					if (mysqli_num_rows($querys) < 1) {
						$output .="
							<tr>
							<td colspan='10' class='text-center'>NO INVOICE YET.</td>
							</tr>
						";
					}
					while ($row = mysqli_fetch_array($querys)) {
						$output .="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['doctor']."</td>
							<td>".$row['patient']."</td>
							<td>".$row['date_discharge']."</td>
							<td>".$row['amount_paid']."</td>
							<td>".$row['description']."</td>
							<td>
							<a href='view.php?id=".$row['id']."'>
							<button class='btn btn-info'>VIEW</button>
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
</body>
</html>