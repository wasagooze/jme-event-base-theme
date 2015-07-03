(function($, undefined) {

  $(function() {
    $("#attraction-dropdown").on('change', function() {
    	window.location.href = $(this).val();
    });

  });

}(window.jQuery));