<?php
require('../global/database.php');
require('../global/functions.php');
$query = mysqli_query($sql, "SELECT * FROM `users` WHERE `Email` = '".$_POST['email']."'") or die("Error!");
$update = mysqli_query($sql, "UPDATE `users` SET `Password`= '".Encrypt(RandomPassword())."' WHERE `Email` = '".$_POST['email']."'") or die("Password reset failed");
$infd = mysqli_fetch_array($query, MYSQLI_BOTH);
$inf = array_reverse($infd);

$from = "Email from ".$_POST['email'];
$body = "
<html><p><img src=\"http://repkonetworks.com/img/logo.png\"></p><br>";
$body = "<center><p>Thank you for contacting Repko Networks!</p>";
$body .= "<p>Your new password is ".RandomPassword()."</p>";
$body .= "<p>Didn't request your password? Contact our Support Department.</p></center></html>";
$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: contact@repkonetworks.com';
mail($_POST['email'], 'Thank You for contacting Repko Networks!', $body, $headers) or die("Failed");


?>