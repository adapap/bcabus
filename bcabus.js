$(document).ready(function() {
    //Make this popup only appear once
    Materialize.toast('Click here to choose your town', 5000)
    
    // Town Selector - Needs to
    $('input.autocomplete').autocomplete({
        data: {
            "Alpha": null,
            "Beta": null,
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
        console.log($town);
        if ($town !== "") {
            $townItem.not("[id*='" + $town + "']").hide(100);
            $(".collection-item[id*='" + $town + "']").show(100);
            $townHeader.hide(100);
        }
        else {
            $townItem.show(100);
            $townHeader.show(100);
        }
    })
})

