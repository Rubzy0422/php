#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		exit();
	}
	$num1 = trim($argv[1], " \t");
	$num2 = trim($argv[3], " \t");
	$op = trim($argv[2], " \t");
	
	switch ($op) {
		case ("*"):
			echo $num1 * $num2;
			break ;
		case ("/"):
			echo $num1 / $num2;
			break ;
		case ("+"):
			echo $num1 + $num2;
			break ;
		case ("-"):
			echo $num1 - $num2;
			break ;
		case ("%"):
			echo $num1 % $num2;
			break ;
	}
	echo "\n";
?>