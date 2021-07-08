<?php

require_once('baseurl.php');

if (ENVIRONMENT == 'development') {

	$db = new mysqli('localhost', 'root', '', 'mbk_ict');

} else if (ENVIRONMENT == 'testing') {

	$db = new mysqli('ipserver', 'usernameserver', '', 'mbk_ict_staging');

} else if (ENVIRONMENT == 'production') {

	$db = new mysqli('ipserver', 'usernameserver', '', 'mbk_ict_production');

}

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// set character
mysqli_set_charset($db, "utf8");