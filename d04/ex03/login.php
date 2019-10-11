<?php
include 'auth.php';
session_start();
if (auth($_GET['login'], $_GET['passwd']) == TRUE){
	echo "OK\n";
	$_SESSION['loggued_on_user'] = $_GET['login'];
}else{
	echo "ERROR\n";
	$_SESSION['loggued_on_user'] = "";
}
?>
