$(function() {
    $('#aefi-date').datetimepicker({
        format: 'd-m-Y H:i'
      });

    $('#notification-date, #died-date, #district-receive-date, #national-receive-date').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

     $('#investigation-date').datepicker({
        minDate:"-100Y", maxDate:"+1Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

    var cache2 = {},    lastXhr;
    $( "#reporter-institution" ).autocomplete({
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
            $( "#reporter-district" ).val( ui.item.dist );
            $( "#reporter-institution" ).val( ui.item.label );
            return false;
        }
    });

});
