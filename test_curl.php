<?php
$url = "http://www.armyshop.xn.pl";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
$result = curl_exec($ch);

print_r( curl_getinfo($ch) );

curl_close($ch);

var_dump($result);
?>