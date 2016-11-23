<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1S5v7kTbSiqV8GottWVi5tzpqLdTrEgWEY4ND4zvyV3o/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));
$jsonHtml = json_decode(file_get_contents("https://sheets.googleapis.com/v4/spreadsheets/1tJllDysWV5Xn9C7MKlVDttPXp2jXuQCYLP3jbf4FW28/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU"));
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
    
    <!-- CSS/JQuery/ScrollTo/Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js"></script>
    
    <script src="bcabus.js"></script>
    </head>
    <body class="blue lighten-5">
    <a id="top"></a>
        
    <!-- Outer Wrapper -->
    <head>
    <!-- Search -->
    <nav class="search-nav blue">
    <div class="nav-wrapper">
        <form>
            <div class="input-field">
            <input class="left-align" id="search" type="search" placeholder="Search for towns here..." autofocus autocomplete="off">
            <label for="search"><i class="material-icons">search</i></label>
            </div>
        </form>
    </div>
    </nav>
    </head>
    <!-- Town Display -->
    <main>
        <div class="row" style="padding-top: 2%">
            <div class="col l8 offset-l2 m6 offset-m3 s12">
                <!-- Favorite Town -->
                <ul style="display: none" class="collection favoriteList">
                    <li class="collection-item favoriteItem"><i style="font-size: 3rem; color: gold; cursor: pointer" class="starIcon material-icons secondary-content">star</i><h4 class="favoriteTown">Bravo</h4><h5 class="favoriteLocation">X0</h5>
                    </li>
                </ul>
                <!-- Town List -->
                <ul class="townList collection with-header">
                    <li class="collection-header townList-header"><h2>Town List</h2></li>
                    <?php for($i = 0; $i<count($names)-1; $i++){ ?>
                    <li id="<?php echo(strtolower($names[$i])) ?>" class="collection-item townItem"><p><span><?php echo($names[$i]); ?></span><span class="right"><?php echo($locations[$i]); ?></span></p></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- Favorite Control -->
        <div id="town-select-link" class="row white-text">
            <div style="padding-bottom: 2%" class="col l6 offset-l3 m8 offset-m2 s10 offset-s1 blue lighten-4">
            <input type="text" id="town-input" class="autocomplete center-align" placeholder="Type your town name here..." onblur="this.placeholder = 'Type your town name here...'" onfocus="this.placeholder = ''">
                <button class="btn waves-effect waves-light blue townSubmit" type="submit" name="action">Save</button></div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="valign page-footer blue darken-2 light-blue-text text-lighten-5 center-align">
        <div style="padding-bottom: 5%"><h3>BCA Bus</h3><h6>Find your bus from anywhere.</h6></div>
        </footer>
    </body>
        <style>
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
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }
    @media only screen and (max-width: 768px) {
        .townSubmit {
            margin-left: 30%;
        }
    }
    @media only screen and (min-width: 768px) {
        .townSubmit {
            margin-left: 43%;
        }
    }
    </style>
</html>