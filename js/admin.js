$(document).ready(function() {

	$('#tournament_check').change(function(event) {
			if(this.checked) {
	      $('#tournament_date').animate({
            opacity: 1
          }, 500);
	    } else {
	    	$('#tournament_date').animate({
            opacity: 0
          }, 500);
	    }
	      	
	});

});