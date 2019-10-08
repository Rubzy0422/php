#!/usr/bin/php
<?php
	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		exit();
	}

	$num_str = trim(preg_replace("/[^0-9]/", " ", $argv[1]));
	$num_str = trim(preg_replace("/\s+/", " ", $num_str));
	$nums = explode(" ", $num_str);

	$str = trim(preg_replace("/\d+/", "", $argv[1]));
	$op = trim(preg_replace("/\s+/", "", $str));

	switch ($op) {
		case ("*"):
			echo $nums[0] * $nums[1];
			break ;
		case ("/"):
			echo $nums[0] / $nums[1];
			break ;
		case ("+"):
			echo $nums[0] + $nums[1];
			break ;
		case ("-"):
			echo $nums[0] - $nums[1];
			break ;
		case ("%"):
			echo $nums[0] % $nums[1];
			break ;
		default:
			echo "Syntax Error";
	}
	echo "\n";
?>