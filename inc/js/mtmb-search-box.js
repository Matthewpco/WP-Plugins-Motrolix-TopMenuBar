jQuery(document).ready(function($){
	var menu_id = '#nav-header';
	var search_box_open = false;
	var scroll_top;

	$( ".mtmb-searchbox-icon" ).click(function() { mtmb_search_toggle(); });
	$( ".mtmb-close-icon" ).click(function()     { mtmb_search_toggle(); });

	function mtmb_search_toggle() {
		var	isMobile = {
			Android: function()	{	return	navigator.userAgent.match(/Android/i);	},
			BlackBerry:	function() {	return navigator.userAgent.match(/BlackBerry/i);	},
			iOS: function()	{	return navigator.userAgent.match(/iPhone|iPad|iPod/i);	},
			Opera: function()	{	return navigator.userAgent.match(/Opera	Mini/i);	},
			Windows: function()	{	return navigator.userAgent.match(/IEMobile/i);	},
			any: function()	{	return (isMobile.Android() ||	isMobile.BlackBerry()	|| isMobile.iOS()	|| isMobile.Opera()	|| isMobile.Windows());	}
		};

		if ( isMobile.iOS() ) {
			$('meta[name=viewport]').attr('content', "width=device-width, initial-scale=1.0, maximum-scale=1")
			$('body').prepend('<div class="search_overlay"></div>');
			$('form#search').fadeIn(500);
			//$( menu_id ).removeClass('mtmb-shown').addClass('mtmb-hidden');
			
			$('div.search_overlay, form#search div.close').on('click', function(){
				$('div.search_overlay').remove();
				$('form#search').hide();
			});

		} else {
			if( search_box_open == true ) {
				// close the searchbox
				search_box_open = false;
				$( ".mtmb-close-icon" ).hide();
				$( ".mtmb-searchwrap" ).animate( { width: 0,}, 500, "linear",
					function(){ 
						$( ".mtmb-searchwrap" ).hide();
						$( ".mtmb-menu-item" ).show();
				 		$( ".mtmb-searchbox" ).focusout();
					}
				);
			} else {
				// open the searchbox
				search_box_open = true;
				$( ".mtmb-menu-item" ).hide();
				$( ".mtmb-close-icon" ).hide();
				$( ".mtmb-searchwrap" ).show();
				$( ".mtmb-searchwrap" ).animate( { width: 175,}, 500, "linear",
					function(){ 
						$( ".mtmb-close-icon" ).show();
					}
				);
			}
		}
	}

});