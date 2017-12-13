$(function() {
    $('#autopsy-done-date, #died-date').datetimepicker({
        //minDate:"-100Y", 
        maxDate:"0",
        format: 'd-m-Y H:i'
      });

    $('#report-date, #start-date, #complete-date, #hospitalization-date').datepicker({
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
