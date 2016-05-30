
<?php
require('../global/database.php');
require('../global/functions.php');

$query = mysqli_query($sql, "SELECT * FROM `virtuals` WHERE `ID` = '".RealEscape($_GET['ID'])."'");
while($virtual = mysqli_fetch_array($query)) {
	$query = mysqli_query($sql, "SELECT * FROM `Servers` WHERE `ID` = '".RealEscape($virtual['sID'])."'");
	while($server = mysqli_fetch_array($query)) {
		redirect('home.php?success=1');
		}
	}
?>
