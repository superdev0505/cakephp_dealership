(function ( $ ) {
	
	$(window).on('mousemove', function(e){
		//console.log(e.pageX);
		if( $('.container-fluid').hasClass('menu-hidden') && e.pageX < 24 ){
			$('.container-fluid').removeClass('menu-hidden');
		}
		if( ! $('.container-fluid').hasClass('menu-hidden') && e.pageX > 280 ){
			$('.container-fluid').addClass('menu-hidden');
		}
	      
	}); 
	
	
 
}( jQuery ));