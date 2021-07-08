<?php

// echo 'string';
// require_once 'config/session.php';
require_once('config/session.php');

if (isset($_SESSION['userID'])) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.location = '" . base_url . "dashboard';
    </SCRIPT>");
	exit;
} 