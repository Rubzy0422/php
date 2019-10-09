#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');

	$arr_month = array(
		1 => "janvier",
		2 => "février",
		3 => "mars",
		4 => "avril",
		5 => "mai",
		6 => "juin",
		7 => "juillet",
		8 => "août",
		9 => "septembre",
		10 => "octobre",
		11 => "novembre",
		12 => "décembre");
		
	$arr_week = array(
		1 => "lundi",
		2 => "mardi",
		3 => "mercredi",
		4 => "jeudi",
		5 => "vendredi",
		6 => "samedi",
		7 => "dimanche");

	function filter($str)
	{
		$ret = array_filter(preg_split('/\s+/', $str));
		return ($ret);
	}

	if ($argc != 2)
	{
		"Wrong Format\n";
		exit();
	}
	else {
		$split = filter(trim($argv[1], " "));
		if (count($split) == 5)
		{
			$week_day = $split[1];
			$day_name = array_search(strtolower($split[0]), $arr_week);
			$month = array_search(strtolower($split[2]), $arr_month);
			if ($month == FALSE || $day_name == FALSE)
			{
				echo "Wrong Format\n";
				exit();
			}
			$year = $split[3];
			$time = $split[4];
			if (!preg_match('/^(?:[2][0-4]|[01][1-9]|10):([0-5][0-9]):([0-5][0-9])$/', $time))
			{
				"Wrong Format\n";
				exit();
			}
			$str_time = preg_split("/:/", $time);
			$time = mktime($str_time[0], $str_time[1], $str_time[2], $month, $day_name, $year) . "\n";
			echo $time;
		}
		else
			echo "Wrong Format\n";
	}
?>