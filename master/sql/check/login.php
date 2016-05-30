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
	header('Location: ../../index.php?error=3'); // take them back if they directly access the page.
	exit();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$check = mysqli_query($sql, "SELECT `ID`, `Username`, `Password`, `Email` FROM `users` WHERE `Username` = '".realEscape($_POST['username'])."' AND `Password` = '".realEscape($_POST['password'])."'") or die("failed");
		if(mysqli_num_rows($check) == 1) {
			$user = mysqli_fetch_array($check);
			$update = mysqli_query($sql, "UPDATE `users` SET `Key`= '".randomPassword()."' WHERE `Username` = '".realEscape($_POST['username'])."'") or die("Whoops Dual Authentication Failed.");
			$keycheck = mysqli_query($sql, "SELECT `Key` FROM `users` WHERE `Username` = '".realEscape($_POST['username'])."' AND `Password` = '".realEscape($_POST['password'])."'") or die("failed");
			$key = mysqli_fetch_array($keycheck);
			$binfo = mysqli_query($sql, "SELECT `Email` FROM `Info`") or die("Database Error: #4305");
			$info = mysqli_fetch_array($binfo);
			$_SESSION['user_id'] = $user['ID'] or die("Failed");
			$_SESSION['user'] = $user['Username'];
			$to = $user['Email'];
			$subject = 'Your New Authentication Code';
			$message = 'Your New Authentication Code is '.$key['Key'].'';
			$headers = 'From: '.$info['Email'].'' . "\r\n" .
			    'Reply-To: '.$info['Email'].'' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers) or die('failed');
			header("Location: ../../auth.php");
		} else {
			header("Location: ../../index.php?error=1");
		}
	}
	else {
		header("Location: ../../index.php?error=2 ");
	}
	
}
?>