$(function() {

    var cache10 = {},    lastXhr10;
    $( "#aefi-report-ref" ).autocomplete({
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache10 ) {
                response( cache10[ term ] );
                return;
            }

            lastXhr10 = $.getJSON( "/aefis/reports.json", request, function( data, status, xhr ) {
                cache10[ term ] = data;
                if ( xhr === lastXhr10 ) {
                    response( data );
                }
            });
        },
        select: function( event, ui ) {
            $( "#aefi-report-ref" ).val( ui.item.label );
            //populate fields based on selection
            $.getJSON("/aefis/view/"+ui.item.dist+".json", {id: ui.item.dist})
              .done(function( json ) {
                // console.log( "JSON Data: " + json.aefi.reference_number );
                $( "#province-id" ).val( json.aefi.province_id );
                $( "#designation-id" ).val( json.aefi.designation_id );
                $( "#district" ).val( json.aefi.reporter_district );
                $( "#name-of-vaccination-site" ).val( json.aefi.name_of_vaccination_center );
                $( "#reporter-name" ).val( json.aefi.reporter_name );
                $( "#telephone" ).val( json.aefi.reporter_phone );
                $( "#mobile" ).val( json.aefi.reporter_phone );
                $( "#patient-name" ).val( json.aefi.patient_name+' '+json.aefi.patient_surname );
                $("input[name='gender'][value='"+json.aefi.gender+"']").prop('checked', true);
                $( "#patient-address" ).val( json.aefi.patient_address );
                $( "#age-at-onset-years" ).val( json.aefi.age_at_onset_years );
                $( "#age-at-onset-months" ).val( json.aefi.age_at_onset_months );
                $( "#age-at-onset-days" ).val( json.aefi.age_at_onset_days );
                // console.log(json.aefi.aefi_list_of_vaccines.length)
                var i;
                for (i = 0; i < json.aefi.aefi_list_of_vaccines.length; i++) {
                  $('#addAefiVaccine').click();
                  // console.log(json.aefi.aefi_list_of_vaccines[i].vaccine_name);
                  $( '#aefi-list-of-vaccines-'+i+'-vaccine-name' ).val( json.aefi.aefi_list_of_vaccines[i].vaccine_name );
                  $( '#aefi-list-of-vaccines-'+i+'-vaccination-date' ).val( json.aefi.aefi_list_of_vaccines[i].vaccination_date );
                  $( '#aefi-list-of-vaccines-'+i+'-vaccination-time' ).val( json.aefi.aefi_list_of_vaccines[i].vaccination_time );
                  $( '#aefi-list-of-vaccines-'+i+'-dosage' ).val( json.aefi.aefi_list_of_vaccines[i].dosage );
                  $( '#aefi-list-of-vaccines-'+i+'-batch-number' ).val( json.aefi.aefi_list_of_vaccines[i].batch_number );
                  $( '#aefi-list-of-vaccines-'+i+'-expiry-date' ).val( json.aefi.aefi_list_of_vaccines[i].expiry_date );
                  $( '#aefi-list-of-vaccines-'+i+'-diluent-batch-number' ).val( json.aefi.aefi_list_of_vaccines[i].diluent_batch_number );
                  $( '#aefi-list-of-vaccines-'+i+'-diluent-expiry-date' ).val( json.aefi.aefi_list_of_vaccines[i].diluent_expiry_date );
                  $( '#aefi-list-of-vaccines-'+i+'-diluent-date' ).val( json.aefi.aefi_list_of_vaccines[i].diluent_date );
                  // $( '#aefi-list-of-vaccines-'+i+'-suspected-drug' ).val( json.aefi.aefi_list_of_vaccines[i].suspected_drug );
                  if(json.aefi.aefi_list_of_vaccines[i].suspected_drug) {
                    $("input[name='aefi_list_of_vaccines["+i+"][suspected_drug]']").prop('checked', true);
                  }
                }
              });
            return false;
        }
    });

    var cache1 = {},    lastXhr1;
    $( "#signs-symptoms" ).autocomplete({
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
            $( "#signs-symptoms" ).val( ui.item.label );
            return false;
        }
    });

    $('#autopsy-done-date, #died-date, #symptom-date, #person-date').datetimepicker({
        //minDate:"-100Y", 
        maxDate:"0",
        format: 'd-m-Y H:i'
      });

    $('#report-date, #start-date, #complete-date, #hospitalization-date, #date-of-birth').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
            yearRange: "-100Y:+0",
        showAnim:'show'
      });

     $('#autopsy-planned-date').datepicker({
        minDate:"-100Y", maxDate:"+1Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
            yearRange: "-100Y:+0",
        showAnim:'show'
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
