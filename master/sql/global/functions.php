<?php
function realEscape($string)
{
	global $sql;
	if(get_magic_quotes_gpc())
	{
		return mysqli_real_escape_string($sql, stripslashes($string));
	}
	else
	{
		return mysqli_real_escape_string($sql, $string);
	}
}
function redirect($url)
{
	echo "<script>location.href = '".$url."';</script>";
	exit();
}
function Encrypt($string) {
	return hash('Whirlpool', $string);
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}