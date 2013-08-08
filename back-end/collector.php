<?php 
class Collector
{
	public static function saveToDB($data, $type)
	{
		$con = mysqli_connect("localhost","opencart","passwd","ergonomicsdirect");

		// Check connection
		if (mysqli_connect_errno($con))
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
		if ($type == 'action') {
			$res = mysqli_query($con, "SELECT VUID FROM Analytics_VirtualUser WHERE Cookie = '".$data['cookie']."'");
			$row = mysqli_fetch_row($res);
			$vuid = $row[0];
			$sql = "INSERT INTO Analytics_PageView (VUID, URL, ActionID)
				VALUES ($vuid, '".$data['url']."', '".$data['aid']."')";
			if (!mysqli_query($con, $sql)) {
				die('Error'.mysqli_error($con));
			}
		}
		if ($type == 'user') {
			echo 'save user \n';
		}
		print_r($data);
		print_r($type);
		mysqli_close($con);
	}
}

?>
