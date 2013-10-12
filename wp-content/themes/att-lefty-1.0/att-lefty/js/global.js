jQuery( function($) {
	
	// Scroll back to top	
	function ATTBackTopScroll() {
		
		$( 'a[href=#top]' ).on('click', function() {
			$( 'html, body' ).animate({scrollTop:0}, 'normal');
			return false;
		} );
	
	}
	
	// Scroll to comments	
	function ATTCommentScroll() {
		
		$( '.comment-scroll a' ).click( function(event) {		
			event.preventDefault();
			$( 'html,body' ).animate( {
				scrollTop: $( this.hash ).offset().top
				}, 'normal' );
		} );
		
	}
	
	// Responsive navbar
	function ATTResponsiveNav() {
		var nav = $( '#site-navigation' ), button, menu;
		$( '.nav-toggle' ).on( 'click', function() {	
			$( '.nav-menu' ).toggleClass( 'toggled-on' );
			$( '.nav-toggle' ).find('.toggle-icon').toggleClass('icon-arrow-down icon-arrow-up');
		} );
	}
	
	
	// Fire Functions on Doc Ready
	$(document).ready(function(){
		ATTBackTopScroll();
		ATTCommentScroll();
		ATTResponsiveNav();
	});
	
	
});