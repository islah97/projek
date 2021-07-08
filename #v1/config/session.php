<?php

require_once('baseurl.php');

session_start();

if (!isset($_SESSION['userID'])) {
	session_destroy();
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.location = '" . base_url . "login';
    </SCRIPT>");
	exit;
} 