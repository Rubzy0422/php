<?php
	if (!$_POST['login'] && !$_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK"){
		echo "ERROR\n";
		exit();
	}
	if (!file_exists("private/")){
		mkdir("./private/");
		if (!file_exists("./private/passwd"))
			file_put_contents("passwd", "");
	}
	$data = serialize(array("login", "toto1", "passwd", "2345643654135473513654"));
?>

<!-- DATA FORMAT
a:1:
{
	i:0;
	a:2:
	{
		s:5:"login";
		s:5:"toto1";
		s:6:"passwd";
		s:128:"2bdd45b3c828273786937ac1b4ca7908a431019e8b93c9fd337317f92fac80dace29802bedc33d9259c8b55d1572cb8a6c1df8579cdaa02256099ed52a905d38";
	}
} -->
