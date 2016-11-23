$(document).ready(function() {
    var favTown;
    $favoriteList = $(".favoriteList");
    
    //Check if a favorite town has been set
    if (localStorage.getItem("favTown") == null) {
    Materialize.toast('<span style="margin: 0; cursor: pointer" class="toast">Click here to choose your town</span>', 6000)
    }
    //Update location with PHP (again later)
    else {
    favTown = localStorage.getItem("favTown");
        $(".favoriteTown").html(favTown);
        $favoriteList.show(100);
    }
    
    $(".toast").click(function() {
        $(window).scrollTo($("#town-select-link"),1000,"swing");
    });
    
    $(".starIcon").click(function() {
        localStorage.removeItem("favTown");
        $favoriteList.slideUp(100);
        Materialize.toast("Your town has been reset",3000);
    })
    
    // Town Selector - Replace with JSON
    $('input.autocomplete').autocomplete({
        data: {
            "Alpha": null,
            "Bravo": null,
            "Charlie": null,
            "Delta": null,
            "Echo": null,
            "Foxtrot": null,
            "Golf": null
        }
    });
    
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

localStorage.setItem("favTown",favTown);

