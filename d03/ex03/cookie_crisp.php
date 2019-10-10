<?php
	switch($_GET['action'])
	{
		case "set":
			setcookie($_GET['name'], $_GET['value'], time() + 3600, "/");
			break ;
		case "get":
			echo $_COOKIE[$_GET['name']];
			if ($_COOKIE[$_GET['name']])
				echo "\r\n";
			break ;
		case "del":
				setcookie($_GET['name'], $_GET['value'] , time() - 3700, "/");
	}
?>