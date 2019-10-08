#!/usr/bin/php
<?php
	unset($argv[0]);
	
	$arr = array();

	foreach ($argv as $val)
	{
		$explode = explode(" ", $val);
		$arr = array_merge($arr, $explode);
	}
	sort($arr, SORT_ALPHA | SORT_FLAG_CASE);
	natcasesort($arr);
	foreach ($arr as $item) {
		echo $item . "\n";
	}

	// sort alpha then num rest in ascii

?>