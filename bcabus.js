$(document).ready(function() {
    $favoriteList = $(".favoriteList");
    
    //Display message if cookie does not exist
    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        }
        else
        {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
            end = dc.length;
            }
        }
        return decodeURI(dc.substring(begin + prefix.length, end));
    }
        var myCookie = getCookie("favorite");
        if (myCookie == null) {
            Materialize.toast("Click the star to set a favorite town",6000);
        }
        else {
            $favoriteList.show(100);
        }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    //Works by #id of the list element
    $hasfav = readCookie("favorite") !== null;
    console.log($hasfav);
    $search = $("input[type='search']");
    $townItem = $(".townItem");
    $townHeader = $(".townList-header");
    $search.keyup(function() {
        $town = $search.val().toLowerCase();
        if ($town !== "") {
            $townItem.not("[id*='" + $town + "']").hide(100);
            $(".collection-item[id*='" + $town + "']").show(100);
            $townHeader.hide(100);
            $favoriteList.hide(100);
        }

        else {
            console.log("hi");
            $townItem.show(100);
            $townHeader.show(100);
            if($hasfav) {
                $favoriteList.show(100);
            }
        }
    })
});

