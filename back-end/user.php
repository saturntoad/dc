<?php 
$con = mysqli_connect("localhost","opencart","passwd","ergonomicsdirect");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con, "INSERT INTO Analytics_VirtualUser (Cookie, UID) 
VALUES ('".$_REQUEST['cookie']."', '".$_REQUEST['uid']."')");
mysqli_close($con);

?>
