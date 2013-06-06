function scroll_to_elem(elem,speed) {
	if(document.getElementById(elem)) {
		var destination = jQuery('#'+elem).offset().top;
		jQuery("html,body").animate({scrollTop: destination}, speed);
	}
}

