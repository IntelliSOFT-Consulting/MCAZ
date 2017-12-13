$(function() {
    // $(document).on('click', '#registerUser', reloadLabTests);

    //TODO: refresh page on successful cancel modal button.

    $("#assignEvaluator").click(function() {
      // var frm = $('#frmAssignEvaluator');
      var frm = $(this).closest('form');;
      console.log('we are not sure what is happening but we will get back to you soon enough');
      console.log(frm);
      $('.help-block').empty();
      $('[id^=fg-]').removeClass("has-error");
      $('#assignModalHeader').addClass("has-error");
      $.ajax({
            async:true,
            type: 'POST',
            url: '/manager/sadrs/assign-evaluator.json',
            data: frm.serialize(),
            success: function (data) {
                // $('#registrationModal').modal('hide')
                console.log(data);
                $('#assignModalHeader').addClass("has-success");
                //$('#help-registration-modal').append(data.message);
                $('.modal-body').empty();
                $('.modal-body').append(data.message);
            },
            error: function (data) {
                //TODO: Remember to remove console.logs during deploy
                console.log('An error occurred.');
                console.log(data.responseJSON.errors);
                $('#assignModalHeader').addClass("has-error");
                //$('#help-registration-modal').append(data.responseJSON.message);
                if (data.responseJSON.errors) {
                    $('#fg-evaluator').addClass("has-error");
                    $('#help-evaluator').append(JSON.stringify(data.responseJSON.errors["evaluator"]));
                }
                if (data.responseJSON.errors) {
                    $('#fg-user-message').addClass("has-error");
                    $('#help-user-message').append(JSON.stringify(data.responseJSON.errors["user_message"]));
                }
                
            },
        });
    });
    

});
