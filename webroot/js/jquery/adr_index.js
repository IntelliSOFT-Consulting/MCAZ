$(function() {
    
    $(".readmore").readmore({
      speed: 75,
      maxHeight: 1
    });

    $( "input[name^='active']" ).click(function() {
        var val = 0;
        if($(this).is(':checked')) { 
          val = 1;
        } else {
          val = 0;
        }
        // var id =  $(this).attr('id').replace('active', '0');
        $.ajax({
              async:true,
              type: 'POST',
              url: $(this).attr('data-url'),
              data:{'purpose': 'active', 'value': val},
              success: function (data) {
                  // $('#registrationModal').modal('hide') 
                  // console.log('well done');                
              },
              error: function (data) {
                  //TODO: Remember to remove console.logs during deploy
                  console.log('An error occurred.');
                  console.log(data);
              },
          });
    });
});
