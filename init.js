/**
 * Created by luklas on 11/22/16.
 */

$(document).ready(function(){
    $('input.search').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'http://placehold.it/250x250'
        }
    });
});