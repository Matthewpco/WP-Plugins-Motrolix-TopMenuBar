<!DOCTYPE html> 
<!--[if lt IE 7 ]>				<html class="no-js ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>					<html class="no-js ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>					<html class="no-js ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->	<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<title><?php wp_title(''); ?></title>
		<script>
	// This function returns a normalized screen size to match the TypeGrid theme.
	function get_ad_size($position) {
		var $adsense_helper = 'src="http://pagead2.googlesyndication.com/pagead/show_ads.js"';
		var $ynb_helper = 'src="http://contextual.media.net/nmedianet.js?cid=8CU1J6XKQ"';
		var $aol_helper = 'src="http://uac.advertising.com/wrapper/aceUAC.js"';
				
		switch($position) {
			case "header-logo-center":
				// Logo area in header.  Disappears when size is less then 700 via CSS
				var $width = window.innerWidth || document.documentElement.clientWidth;
				if ($width >= 1050 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "4873542961";  google_ad_width = 728;  google_ad_height = 90;', $adsense_helper]; }
				else if ($width >= 800 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "4811202363";  google_ad_width = 468;  google_ad_height = 60;', $adsense_helper]; }
				else { return ['','']; }
				break;
			case "header-bottom-left":
				// Area under 2nd Menu.  Disappears when pages is less then 910px via CSS
				var $width = window.innerWidth || document.documentElement.clientWidth;
				if ($width >= 910 ) { return ['medianet_width="160";  medianet_height= "90";  medianet_crid="172843765";', $ynb_helper]; }
				else { return ['','']; }
				break;
			case "header-bottom-center":
				// Area under 2nd Menu.
				var $width = window.innerWidth || document.documentElement.clientWidth;
				if ($width >= 728 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "3411313564";  google_ad_width = 728;  google_ad_height = 90;', $adsense_helper]; }
				// else if ($width >= 468 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "4811202363";  google_ad_width = 468;  google_ad_height = 60;', $adsense_helper]; }
				else if ($width >= 336 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "3401280366";  google_ad_width = 336;  google_ad_height = 280;', $adsense_helper]; }
				else if ($width < 336 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "2242304768";  google_ad_width = 300;  google_ad_height = 250;', $adsense_helper]; }
				else { return ['','']; }
				break;
			case "header-bottom-right":
				// Area under 2nd Menu.  Disappears when pages is less then 1090px via CSS
				var $width = window.innerWidth || document.documentElement.clientWidth;
				if ($width >= 1090 ) { return ['medianet_width="160";  medianet_height= "90";  medianet_crid="172843765";', $ynb_helper]; }
				else { return ['','']; }
				break;
			case "home-featured":
			case "below-image-center":
				// Area under featured articles on home page and below article on single
				var $addiv = document.getElementById("featured-image-wrapper").clientWidth;
				if ($addiv >= 720 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "5181557166";  google_ad_width = 728;  google_ad_height = 90;', $adsense_helper]; }
				// else if ($addiv >= 460 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "4811202363";  google_ad_width = 468;  google_ad_height = 60;', $adsense_helper]; }
				else if ($addiv >= 328 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "3401280366";  google_ad_width = 336;  google_ad_height = 280;', $adsense_helper]; }
				else if ($addiv < 328 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "2242304768";  google_ad_width = 300;  google_ad_height = 250;', $adsense_helper]; }
				else { return ['','']; }
				break;
			case "header-replace-center":
				// Below article in single and after 1st article on home.  Only appears when size is less than 700 via CSS
				var $width = window.innerWidth || document.documentElement.clientWidth;
				// if ($width < 760 && $width >= 468 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "4811202363";  google_ad_width = 468;  google_ad_height = 60;', $adsense_helper]; }
				if ($width < 760 && $width >= 336 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "3401280366";  google_ad_width = 336;  google_ad_height = 280;', $adsense_helper]; }
				else if ($width < 336 ) { return ['google_ad_client = "ca-pub-7194783345442697";  google_ad_slot = "2242304768";  google_ad_width = 300;  google_ad_height = 250;', $adsense_helper]; }
				else { return ['','']; }
				break;
			case "home-loop":
			case "comments":
				// Every 4 articles on home page
				var $addiv = document.getElementById("ads-content-wrapper").clientWidth;
				if ( $addiv >= 728 ) { return ['var ACE_AR = {site: "899892", size: "728090"};', $aol_helper]; }
				else if ($addiv  >= 600 ) { return ['medianet_width="600";  medianet_height= "120";  medianet_crid="457627319";', $ynb_helper]; }
				else if ($addiv  >= 468 ) { return ['medianet_width="468";  medianet_height= "60";  medianet_crid="465766537";', $ynb_helper]; }
				else if ($addiv  < 468 )  { return ['var ACE_AR = {site: "899893", size: "300250"};',$aol_helper]; }
				else { return ['','']; }
				break;				
			case "footer":
		                // Footer area, center.
                                var $addiv = window.innerWidth || document.documentElement.clientWidth;
                                if ($addiv >= 728 ) { return ['var ACE_AR = {site: "899892", size: "728090"};', $aol_helper]; }
				else if ($addiv >= 468 ) { return ['','src="http://ads-by.madadsmedia.com/tags/7509/4688/async/468x60.js"']; }
                                else if ($addiv < 468 ) { return ['var ACE_AR = {site: "899893", size: "300250"};',$aol_helper]; }
				else { return ['','']; }
                                break;
		}
	}

	</script>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic|Fjalla+One' rel='stylesheet' type='text/css'>
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie/selectivizr.js"></script>
	<![endif]-->

		<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<?php echo wpb_page_background_image(); ?>

<div class="body-wrapper">
	
	<header id="header">

		
		<?php if ( has_nav_menu( 'header' ) ): ?>
			<nav id="nav-header" class="nav-container group mtmb-fixed">
				<div class="container">
					<?php echo mtmb_get_searchbox().mtmb_get_menu_to_insert(); ?>
					<div id="nav-header-toggle" class="nav-toggle"><i class="icon-reorder"></i></div>
					<div class="nav-wrap">
						<?php wp_nav_menu( array('theme_location'=>'header','menu_class'=>'nav container group','container'=>'','menu_id'=>'','fallback_cb'=>FALSE) ); ?>
					</div>
				</div>
			</nav><!--/#nav-header-->
		<?php endif; ?>
		
		<div class="container">
			<div id="header-logo-wrapper"><!--/.logo-header-->
				<div id="header-logo-container-left">
					<?php echo wpb_site_name(); ?>	
				</div>
				<div id="header-logo-container-center">
						<script>var ad_data = get_ad_size('header-logo-center');
								document.write('<script type="text/javascript"> ' + ad_data[0] + '<' + '\/script>'); </script>
						<script> document.write('<script type="text/javascript" ' + ad_data[1] + '><' + '\/script>'); </script>		
				</div>
				<div id="header-logo-container-right">
					<?php echo wpb_social_media_links(array('id'=>'header-social','class'=>'social-module')); ?>		
				</div>
			</div><!--/.logo-header-->	
			
			<?php if ( is_home() || is_single() || is_archive() ) get_template_part('partials/newsflash'); ?>
			
			<?php if ( has_nav_menu( 'subheader' ) ): ?>
				<nav class="nav-container group" id="nav-subheader">
					<div class="nav-toggle" id="nav-subheader-toggle"><i class="icon-reorder"></i></div>
					<div class="nav-wrap">
						<?php wp_nav_menu( array('theme_location'=>'subheader','menu_class'=>'nav container group','container'=>'','menu_id'=>'','fallback_cb'=>FALSE) ); ?>
					</div>
				</nav><!--/#nav-subheader-->
			<?php endif; ?>
			
			<div id="header-bottom-wrapper"><!--/.ads-header-->
				<!--<div id="header-bottom-container-left">
					<script>var ad_data = get_ad_size('header-bottom-left');
							document.write('<script type="text/javascript"> ' + ad_data[0] + '<' + '\/script>'); </script>
						<script> document.write('<script type="text/javascript" ' + ad_data[1] + '><' + '\/script>'); </script>		
				</div>-->
				<div id="header-bottom-container-center">
					<script>var ad_data = get_ad_size('header-bottom-center');
							document.write('<script type="text/javascript"> ' + ad_data[0] + '<' + '\/script>'); </script>
						<script> document.write('<script type="text/javascript" ' + ad_data[1] + '><' + '\/script>'); </script>		
				</div>
				<!--<div id="header-bottom-container-right">
					<script>var ad_data = get_ad_size('header-bottom-right');
							document.write('<script type="text/javascript"> ' + ad_data[0] + '<' + '\/script>'); </script>
						<script> document.write('<script type="text/javascript" ' + ad_data[1] + '><' + '\/script>'); </script>			
				</div>-->
			</div><!--/.ads-header-->	
			
		</div><!--/.container-->
			
	</header><!--/#header-->

	<div id="page">
		<div class="container">
			<div class="container-inner">
