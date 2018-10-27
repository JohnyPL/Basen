<?php
/**
 * filename: data.php
 * description: this will return the score of the teams.
 */

//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'sql213.epizy.com');
define('DB_USERNAME', 'epiz_21434405');
define('DB_PASSWORD', 'latawiec18');
define('DB_NAME', 'epiz_21434405_baseny');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT CONCAT( LEFT( Godzina, 2 ) ,  ':00' ) AS  'Godz', ROUND( AVG( ilosc ) ) AS srednia
FROM  wejscia
GROUP BY Godz");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);