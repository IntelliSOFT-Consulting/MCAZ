$(function() {
    var cache1 = {},    lastXhr1;
    $( "#diagnosis" ).autocomplete({
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
            $( "#diagnosis" ).val( ui.item.label );
            return false;
        }
    });
// add autocomplete for name_of_institution


    
    //If not serious disable criteria
    $('input[name="report_to_mcaz"]').click(function(){ 
        if ($(this).val() == 'No') {
            $('input[name="report_to_mcaz_date"]').attr('disabled', this.checked).val('');
        } else {
            $('input[name="report_to_mcaz_date"]').attr('disabled', false);
        }
    });
    if($('input[name="report_to_mcaz"][value="No"]').is(':checked')){ $('input[name="report_to_mcaz_date"]').attr('disabled', true).attr('checked', false); }

    $('input[name="report_to_mrcz"]').click(function(){ 
        if ($(this).val() == 'No') {
            $('input[name="report_to_mrcz_date"]').attr('disabled', this.checked).val('');
        } else {
            $('input[name="report_to_mrcz_date"]').attr('disabled', false);
        }
    });
    if($('input[name="report_to_mrcz"][value="No"]').is(':checked')){ $('input[name="report_to_mrcz_date"]').attr('disabled', true).attr('checked', false); }

    $('input[name="report_to_sponsor"]').click(function(){ 
        if ($(this).val() == 'No') {
            $('input[name="report_to_sponsor_date"]').attr('disabled', this.checked).val('');
        } else {
            $('input[name="report_to_sponsor_date"]').attr('disabled', false);
        }
    });
    if($('input[name="report_to_sponsor"][value="No"]').is(':checked')){ $('input[name="report_to_sponsor_date"]').attr('disabled', true).attr('checked', false); }
    
    $('input[name="report_to_irb"]').click(function(){ 
        if ($(this).val() == 'No') {
            $('input[name="report_to_irb_date"]').attr('disabled', this.checked).val('');
        } else {
            $('input[name="report_to_irb_date"]').attr('disabled', false);
        }
    });
    if($('input[name="report_to_irb"][value="No"]').is(':checked')){ $('input[name="report_to_irb_date"]').attr('disabled', true).attr('checked', false); }

    $('#aefi-date').datetimepicker({
        minDate:"-100Y", maxDate:"+5Y", 
        format: 'd-m-Y H:i'
      });

    $('#date-of-adverse-event, #date-of-site-awareness').datepicker({
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
            yearRange: "-100Y:+0",
        showAnim:'show'
      });

    var cache2 = {},    lastXhr;
    $( "#mcaz-protocol-number" ).autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache2 ) {
                response( cache2[ term ] );
                return;
            }

            lastXhr = $.getJSON( "https://public.e-ctr.mcaz.co.zw/api/applications.json?callback=?", request, function( data, status, xhr ) {
                cache2[ term ] = data;
                if ( xhr === lastXhr ) {
                    response( data );
                }
            });
        },
        select: function( event, ui ) {
            $( "#mrcz-protocol-number" ).val( ui.item.label );
            $( "#mcaz-protocol-number" ).val( ui.item.label );
            $( "#study-title" ).val( ui.item.value );
            $( "#study-sponsor" ).val( ui.item.sponsor );
            $( "#principal-investigator" ).val( ui.item.dist );
            return false;
        }
    });

//autocomplete combo
    var availableTags = [
        "Principal Investigator",
        "Co- Investigator",
        "Study co-ordinator",
        "Pharmacist",
        "Medical Officer",
        "Nurse"
    ];
    $( "#designation-study" ).autocomplete({
      source: availableTags,
      minLength: 0
    }).focus(function() {
        $(this).autocomplete('search', $(this).val())
    });
//end autocomplete combo
    
    /*$( "#study-title" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "http://mcazpublicdev/api/applications/protocols",
          dataType: "jsonp",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 2,
      select: function( event, ui ) {        
        $( "#mrcz-protocol-number" ).val( ui.item.label );
        $( "#mcaz-protocol-number" ).val( ui.item.label );
        $( "#study-title" ).val( ui.item.value );
        $( "#study-sponsor" ).val( ui.item.sponsor );
        $( "#principal-investigator" ).val( ui.item.dist );
      }
    } );*/


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
