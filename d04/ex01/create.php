<?php
	if (!$_POST['login'] && !$_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK"){
		echo "ERROR\n";
		exit();
	}
	$file = file_get_contents('./private/passwd');
	if (!file_exists("private/")){
		mkdir("./private");
		if (!file_exists("./private/passwd")){
			file_put_contents("./private/passwd", "");
		}
	}
	// else {
	// 	$users = unserialize(file_get_contents('../private/passwd'));
	// 	if ($users){
	// 		$exist = 0;
	// 		foreach ($users as $user => $v){
	// 			if ($v['login'] === $_POST['login'])
	// 				$exist = 1;
	// 			if ($exist){
	// 				echo "ERROR\n";
	// 				exit();
	// 			}
	// 		}
	// 	}														SOMEONE FIX REUBENS CODE
		$data = serialize(array("login", $_POST['login'], "passwd", hash("sha512", $_POST['passwd'])));
		file_put_contents("./private/passwd", $file . $data . PHP_EOL);
	}
?>
