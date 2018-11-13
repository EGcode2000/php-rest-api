<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//header('Accept: application/xml');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../../config/Database.php';

//instantiate DB and connect

$database = new Database();
$db = $database->connect();
var_dump($db);


// see https://stackoverflow.com/questions/16700960/how-to-use-curl-to-get-json-data-and-decode-the-data
//json
/*$response = file_get_contents('https://samples.openweathermap.org/data/2.5/forecast?q=M%C3%BCnchen,DE&appid=b6907d289e10d714a6e88b30761fae22');
$response = json_decode($response);
var_export($response);*/

//xml to php
/*
$xmlstring = 'https://samples.openweathermap.org/data/2.5/forecast?q=London,us&mode=xml&appid=b6907d289e10d714a6e88b30761fae22';
$xml = simplexml_load_file($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
var_export($array);
*/

/*
$url = "https://samples.openweathermap.org/data/2.5/forecast?q=London,us&mode=xml&appid=b6907d289e10d714a6e88b30761fae22";

$request = new WP_Http;
$result = $request->request($url, $data = array());
var_dump($result);*/


/*
//curl
$url= 'https://samples.openweathermap.org/data/2.5/forecast?q=London,us&mode=xml&appid=b6907d289e10d714a6e88b30761fae22'; 
//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
var_dump(json_decode($result, true));
*/

?>