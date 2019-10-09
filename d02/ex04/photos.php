#!/usr/bin/php
<?php

	if ($argv > 1)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $argv[1]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		echo $output;
	//	"<a\s+(?:[^>]*?\s+)?href=(["'])(.*?)\1"
		preg_match_all("/(<img src=\".*\")/i", $file);
		foreach ($file as $img)
			echo $img;
	}

?>