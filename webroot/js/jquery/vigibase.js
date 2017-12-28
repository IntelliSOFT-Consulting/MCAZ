$(function() {
    // $(document).on('click', '#registerUser', reloadLabTests);

    //TODO: refresh page on successful cancel modal button.

    $(".vigibase").click(function(event) {
        event.preventDefault();
      // var frm = $('#frmAssignEvaluator');
      console.log('we are not sure what is happening but we will get back to you soon enough');
      console.log($(this).attr("href"));
      url = $(this).attr("href");

      $.ajax({
            async:true,
            type: 'GET',
            url: url,
            success: function (data) {
                // $('#registrationModal').modal('hide')
                console.log("success :)");
                console.log(data);
            },
            error: function (data) {
                //TODO: Remember to remove console.logs during deploy
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
    

});
