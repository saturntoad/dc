<?php 
$con = mysqli_connect("localhost","opencart","passwd","ergonomicsdirect");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$res = mysqli_query($con, "SELECT VUID FROM Analytics_VirtualUser WHERE Cookie = '".$_REQUEST['cookie']."'");
if ($res) {
	echo 'exist';
}
else {
	echo 'error';
}
mysqli_close($con);

?>
