#!/usr/bin/php
<?php
	unset($argv[0]);
	$arr = array();
	foreach ($argv as $val)
	{
		$explode = explode(" ", $val);
		$arr = array_merge($arr, $explode);
	}
	function comparatororor($a, $b)
	{
		$lp = 0;
		$line = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		while (($lp < strlen($a)) || ($lp < strlen($b)))
		{
			$lp_a = stripos($line, $a[$lp]);
			$lp_b = stripos($line, $b[$lp]);
			if ($lp_a > $lp_b)
				return (1);
			elseif ($lp_a < $lp_b)
				return (-1);
			else
				$lp++;
		}
	}
	usort($arr, "comparatororor");
	foreach ($arr as $item) {
		echo $item . "\n";
	}
?>