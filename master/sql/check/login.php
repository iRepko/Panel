<?php
session_start();
require ('../global/database.php');
require ('../global/functions.php');
require ('../global/config_file.php');
if(isset($_SERVER['HTTP_CF_CONNECTING_IP']))
{
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

if(!isset($_POST['username']) && !isset($_POST['password']))
{
	header('Location: ../../index.php?error'); // take them back if they directly access the page.
	exit();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$check = mysqli_query($sql, "SELECT `ID`, `Username`, `Password` FROM `users` WHERE `Username` = '".realEscape($_POST['username'])."' AND `Password` = '".realEscape($_POST['password'])."'") or die("failed");
		if(mysqli_num_rows($check) == 1) {
			$user = mysqli_fetch_array($check);
			
			$_SESSION['user_id'] = $user['ID'];
			$_SESSION['user'] = $user['Username'];
			header("Location: ../../home.php");
		} else {
			header("Location: ../../index.php?error=1");
		}
	}
	else {
		header("Location: ../../index.php?error=2 ");
	}
	
}
?>