<?php
/******************************
* functions.php
* - available in both front and back end
******************************/

function mtmb_get_searchbox() {
	$menu_to_insert='';
	$menu_to_insert.=	"<li class='menu-item mtmb-searchbox-icon' ><i class='icon-search sb-icon-size'></i></li>";
	$menu_to_insert.=		"<li class='menu-item mtmb-right'>";
	$menu_to_insert.=			"<div class='mtmb-searchwrap'>";
	$menu_to_insert.=				"<form action='/' method='get'>";
	$menu_to_insert.=					"<input type='text' placeholder='Search...' name='s' class='mtmb-searchbox' required>";
	$menu_to_insert.=					"<i class='icon-remove sb-icon-size mtmb-close-icon'></i>";
	$menu_to_insert.=				"</form>";
	$menu_to_insert.=			"</div>";
	$menu_to_insert.=		"</li>";
	return $menu_to_insert;
}	


function mtmb_get_menu_to_insert() {
	$menu_to_insert='';
	$sign_out_link=	wp_logout_url( home_url() );
	$current_user = wp_get_current_user();
	$account_link	=	get_site_url() . '/users/' . $current_user->user_login;
	$sign_up_link = get_site_url() .'/register/';
	$tool_sub_items = array();
	$tool_sub_items['Admin'] = get_site_url() .'/wp-admin/';
	if (get_edit_post_link() !='' ) {
		$tool_sub_items['Edit Page'] = get_edit_post_link(); 
	}

	$menu_to_insert.="<ul class='nav mtmb-nav'>";			
	// menu items for logged in users
	if ( is_user_logged_in() ) {
	$menu_to_insert.=	"<li class='menu-item mtmb-menu-item mtmb-show'>";
	$menu_to_insert.=		"<a id='mtmb_signout' href='". $sign_out_link ."'>Sign Out</a>";
	$menu_to_insert.=	"</li>";
	$menu_to_insert.=	"<li class='menu-item mtmb-menu-item mtmb-show'>";
	$menu_to_insert.=		"<a href='". $account_link ."'>Account</a>";
	$menu_to_insert.=	"</li>";
		// everyone logged in but subscriber's
		if ( ! current_user_can('subscriber') ) {
			$edit_link = get_edit_post_link();
			$menu_to_insert.="<li class='menu-item mtmb-menu-item mtmb-show tg-hide'><a href='/'>T</a>";
			$menu_to_insert.=	"<ul class='sub-menu'>";
			// add the submenu items under tools
			foreach ($tool_sub_items as $name=>$link) {
				$menu_to_insert.="<li class='menu-item tg-hide'><a href='". $link ."'>". $name ."</a></li>";
			}
			$menu_to_insert.="</ul>";
			$menu_to_insert.="</li>";
		}
		// menu item's for non logged in users
		} else {
			$menu_to_insert.="<li class='menu-item mtmb-menu-item login-link  mtmb-show'><a id='show_login' href='#'>Sign In</a></li>";
			$menu_to_insert.="<li class='menu-item mtmb-menu-item register-link  mtmb-show'>";
			$menu_to_insert.=	"<a href='". $sign_up_link ."'>Sign Up</a>";
			$menu_to_insert.="</li>";
		}
		
	$menu_to_insert.='</ul>';
	return $menu_to_insert;

}

// insert the new tools menu item - hidden unless menu collapse's
function mtmb_tools_menu_on_collapse() {
	$menu_to_insert='';
	if ( is_user_logged_in() ) {
		$tool_sub_items = array();
		$tool_sub_items['Admin'] = get_site_url() .'/wp-admin/';
		if (get_edit_post_link() !='' ) {
			$tool_sub_items['Edit Page'] = get_edit_post_link(); 
		}
		// only if the theme has a menu location of header
		if ( ! current_user_can('subscriber') ) {
			$edit_link = get_edit_post_link();
			$menu_to_insert.="<li class='menu-item  tg-xt' ><a href='/'>Tools</a>";
			$menu_to_insert.=	"<ul class='sub-menu'>";
			// add the submenu items under tools
			foreach ($tool_sub_items as $name=>$link) {
				$menu_to_insert.="<li class='menu-item tg-xt'><a href='". $link ."'>". $name ."</a></li>";
			}
			$menu_to_insert.="</ul>";
			$menu_to_insert.="</li>";
		}
	}	
	return $menu_to_insert;
}	

add_filter('wp_nav_menu_items','mtmb_menu_insertion', 10, 2);
function mtmb_menu_insertion( $nav, $args ) {
	return $nav. mtmb_tools_menu_on_collapse();
	
}

// insert the login form - it will be hidden from view until needed
add_action('wp_footer', 'mtmb_modal_login_insert');
function mtmb_modal_login_insert() {
	$blog_title = get_bloginfo('name');
	ob_start(); ?>
		<form id="login" action="login" method="post">
				<h1><?php echo $blog_title; ?></h1>
				<p class="status"></p>
				<label for="username">Username</label>
				<input id="username" type="text" name="username">
				<label for="password">Password</label>
				<input id="password" type="password" name="password">
				<label for="rememberme"><input id="rememberme" type="checkbox"> Remember Me</label>
				<br>
				<a class="lost" href="<?php echo get_site_url() .'/lost-password/'; ?>">Lost your password?</a>
				<input class="submit_button" type="submit" value="Login" name="submit">
				<div class="close" >X</div>
				<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
		</form>
	<?php	echo ob_get_clean();
}

// Enable the user with no privileges to run ajax_login() in AJAX
// & process the modal login form when submitted
add_action( 'wp_ajax_nopriv_ajax_login', 'ajax_login' );
function ajax_login(){
		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'ajax-login-nonce', 'security' );
		
		// Nonce is checked, get the POST data and sign user on
		$info = array();
		$info['user_login'] = $_POST['username'];
		$info['user_password'] = $_POST['password'];
		$info['remember'] = true;

		// login
		$user_signon = wp_signon( $info, false );
		if ( is_wp_error($user_signon) ){
				echo json_encode(array('loggedin'=>false, 'message'=> $user_signon->get_error_message() ));
		} else {
				wp_set_current_user($user_signon->ID); //Here is where we update the global user variables
				$current_user = wp_get_current_user();
				$menu_to_insert=mtmb_get_menu_to_insert();
				echo json_encode(array('loggedin'=>true,
															 'message'=>	'Success: '.$current_user->first_name,
															 'mtmb_menu'=> $menu_to_insert,
															 'mtmb_signout_url' => wp_logout_url( home_url() ),
															 'mtmb_tools'=> mtmb_tools_menu_on_collapse(),
				) );
		}

		die();
}


// insert the search modal form - it will be hidden from view until needed
add_action('wp_footer', 'mtmb_modal_search_insert');
function mtmb_modal_search_insert() {
	ob_start(); ?>
		<form id="search" action="/" method="get">
				<div class="close" >X</div>
				<input id='mb-searcvhbox' type='text' placeholder='Search...' name='s' class='mtmb-searchbox' required autofocus>
				<p class="search-label" >Type Keyword(s) to search</p>
				
		</form>


	<?php	echo ob_get_clean();
}
