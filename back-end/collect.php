<?php
include 'collector.php';
include 'mongoCollector.php';

$collector = 'MongoCollector';

if (isset($_REQUEST['url'])) {
	$collector::saveToDB($_REQUEST, 'action');
}
else {
	if (isset($_REQUEST['cookie'])) {
		$collector::saveToDB($_REQUEST, 'user');
	}
}

?>
