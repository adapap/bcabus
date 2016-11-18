var locations = [];
var towns = [];

$(document).ready(function() { //Retrieve data from spreadsheet
    function getInfo(url) {
        $info = $.getJSON(url);
    }
    
getInfo("https://sheets.googleapis.com/v4/spreadsheets/1S5v7kTbSiqV8GottWVi5tzpqLdTrEgWEY4ND4zvyV3o/values:batchGet?ranges=A%3AA&ranges=B%3AB&ranges=C%3AC&ranges=D%3AD&key=AIzaSyDwH-ws7le4K2YbeJ-IOVv200LFuTVuOtU");
});

function getLocations() { //Parses columns B and D, the town locations
    var locations = [];
    if ($info.status == 200) {
        for (var z=1; z<4; z+=2) {
            $locations = $info.responseJSON.valueRanges[z].values;
            $locationslen = $locations.length;
            for (var i=1; i<$locationslen; i++) {
                if ($locations[i] == "") {
                    locations.push("?? <br>")
                }
                else {
                    locations.push($locations[i].toString() + "<br>");
                }
            }
        }
        $(".locationDisplay").html(locations);
    }
}
// **How do we handle an absence of town location?**

function getTowns() { //Parses columns A and C, the town names
    var towns = [];
    if ($info.status == 200) {
        for (var z=0; z<3; z+=2) {
            $towns = $info.responseJSON.valueRanges[z].values;
            $townslen = $towns.length;
            for (var i=1; i<$townslen; i++) {
                towns.push($towns[i].toString() + "<br>");
            }
        }
        $(".townDisplay").html(towns);
    }
}