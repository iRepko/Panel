<?php

$host = "#";
$user = "#";
$pass = "#";
$db = "#";

$sql = new mysqli($host, $user, $pass, $db);

 if($sql->connect_errno) {
	die("<center><span style=\"font-weight:bold;font-style:italic;color:#FF0000;\">connection error: </span></center>".$sql->connect_errno);
} 


?>