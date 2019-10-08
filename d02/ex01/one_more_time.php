#!/usr/bin/php
<?php

function one_more_time($arg)
{
	$day_str = array(
	"lundi"					=> 0,
	"mardi"					=> 1,
	"mercredi"				=> 2,
	"jeudi"					=> 3,
	"vendredi"				=> 4,
	"samedi"				=> 5,
	"dimanche"				=> 6
	);
	$month_str = array(
	"janvier"				=> [1, 31],
	"février"				=> [2, 28],
	"fevrier"				=> [2, 28],
	"mars"					=> [3, 31],
	"avril"					=> [4, 30],
	"mai"					=> [5, 31],
	"juin"					=> [6, 30],
	"juillet"				=> [7, 31],
	"août"					=> [8, 31],
	"aout"					=> [8, 31],
	"septembre"				=> [9, 30],
	"octobre"				=> [10, 31],
	"novembre"				=> [11, 30],
	"décembre"				=> [12, 31],
	"decembre"				=> [12, 31]
	);
	$matches = [];
	
	date_default_timezone_set("Europe/Paris");
	if (!preg_match('/^([a-zA-Z][a-z]+) (\d{1,2}) ([a-zA-Z][ûéa-z]+) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/', $arg, $matches)
		|| !isset($day_str[strtolower($matches[1])])
		|| !isset($month_str[($month = strtolower($matches[3]))])
		|| ($day = intval($matches[2])) > $month_str[$month][1]
		|| ($year = intval($matches[4])) < 1970
		|| ($hour = intval($matches[5])) >= 24
		|| ($min = intval($matches[6])) >= 60
		|| ($sec = intval($matches[7])) >= 60
		|| ($t = mktime($hour, $min, $sec, $month_str[$month][0], $day, $year)) === FALSE)
		return (FALSE);
	echo "$t\n";
	return (TRUE);
}
if ($argc > 1 && !one_more_time($argv[1]))
	echo "Wrong Format\n";
?>