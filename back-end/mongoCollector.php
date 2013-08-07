<?php 

class MongoCollector extends Collector {
	public static function saveToDB($data, $type) {
		echo 'Saved by Mongo'; 
		// connect
		$m = new MongoClient();

		// select a database
		$db = $m->ed;
		
		if ($type == 'action') {
			echo 'Save action';
			// select a collection (table)
			$collection = $db->pageview;
		}       
		if ($type == 'user') {
		        echo 'save user';
			$collection = $db->virtualuser;
		} 
		$collection->insert($data);
	        print_r($data);
	        print_r($type);
	}
}


?>
