<?php
/**
 * Created by PhpStorm.
 * User: luklas
 * Date: 11/18/16
 * Time: 3:31 PM
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1S5v7kTbSiqV8GottWVi5tzpqLdTrEgWEY4ND4zvyV3o/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));

//echo(print_r($jsonHtml->valueRanges));

$len = count($jsonHtml->valueRanges[0]->values);
for($i = 0; $i<$len; $i++) {
   echo($jsonHtml->valueRanges[0]->values[$i][0] . "<br>");
}

$len = count($jsonHtml->valueRanges[2]->values);
for($i = 0; $i<$len; $i++) {
    echo($jsonHtml->valueRanges[2]->values[$i][0] . "<br>");
}


?>