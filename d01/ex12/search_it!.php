#!/usr/bin/php
<?php
	if ($argc < 3)
		exit();
	else
	{
		unset($argv[0]);
		$check = $argv[1];
		unset($argv[1]);

		foreach ($argv as $arg)
		{
			$s = explode(":", $arg);
			if ($s[0] == $check)
				$out = $s[1] . "\n";
		}
		echo $out;
	}
?>