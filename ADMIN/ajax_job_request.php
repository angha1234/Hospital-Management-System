<?php
include("../INCLUDE/connection.php");
$query = "SELECT * FROM doctors WHERE status='Pendding' ORDER BY date_reg ASC";
$res = mysqli_query($connect,$query);
$output = "";
$output .="
<table class='table table-bordered table-hover'>
<thead>
<tr>
<th scope='col'>ID</th>
<th scope='col'>FIRSTNAME</th>
<th scope='col'>SURNAME</th>
<th scope='col'>USERNAME</th>
<th scope='col'>GENDER</th>
<th scope='col'>PHONE</th>
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
		<td colspan='10' class='text-center'>NO JOB REQUEST YET.</td>
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
			<td>".$row['country']."</td>
			<td>".$row['date_reg']."</td>
			<td>
				<div class='col-md-12'>
					<div class='row'>
						<div class='col-md-6'>
							<button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
						</div>
						<div class='col-md-6'>
							<button id='".$row['id']."' class='btn btn-danger reject'>Reject</button>
						</div>
					</div>
				</div>
			</td>
	";
}
$output .= "
	</tbody>
	</table>
";
echo $output;
?>
