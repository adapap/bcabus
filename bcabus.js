$(document).ready(function() {
    $favoriteList = $(".favoriteList");

    if (document.cookie == null) {
        Materialize.toast('Click the star to set a favorite', 6000)
    }
    else {
        $favoriteList.show(100);
    }

    //Works by #id of the list element
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
            $townItem.show(100);
            $townHeader.show(100);
            if (localStorage.getItem("favTown") !== null) { $favoriteList.show(100); };
        }
    })
})
