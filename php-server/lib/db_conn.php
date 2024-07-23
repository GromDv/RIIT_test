<?php
$link = mysqli_connect("localhost","admin","secret88");
if (!$link)
{
	die("Error in DB connection: ".mysqli_connect_errno()."-".mysqli_connect_error());
}  
?>
