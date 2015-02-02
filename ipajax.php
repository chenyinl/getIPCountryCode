<?php
include "ip.functions.php";
$ip = getIPAddress();
$country = getCountryCode( $ip );
$data = array(
	"ip"=>$ip,
	"country" => $country
);
header('Access-Control-Allow-Origin: *');
$callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

echo ($callback ? $callback . '(' : '') . json_encode($data) . ($callback ? ')' : '');


