<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1S5v7kTbSiqV8GottWVi5tzpqLdTrEgWEY4ND4zvyV3o/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));
$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1qVq2lPFu_U2Uz_MDxCNfyO8GRpndgYRqpHCR9qQZV0k/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));


$locations = array();
$names = array();

$thing = (json_encode(array("hello" => null, "goodbye"=>null, "why"=>null, "hi"=>null)));


$thing = str_replace("\\", "", $thing);

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

if(count($locations) > count($names)){
    $rows = count($locations);
} else {
    $rows = count($names);
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

    <!-- JQuery/Materialize -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>


</head>
<style>

    html{
        font-family: 'Roboto', sans-serif;
    }

    ::-webkit-input-placeholder {
        color: white;
    }

    :-moz-placeholder { /* Firefox 18- */
        color: white;
    }

    ::-moz-placeholder {  /* Firefox 19+ */
        color: white;
    }

    :-ms-input-placeholder {
        color: white;
    }

</style>
<body class="blue lighten-5">

<!-- Outer Wrapper -->
    <!-- Search -->
    <nav class="search-nav blue">
        <div class="nav-wrapper container">
            <form>
                <div class="input-field" style="z-index: 999">
                    <input class="left-align autocomplete" id="search" type="text" placeholder="Search for towns here..." autocomplete="off" autofocus>
                    <label for="search"><i class="material-icons">search</i></label>
                </div>
            </form>
        </div>
    </nav>

<div class="section"></div>
<!-- Town Display -->
<main>
    <div class="row">
        <div class="col l8 offset-l2 m6 offset-m3 s12">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Bus List</h4></li>
                <?php for($i = 0; $i<$rows; $i++){ ?>
                <li class="collection-item"><h6><span><?php echo($names[$i]); ?></span><span class="right location"><?php echo($locations[$i]); ?></span></h6></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div id="town-select-link" class="row white-text">
        <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1 blue lighten-4">
            <input type="text" id="town-input" class="autocomplete center-align">
            <p class="center-align">Select a default town from the list above</p>
        </div>
    </div>
</main>
<!-- Footer -->
<footer class="valign page-footer blue darken-2 light-blue-text text-lighten-5 center-align">
    <div style="margin-bottom: 0; padding-bottom: 2%"><h3>BCA Bus</h3><h6>Find your bus from anywhere.</h6></div>
</footer>
</body>

<?php

for($j=0; $j<count($names); $j++){
    $tmp = $names[$j];
    unset($names[$j]);
    $names[$tmp] = "null";
}

?>
<script>

    $(document).ready(function() {
        Materialize.toast("Save your town at the bottom of this page",6000);

        $('#search').autocomplete({
            data: <?php echo(str_replace("\"null\"", "null", json_encode($names))); ?>
        });
    })

</script>
</html>