$(function() {

    var cache2 = {},    lastXhr2;
    $( "#name_of_institution" ).autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache2 ) {
                response( cache2[ term ] );
                return;
            }
            lastXhr2 = $.getJSON( "/facilities/facility_name.json", request, function( data, status, xhr ) {
                cache2[ term ] = data;
                if ( xhr === lastXhr2 ) {
                    response( data );
                }
            });
        },
        select: function( event, ui ) {
            $( "#name_of_institution" ).val( ui.item.label );
            return false;
        }
    });
});