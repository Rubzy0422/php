<?php
	if (!$_POST['login'] && !$_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK") {
		echo "ERROR\n";
		exit();
	}
	if (!file_exists("private/")) {
		mkdir("./private");
		if (!file_exists("./private/passwd")) {
			file_put_contents("./private/passwd", "");
		}
	}
	else {
		$users = unserialize(file_get_contents('../private/passwd'));
		if ($users) {
			foreach ($users as $user => $tmp) {
				if ($tmp['login'] === $_POST['login'])
				{
					echo "ERROR\n";
					exit();
				}
			}
		}
	}
	$data = serialize(array("login", $_POST['login'], "passwd", hash("sha512", $_POST['passwd'])));
	file_put_contents("./private/passwd", $file . $data . PHP_EOL);
?>
