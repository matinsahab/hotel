<?php 	
ob_start();
session_start();
require('conn.php');
include('cashiertop.php');



	$command =	"SELECT * FROM `passenger-details`";
	$query = mysqli_query($con, $command);
	if($query) echo "Successfully Inserted Customer";

?>