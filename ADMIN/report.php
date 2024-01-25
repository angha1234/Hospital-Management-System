<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TOTAL REPORT</title>
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
				<h5 class="text-center my-2">TOTAL REPORT</h5>
				<?php  
					$query = "SELECT * FROM report";
					$res = mysqli_query($connect,$query);
					$output = "";
					$output .= "
					<table class='table table-bordered table-hover'>
						<thead>
						<tr>
						<th scope='col'>ID</th>
						<th scope='col'>TITLE</th>
						<th scope='col'>MESSAGE</th>
						<th scope='col'>USERNAME</th>
						<th scope='col'>DATE SEND</th>
						</tr>
						</thead>
						<tbody>
					";
					if (mysqli_num_rows($res) < 1) {
						$output .="
							<tr>
							<td colspan='6' class='text-center'>NO REPORT YET.</td>
							</tr>
						";
					}
					while ($row = mysqli_fetch_array($res)) {
						$output .="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['title']."</td>
							<td>".$row['message']."</td>
							<td>".$row['username']."</td>
							<td>".$row['date_send']."</td>
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