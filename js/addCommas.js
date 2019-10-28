(function($) {
  'use strict';

    $('.numberformat').on('keyup', function(event){
      console.log('asd');
        if (event.which >= 37 && event.which <= 40) return;
        var x = $(this).val();
        $(this).val(addCommas(x));
    });
     

    function addCommas(x) {
        var parts = x.toString().split('.');
        parts[0] = parts[0]
                   .replace(/\D/g, "")
                   .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

})(jQuery);