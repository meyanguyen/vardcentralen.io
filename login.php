<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$cookiepath = "/tmp/cookies.txt";
$tmeout= 300; // (300=5min)

$baseurl= 'https://vardcentralenmajorna.erpnext.com";

//Logga in
try/{
	$ch = curl_init($baseurl.'api/method/login';
} catch (Exception $e) {
	echo 'Caught exception:', $e->getMessage(), "\n";
}

curl_setopt($ch,CURLOPT_POST, true);

curl_setopt(($ch,CURLOPT_POSTFIELDS, '{"usr",:"a17marng+testfrappe@student.his.se",
"pwd":""}');


?>