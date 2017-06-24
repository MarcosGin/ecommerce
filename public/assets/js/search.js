$(document).ready(function(){
    $('input.typeahead').typeahead(
        {name: 'busq',remote:'products/busq/%QUERY',limit : 10});

});