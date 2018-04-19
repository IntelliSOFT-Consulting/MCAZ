$(document).ready(function() {
    /*var Textarea = Textcomplete.editors.Textarea;
    var textareaElement = document.getElementById('description-of-reaction')
    console.log(textareaElement);
    var editor = new Textarea(textareaElement);
    var textcomplete = new Textcomplete(editor, {
      dropdown: {
        maxCount: Infinity
      }
    })
    textcomplete.register([{
      // Emoji strategy
      match: /(^|\s):(\w+)$/,
      search: function (term, callback) {
        callback(emojis.filter(emoji => { return emoji.startsWith(term); }));
      },
      replace: function (value) {
        return '$1:' + value + ': ';
      }
    }]);*/

    var cache1 = {},    lastXhr1;
    $( "#description-of-reaction" ).autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache1 ) {
                response( cache1[ term ] );
                return;
            }

            lastXhr1 = $.getJSON( "/meddras/terminology.json", request, function( data, status, xhr ) {
                cache1[ term ] = data;
                if ( xhr === lastXhr1 ) {
                    response( data );
                }
            });
        },
        select: function( event, ui ) {
            $( "#description-of-reaction" ).val( ui.item.label );
            return false;
        }
    });

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
   
    //active for admins
    //https://stackoverflow.com/questions/18999501/bootstrap-3-keep-selected-tab-on-page-refresh
    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href");
        localStorage.setItem('selectedTab', id)
    });

    var selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab != null) {
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
    }
});
