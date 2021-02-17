jQuery(document).ready(function($) {

    // Show the login dialog box on click
    $(document).on('click',"#show_login",function (e) {
    		$('meta[name=viewport]').attr('content', "width=device-width, initial-scale=1.0, maximum-scale=1")
        $('body').prepend('<div class="login_overlay"></div>');
        $('form#login').fadeIn(500);
        $('div.login_overlay, form#login div.close').on('click', function(){
            $('div.login_overlay').remove();
            $('form#login').hide();
        });
        e.preventDefault();
    });

    // Perform AJAX login on form submit
    $('form#login').on('submit', function(e){
        $('form#login p.status').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajax_login', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login #username').val(), 
                'password': $('form#login #password').val(),
                'remember': $('form#login #rememberme').is(':checked'),
                'security': $('form#login #security').val() },
            success: function(data){
            		$('form#login p.status').text(data.message);
                $( "ul.nav.mtmb-nav" ).replaceWith( data.mtmb_menu );
                $( "ul#menu-header.nav.container.group" ).append( data.mtmb_tools );
                $( "mtmb_signout" ).attr("href", data.mtmb_signout_url);
                $('.nav-toggle').on('click', function() {
									slide($('.nav-wrap .nav', '.nav-container'));
								});
                $('form#login div.close').click();
            },
        })
         .done(function( msg ) {
  });;
        e.preventDefault();
    });

});