$(document).ready(function() {
    "use strict";
    var start_val = $('#tour_range').val();
    $('.range_val').html(start_val);

    $('#tour_range').change(function(e){
        var range_val = $('#tour_range').val();
        $('.range_val').html(range_val);
    })
})