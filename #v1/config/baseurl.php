<?php

require_once('env.php');

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);


if (ENVIRONMENT == 'development') {
    // http://localhost/<nama folder>/<nama function>
   $base_url = $url[0] . '//' . $url[2] . '/' . $url[3] . '/';
   $assets_url = $url[0] . '//' . $url[2] . '/' . $url[3] . '/assets/';

} else {
   // for server 
   // http://<server name>/<nama folder>/<nama function>
   $base_url = $url[0] . '//' . $url[2] . '/' . $url[3] . '/';
   $assets_url = $url[0] . '//' . $url[2] . '/' . $url[3] . '/assets/';

} 

define('base_url', $base_url);
define('assets_url', $assets_url);