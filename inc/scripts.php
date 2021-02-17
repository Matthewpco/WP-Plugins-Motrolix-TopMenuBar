<?php

/******************************
* script control
******************************/

add_action('wp_enqueue_scripts', 'mtmb_load_scripts', 100);
function mtmb_load_scripts() {
	global $version;
	
	// include the css styles 
	wp_enqueue_style('mtmb-menu-bar-styles', plugin_dir_url( __FILE__ ) . 'css/mtmb_menu_bar_styles.css',array(), $version);
	wp_enqueue_style('mtmb-searchbox-styles', plugin_dir_url( __FILE__ ) . 'css/mtmb_searchbox_styles.css',array(), $version);
	wp_enqueue_style('mtmb-modal-login-styles', plugin_dir_url( __FILE__ ) . 'css/mtmb_modal_login_styles.css',array(), $version);
	wp_enqueue_style('mtmb-modal-search-styles', plugin_dir_url( __FILE__ ) . 'css/mtmb_modal_search_styles.css',array(), $version);

	// register the scripts
	wp_register_script('mtmb-menu-bar-scripts', plugin_dir_url( __FILE__ ) . 'js/mtmb-top-menu-bar.js', array('jquery'), $version, true);
	wp_register_script('mtmb-searchbox-scripts', plugin_dir_url( __FILE__ ) . 'js/mtmb-search-box.js', array('jquery'), $version, true);
	wp_register_script('mtmb-ajax-login', plugin_dir_url( __FILE__ ) . 'js/mtmb-ajax-login.js', array('jquery') , $version,  true);
	
	// enqueue them
	wp_enqueue_script( 'mtmb-menu-bar-scripts' );
	wp_enqueue_script( 'mtmb-searchbox-scripts' );
	wp_enqueue_script('mtmb-ajax-login');

	// make the ajax vars available to jQuery
	wp_localize_script( 'mtmb-ajax-login', 'ajax_login_object', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url('/account/'),
		'loadingmessage' => __('Sending user info, please wait...')
		)
	);

}