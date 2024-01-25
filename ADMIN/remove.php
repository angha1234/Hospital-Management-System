<?php
include("../INCLUDE/connection.php");
$id = $_GET['id'];
$query = "DELETE FROM admin WHERE id='$id'";
$res = mysqli_query($connect,$query);
?>