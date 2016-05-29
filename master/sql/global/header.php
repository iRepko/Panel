<?php
session_start();
require('config_file.php'); // always make sure this is at the top.
require('database.php');
require('functions.php');
require('user.php');
date_default_timezone_set($config['system']['timezone']);
?>