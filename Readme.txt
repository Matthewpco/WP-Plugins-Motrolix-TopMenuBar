The zipped plugin can be install normally from the WordPress Admin area. (Plugins, Add New, Upload)

The header.php file included with the plugin can be put in place of the one provided to me with the typegrid11_child them.

If changes have been made to that file, 3 lines of code can be added manually.

Lines 114, 115 and 120 were inserted, changing the original file. 

 112		<?php if ( has_nav_menu( 'header' ) ): ?>
 113			<nav id="nav-header" class="nav-container group mtmb-fixed">
*114				<div class="container">
*115					<?php echo mtmb_get_searchbox().mtmb_get_menu_to_insert(); ?>
 116					<div id="nav-header-toggle" class="nav-toggle"><i class="icon-reorder"></i></div>
 117					<div class="nav-wrap">
 118						<?php wp_nav_menu( array('theme_location'=>'header','menu_class'=>'nav container group','container'=>'','menu_id'=>'','fallback_cb'=>FALSE) ); ?>
 119					</div>
*120				</div>
 121			</nav><!--/#nav-header-->
 121		<?php endif; ?>