<?php
	session_start();
	if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] === "OK"){
		$_SESSION["login"] = $_GET['login'];
		$_SESSION["passwd"] = $_GET['passwd'];
	}
?>

<html><body>
<form action="index.php" method="get">
	Username: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" />
	Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
	<input type="submit" value="OK" name="submit" />
</form>
</body></html>