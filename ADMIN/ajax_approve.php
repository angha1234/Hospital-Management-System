<?php
include("../INCLUDE/connection.php");
$id = $_POST['id'];
$query = "UPDATE doctors SET status='Approved' WHERE id='$id'";
$res = mysqli_query($connect,$query);
?>