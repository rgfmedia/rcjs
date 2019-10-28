(function($) {
  'use strict';

    var date;
    let searchParams = new URLSearchParams(window.location.search);

    $('.filterDate').on("change",function() {
        if ($(this).val() != '') {
            date = $(this).val();
            $('.hide-item').removeClass('d-none');
            if (searchParams.has('date')) {
                $('._link').attr('href', function() {
                    var href = $(this).attr('href');

                     $(this).attr('href', href.substring(0, href.indexOf('?')));
                     return this.href + '?date=' + date;
                });
            } else {
                $('._link').attr('href', function() {
                    return this.href + '?date=' + date;
                });
            }

        }
        else { $('.hide-item').addClass('d-none'); }
    });


    if (searchParams.has('date')) {
        $('.hide-item').removeClass('d-none');
        $('._link').attr('href', function() {
            var date = $('.filterDate').val();
            return this.href + '?date=' + date;
        });
    } else { $('.hide-item').addClass('d-none'); }
        
})(jQuery);
