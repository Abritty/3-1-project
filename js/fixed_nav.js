jQuery(document).ready(function() {
	
	var navOffset, scrollPos = 0;

	jQuery(window).scroll(function() {
		
		scrollPos = jQuery(window).scrollTop();
		
		if (scrollPos >= navOffset) {
			jQuery("nav").addClass("fixed");
		} else {
			jQuery("nav").removeClass("fixed");
		}
		
	});
	
});