<?php
session_start();
require ('../global/database.php');
require ('../global/functions.php');
require ('../global/config_file.php');
if(isset($_SERVER['HTTP_CF_CONNECTING_IP']))
{
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

if(!isset($_POST['authcode']))
{
	header('Location: ../../auth.php?error=1'); // take them back if they directly access the page.
	exit();
}

if(isset($_POST['authcode'])) {
	if(!empty($_POST['authcode'])) {
		$check = mysqli_query($sql, "SELECT `ID`, `Key` FROM `users` WHERE `Username` = '".realEscape($_SESSION['user'])."' AND `Key` = '".realEscape($_POST['authcode'])."'") or die("failed");
		if(mysqli_num_rows($check) == 1) {
			$user = mysqli_fetch_array($check);
			$_SESSION['authcode'] = $_POST['authcode'];
			header("Location: ../../home.php");
		} else {
			header("Location: ../../index.php?error=4");
		}
	}
	else {
		header("Location: ../../index.php?error=2 ");
	}
	
}
?>