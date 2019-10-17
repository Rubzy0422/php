<?php
	if (isset($_POST['update-submit']))
	{
		require 'dbh.inc.php';
		$username = htmlspecialchars($_POST['uid']);
		$email = htmlspecialchars($_POST['mail']);
		$password = htmlspecialchars($_POST['pwd']);
		$passwordRepeat = htmlspecialchars($_POST['pwd-repeat']);

		if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
			header("Location: ../update.php?error=emptyfields&uid=" .$username ."&mail=".$email);
			exit();
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
		{
			header("Location: ../update.php?error=invalidmailuid");
			exit();
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../update.php?error=invalidmail&uid=" .$username );
			exit();
		}
		else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../update.php?error=invaliduid&mail=" .$email);
			exit();
		}
		else if ($password !== $passwordRepeat) {
			header("Location: ../update.php?error=passwordcheck&uid=". $username. "&mail=" . $email);
			exit();
		}
		else {
			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../internal_error.php");
				exit();
			}
			else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if ($resultCheck != 1) {
					header("Location: ../update.php?error=usertaken&mail=" . $email);
					exit();
				}
				else {
					$sql = 'UPDATE users SET uidUsers = ? , emailUsers= ?, pwdUsers= ? WHERE uidUsers ="' . $username . '"';
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location ../internal_error.php");
						exit();
					}
					else {
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: ../index.php?update=success");
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else {
		header("Location: ../update.php");
		exit();
	}