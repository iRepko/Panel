
<?php
require('../global/database.php');
require('../global/functions.php');

$query = mysqli_query($sql, "SELECT * FROM `virtuals` WHERE `ID` = '".RealEscape($_POST['vID'])."'");
while($virtual = mysqli_fetch_array($query)) {

	$server = mysqli_query($sql, "SELECT * FROM `servers` WHERE `ID` = '".RealEscape($virtual['sID'])."'");
	while($sever = mysqli_fetch_array($query)) {
		$host    = $server['IP'];
		$port    = $server['Port'];
		$vID = $_GET['vID'];
		$command = $_GET['Command'];
		$message = $command." ".$vID;
		echo $message;
		$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
		socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
		$result = socket_read ($socket, 1024) or die("Could not read server response\n");
		echo "Reply From Server  :".$result;
		socket_close($socket);   
		}
	}
?>
