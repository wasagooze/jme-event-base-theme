(function($, undefined) {

  $(function() {

    $("#events-dropdown").on('change', function() {
        var value = $(this).val();
        if (value == 0) {
            window.location.href = "/events";
        } else {
            window.location.href = value;
        }   
    });

    $("#workshops-dropdown").on('change', function() {
    	var value = $(this).val();
    	if (value == 0) {
    		window.location.href = "/workshops";
    	} else {
    		window.location.href = value;
    	}	
    });

    $("#vendors-dropdown").on('change', function() {
        var value = $(this).val();
        if (value == 0) {
            window.location.href = "/vendors";
        } else {
            window.location.href = value;
        }   
    });

    $("#presenter-dropdown").on('change', function() {
    	var value = $(this).val();
    	if (value == 0) {
    		window.location.href = "/workshops";
    	} else {
    		window.location.href = "/presenter/" + value;
    	}
    });

  });

}(window.jQuery));