#!/usr/bin/php
<?php
	
	function is_word($str)
	{
		return strlen($str) > 1;
	}

	if ($argc > 1)
	{
		$words = array_filter(explode(" ", $argv[1]), is_word);
		if (count($words) > 1)
		{
			$del = array_splice($words, 0, 1);
			$words = array_merge($words, $del);
		}
		$str = implode(" ", $words);
		echo $str . "\n";
	}
?>