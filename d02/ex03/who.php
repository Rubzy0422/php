#!/usr/bin/php
<?php
	date_default_timezone_set('Africa/Johannesburg');
	
	$file = fopen("/var/run/utmpx", "r") or die("Unable to open file!");
	while ($data = fread($file, 628))
	{
		if (strlen($data) != 628)
			break ;
		$data = unpack("Z256name/Z4garbage/Z32line/Igarbage2/Itype/ltime", $data);
		if ($data["type"] == 7)
			printf("%-8s %-8s %s\n", $data["name"], $data["line"], strftime("%b %e %H:%M", $data["time"]));
	}
/*
	https://code.woboq.org/userspace/glibc/sysdeps/gnu/bits/utmpx.h.html
	https://www.geeksforgeeks.org/php-unpack-function/
	
	size of fields in data 
	
		Null padded (Z)
		unsigned integer (I)
		signed long (l)
	256 for name 
		
	4 for garbage (Z)
	32 for line data
	2 for garbage
	types
	time
*/
