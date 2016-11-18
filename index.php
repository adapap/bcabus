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

$locations = array();

$len = count($jsonHtml->valueRanges[0]->values);
for($i = 1; $i<$len; $i++) {
   array_push($locations, ($jsonHtml->valueRanges[0]->values[$i][0]));
}

$len = count($jsonHtml->valueRanges[2]->values);
for($i = 1; $i<$len; $i++) {
    array_push($locations ,$jsonHtml->valueRanges[2]->values[$i][0]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags/Site Setup -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BCA Bus</title>

    <!-- Bootstrap/JQuery/Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script src="bcabus.js"></script>

</head>

<body>
<!-- Temporary Setup -->
<div style="padding: 15px" class="sitewrap container-fluid">
    <div class="row">
        <div style="font-size: 36px" class="timeDisplay row col-md-4">It is now 4:15PM.</div>
        <input autofocus type="text" placeholder="Search for towns here..." style="border: 1px solid black; font-size: 16px" class="search col-md-8 col-md-offset-4 container-fluid text-md-right"></input>
    </div>
    <div class="data row container-fluid">
        <button style="float: left" onclick="getTowns()">Get Towns</button>
        <button style="float: right" onclick="getLocations()">Get Locations</button>
        <div style="float: left, width: 40%" class="townDisplay"></div>
        <div style="float: right" class="locationDisplay"></div>
    </div>
</div>
<!-- Card Sample -->
<div class="card-container container-fluid">
    <?php foreach ($locations as $items){ ?>
    <div class="col-md-3">
        <div id="ABC" class="card">
            <div class="card-header text-xl-center"><h4><?php echo($items); ?></h4></div>
            <div class="card-block text-md-center"><h2>G2</h2></div>
        </div>
    </div>
    <?php } ?>
</div>
</body>
<style>
    .card {
        box-shadow: 3px 5px 10px lightgray;
    }
    .card-block {
        background: #eee;
        text-shadow: 3px 5px 20px azure;
    }
    .card-header {
        background: darkblue;
        color: white;
        text-shadow: 3px 5px 30px white;
    }
</style>
</html>
