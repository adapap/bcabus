<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1S5v7kTbSiqV8GottWVi5tzpqLdTrEgWEY4ND4zvyV3o/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));
$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1qVq2lPFu_U2Uz_MDxCNfyO8GRpndgYRqpHCR9qQZV0k/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <script src="bcabus.js"></script>

</head>

<body>

<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Logo</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
        </ul>
    </div>
</nav>


<div class="row">
    <div class="col l10 push-l1 s12">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>First Names</h4></li>

                <?php for($i = 0; $i<count($names)-1; $i++){ ?>
                        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>

                <?php } ?>
                </ul>
    </div>
</div>
</body>
<style>
</style>
</html>


