<?php
include 'collector.php';
include 'mongoCollector.php';

$collector = 'Collector';

if (isset($_REQUEST['url'])) {
	$collector::saveToDB($_REQUEST, 'action');
}
else {
	if (isset($_REQUEST['cookie'])) {
		$collector::saveToDB($_REQUEST, 'user');
	}
}

?>
