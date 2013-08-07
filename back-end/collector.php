<?php 
class Collector
{
	public static function saveToDB($data, $type)
	{
		if ($type == 'action') {
			echo 'Save action \n';
		}
		if ($type == 'user') {
			echo 'save user \n';
		}
		print_r($data);
		print_r($type);
	}
}

?>
