<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1S5v7kTbSiqV8GottWVi5tzpqLdTrEgWEY4ND4zvyV3o/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));
//$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1qVq2lPFu_U2Uz_MDxCNfyO8GRpndgYRqpHCR9qQZV0k/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));

$locations = array();
$names = array();

$len = count($jsonHtml->valueRanges[0]->values);
for($i = 1; $i<$len; $i++) {
    array_push($names, ($jsonHtml->valueRanges[0]->values[$i][0]));
}

$len = count($jsonHtml->valueRanges[2]->values);
for($i = 1; $i<$len; $i++) {
    array_push($names ,$jsonHtml->valueRanges[2]->values[$i][0]);
}


$len = count($jsonHtml->valueRanges[0]->values);
for($i = 1; $i<$len; $i++) {
    array_push($locations , isset($jsonHtml->valueRanges[1]->values[$i][0]) ? $jsonHtml->valueRanges[1]->values[$i][0] : "Arriving");
}

$len = count($jsonHtml->valueRanges[2]->values);
for($i = 1; $i<$len; $i++) {
    array_push($locations , isset($jsonHtml->valueRanges[3]->values[$i][0]) ? $jsonHtml->valueRanges[3]->values[$i][0] : "Arriving");
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

        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
        <link rel="icon" href="favicon.ico?" type="image/x-icon">

        <title>BCA Bus</title>

        <!-- Bootstrap/JQuery/Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css" rel="stylesheet" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bcabus.css" type="text/css">
        <script src="bcabus.js"></script>

    </head>

<body>
    <!-- Temporary Setup -->
<div class="sitewrap container-fluid">
    <div class="upper-content container-fluid">
        <div class="row container-fluid">
            <div class="col-md">
                <div class="timeDisplay col-md row">It is now<span class="time">4:15PM</span>.</div>
                <div class="timeDesc col-md row">The buses will depart in <span class="timeLeft">15:00</span>.</div>
            </div>
            <input autofocus type="text" placeholder="Search for towns here..." class="search container-fluid col-md text-md-right"></input>
        </div>
    </div>
    <div class="lower-content container-fluid">
    <div class="card-container container-fluid">
    <div class="row">
        <?php for($i = 0; $i<count($names)-1; $i++){ ?>
            <div class="col-md">
                <div id="ABC" class="card">
                    <div class="card-header text-md-center"><h4><?php echo($names[$i]); ?></h4></div>
                    <div class="card-block text-md-center">
                        <h2><?php echo($locations[$i]); ?></h2>
                    </div>
                </div>
            </div>
            <?php if(($i + 1) % 3 == 0){
                echo(' </div>
            <div class="row">');
            } ?>
        <?php } ?>
    </div>
    </div>
    </div>
    </div>
    </body>
    <style>
    </style>
    </html>


