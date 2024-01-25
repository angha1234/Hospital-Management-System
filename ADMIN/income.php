<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TOTAL INCOME</title>
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
				<h5 class="text-center my-2">TOTAL INCOME</h5>
				<?php  
					$query = "SELECT * FROM income";
					$res = mysqli_query($connect,$query);
					$output = "";
					$output .= "
					<table class='table table-bordered table-hover'>
						<thead>
						<tr>
						<th scope='col'>ID</th>
						<th scope='col'>DOCTOR</th>
						<th scope='col'>PATIENT</th>
						<th scope='col'>DISCHARGE DATE</th>
						<th scope='col'>AMOUNT PAID</th>
						</tr>
						</thead>
						<tbody>
					";
					if (mysqli_num_rows($res) < 1) {
						$output .="
							<tr>
							<td colspan='5' class='text-center'>NO PATIENT DISCHARGE YET</td>
							</tr>
						";
					}
					while ($row = mysqli_fetch_array($res)) {
						$output .="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['doctor']."</td>
							<td>".$row['patient']."</td>
							<td>".$row['date_discharge']."</td>
							<td>".$row['amount_paid']."</td>
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