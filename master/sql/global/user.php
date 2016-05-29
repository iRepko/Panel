
<?php
	require ('database.php');
	$query= mysqli_query($sql, "SELECT * FROM `users` WHERE `ID` = '".$_SESSION['user_id']."'");
	$user = mysqli_fetch_array($query);
	$num = mysqli_num_rows($query);
?>
