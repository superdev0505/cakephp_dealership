(function ($) {


	$.fn.delayKeyup = function(callback, ms){
	    var timer = 0;
	    var el = $(this);
	    $(this).keyup(function(){                   
	    clearTimeout (timer);
	    timer = setTimeout(function(){
	        callback(el)
	        }, ms);
	    });
	    return $(this);
	};


})(jQuery);