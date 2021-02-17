jQuery(document).ready(function($){
	var menu_id = '#nav-header';
	var current_scroll_pos = 0;
	var last_scroll_pos = 0;
	var scroll_delta = 0;

function mtmb_navbar_show(){
	$( menu_id ).removeClass('mtmb-hidden').addClass('mtmb-shown');
}
function mtmb_navbar_hide(){
	$( menu_id ).removeClass('mtmb-shown').addClass('mtmb-hidden');
}

	$('#nav-header').off('click');
	$('#nav-header-toggle').on('click', function() {
		slide($('.nav-wrap #menu-header', '.nav-container'));
	});
	
	// this was taken from the theme we are altering.
	// because it is not globally available
	function slide(content) {
		var wrapper = content.parent();
		var contentHeight = content.outerHeight(true);
		var wrapperHeight = wrapper.height();
 
		wrapper.toggleClass('expand');
		if (wrapper.hasClass('expand')) {
			setTimeout(function() {
				wrapper.addClass('transition').css('height', contentHeight);
			}, 10);
		}
		else {
			setTimeout(function() {
				wrapper.css('height', wrapperHeight);
				setTimeout(function() {
				wrapper.addClass('transition').css('height', 0);
				}, 10);
			}, 10);
		}

		wrapper.one('transitionEnd webkitTransitionEnd transitionend oTransitionEnd msTransitionEnd', function() {
			if(wrapper.hasClass('open')) {
				wrapper.removeClass('transition').css('height', 'auto');
			}
		});
	}
	
	
	


})


