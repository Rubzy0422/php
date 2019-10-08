#!/usr/bin/php
<?php
	unset($argv[0]);
	if ($argc > 1) {
		$stripped = trim($argv[1]);
		echo $stripped . "\n";
	}
?>