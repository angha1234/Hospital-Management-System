<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TOTAL APPOINTMENT</title>
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
				<h5 class="text-center">TOTAL APPOINTMENT</h5>
				<?php
					$query = "SELECT * FROM appointment WHERE status='Pendding'";
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
						<th scope='col'>GENDER</th>
						<th scope='col'>PHONE</th>
						<th scope='col'>APPOINTMENT DATE</th>
						<th scope='col'>SYMPTOMS</th>
						<th scope='col'>DATE BOOKED</th>
						<th scope='col'>ACTION</th>
						</tr>
						</thead>
						<tbody>
					";
					if (mysqli_num_rows($res) < 1) {
						$output .="
							<tr>
							<td colspan='10' class='text-center'>NO APPOINTMENT YET.</td>
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
							<td>".$row['gender']."</td>
							<td>".$row['phone']."</td>
							<td>".$row['appointment_date']."</td>
							<td>".$row['symptoms']."</td>
							<td>".$row['date_booked']."</td>
							<td>
								<a href='discharge.php?id=".$row['id']."'>
									<button class='btn btn-info'>CHECK</button>
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