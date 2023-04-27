$(document).ready(function() {
    $('.confirm').click(function() {
         // return confirm('Are you sure you want to send this report to Vigibase?');
         if(confirm("Are you sure you want to resubmit this report to Vigibase?")) {          
            // var frm = $('#frmAssignEvaluator');
            url = $(this).attr("href");
            em = $(this);
            $.blockUI({ css: { 
                border: 'none', 
                padding: '15px', 
                backgroundColor: '#000', 
                '-webkit-border-radius': '10px',  
                '-moz-border-radius': '10px', 
                opacity: .5, 
                color: '#fff' 
            } }); 
  
            $.ajax({
                async:true,
                type: 'GET',
                url: url,
                success: function (data) {
                    // $('#registrationModal').modal('hide')
                    console.log(data, $(this).closest("td"));
                    em.closest("td").empty().html(data.umc.MessageId);
                    $.unblockUI();
                     window.location.reload();
                },
                error: function (data) {
                    //TODO: Remember to remove console.logs during deploy
                    console.log('An error occurred.');
                    console.log(data);
                    $.unblockUI();
                    window. location.reload();
                },
            });
        }
    });
    
});