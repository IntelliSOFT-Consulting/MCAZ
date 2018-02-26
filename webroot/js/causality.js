$(function() {
  $(document).on('click', '.causality-form :radio', causality_assessment);
  
  causality_assessment();
  function causality_assessment() {
      //Builiding Rules      
      var red1 = red2 = red3 = green = blue = purple1 = purple2 = purple3 = purple4 = false;
      //brown
      /*if ($("input[name$='clinical_examination\]']:checked").val() == 'Yes') { 
        $(".causality-form input[id$='-inconsistent']").prop('checked', true); 
        green = true;
      } else { 
        $(".causality-form input[id$='-inconsistent']").prop('checked', false);
        green = false;
      }*/
      $(".r1 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { brown = true;}
          else { brown = false; }
        }
      });

      //purple
      $(".r21 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { purple1 = true;}
        }
      });
      $(".r22 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { purple2 = true;}
        }
      });
      $(".r23 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { purple3 = true;}
        }
      });
      $(".r24 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { purple4 = true;}
        }
      });

      //blue
      $(".r3 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { blue = true;}
        }
      });

      //green
      $(".r4 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { green = true;}
        }
      });

      //red
      $(".r51 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { red1 = true;}
        }
      });
      $(".r52 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { red2 = true;}
        }
      });
      $(".r53 :radio").each(function(){
        if($(this).is(":checked")) {
          if ($(this).val() == 'Yes') { red3 = true;}
        }
      });

      //Rules/Paths
      if(brown) {
        $(".causality-form input[id$='-inconsistent']").prop('checked', true); 
      } else if(!brown) {
        $(".causality-form input[id$='-inconsistent']").prop('checked', false);
      }

      //No -> Yes -> Yes
      // console.log(brown, purple1, blue);
      if(!brown && purple1 && blue) {        
        $(".causality-form input[id$='-consistent-i']").prop('checked', true); 
      }
      if(!brown && purple2 && blue) {        
        $(".causality-form input[id$='-consistent-ii']").prop('checked', true); 
      }
      if(!brown && purple3 && blue) {        
        $(".causality-form input[id$='-consistent-iii']").prop('checked', true); 
      }
      if(!brown && purple4 && blue) {        
        $(".causality-form input[id$='-consistent-iv']").prop('checked', true); 
      }

      //No -> Yes -> No -> Yes
      if(!brown && (purple1 || purple2 || purple3 || purple4) && !blue && green) {
        $(".causality-form input[id$='-inconsistent']").prop('checked', true); 
      }
      //No -> Yes -> No -> No -> No
      if(!brown && (purple1 || purple2 || purple3 || purple4) && !blue && !green && (!red1 && !red2 && !red3)) {
        $(".causality-form input[id$='-unclassifiable']").prop('checked', true); 
      }
      //No -> Yes -> No -> No -> Yes1
      if(!brown && (purple1 || purple2 || purple3 || purple4) && !blue && !green && (red1)) {
        $(".causality-form input[id$='-consistent-i']").prop('checked', true); 
      }
      //No -> Yes -> No -> No -> Yes2
      if(!brown && (purple1 || purple2 || purple3 || purple4) && !blue && !green && (!red1 && red2)) {
        $(".causality-form input[id$='-inconsistent']").prop('checked', true); 
      }
      //No -> Yes -> No -> No -> Yes3
      if(!brown && (purple1 || purple2 || purple3 || purple4) && !blue && !green && (!red1 && !red2 && red3)) {
        $(".causality-form input[id$='-indeterminate-i']").prop('checked', true); 
        $(".causality-form input[id$='-indeterminate-ii']").prop('checked', true); 
      }

      //No-> No -> Yes
      if(!brown && (!purple1 && !purple2 && !purple3 && !purple4) && green) {
        $(".causality-form input[id$='-inconsistent']").prop('checked', true); 
      }      
      //No-> No -> NO -> NO
      if(!brown && (!purple1 && !purple2 && !purple3 && !purple4) && !green && (!red1 && !red2 && !red3)) {
        $(".causality-form input[id$='-unclassifiable']").prop('checked', true); 
      }
      //No-> No -> NO -> Yes1
      if(!brown && (!purple1 && !purple2 && !purple3 && !purple4) && !green && (red1)) {
        $(".causality-form input[id$='-consistent-i']").prop('checked', true);  
      }
      //No-> No -> NO -> Yes2
      if(!brown && (!purple1 && !purple2 && !purple3 && !purple4) && !green && (!red1 && red2)) {
        $(".causality-form input[id$='-inconsistent']").prop('checked', true);   
      }
      //No-> No -> NO -> Yes3
      if(!brown && (!purple1 && !purple2 && !purple3 && !purple4) && !green && (red1 && !red2 && red3)) {
        $(".causality-form input[id$='-indeterminate-i']").prop('checked', true); 
        $(".causality-form input[id$='-indeterminate-ii']").prop('checked', true); 
      }

  }

});