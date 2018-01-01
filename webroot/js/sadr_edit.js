$(document).ready(function() {
        
    var cache2 = {},    lastXhr;
    $( "#name-of-institution" ).autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache2 ) {
                response( cache2[ term ] );
                return;
            }

            lastXhr = $.getJSON( "/facilities/facility-name.json", request, function( data, status, xhr ) {
                cache2[ term ] = data;
                if ( xhr === lastXhr ) {
                    response( data );
                }
            });
        },
        select: function( event, ui ) {
            $( "#institution-code" ).val( ui.item.value );
            $( "#name-of-institution" ).val( ui.item.label );
            $( "#institution-name" ).val( ui.item.label );
            return false;
        }
    });

    var cache3 = {},    lastXhr;
    $( "#institution-code" ).autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache3 ) {
                response( cache3[ term ] );
                return;
            }

            lastXhr = $.getJSON( "/facilities/facility-code.json", request, function( data, status, xhr ) {
                cache3[ term ] = data;
                if ( xhr === lastXhr ) {
                    response( data );
                }
            });
        },
        select: function( event, ui ) {
            $( "#institution-code" ).val( ui.item.label );
            $( "#name-of-institution" ).val( ui.item.value );
            $( "#institution-name" ).val( ui.item.value );
            return false;
        }
    });
    
});
