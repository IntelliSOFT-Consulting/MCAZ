$(function() {
    $('#autopsy-done-date').datetimepicker({
        minDate:"-100Y", maxDate:"+5Y",
        format: 'd-m-Y H:i'
      });

    $('#report-date, #start-date, #complete-date, #hospitalization_date-date').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

     $('#autopsy-planned-date').datepicker({
        minDate:"-100Y", maxDate:"+1Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

});
