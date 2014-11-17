<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Bootstrap Theme' );
define( 'CHILD_THEME_URL', 'http://www.avidnetizen.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );


//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Scripts and CSS Styles
include_once( 'lib/scripts.php' );

//* Add support for custom background
// add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//* Remove site description
// (tagline underneath header)
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


//Remove Existing Footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
//Add in new Widget areas
function genesischild_extra_widgets() {	
	genesis_register_sidebar( array(
	'id'          => 'footercontent',
	'name'        => __( 'Footer', 'genesischild' ),
	'description' => __( 'This is the general footer area', 'genesischild' ),
	'before_widget' => '<div class="footercontent">',
    'after_widget' => '</div>',
	) );
}
add_action( 'widgets_init', 'genesischild_extra_widgets' );	
//Position the Footer Area
function genesischild_footer_widget() {
    genesis_widget_area ('footercontent', array(
        'before' => '<div class="footercontainer">',
        'after' => '</div>',));
}
 
add_action('genesis_footer','genesischild_footer_widget');

/*
// Custom Footer
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] <a href="https://www.distracted.io/">distracted.io LLC</a> &middot; <a href="https://www.distracted.io/panel/contact.php">Contact Us</a> &middot; <a href="https://www.distracted.io/privacy-policy/">Privacy Policy</a> &middot; <a href="https://www.distracted.io/terms-of-service/">Terms of Service</a>';
	if(WP_ENV === 'development')
	{
		// Adds the number one to far right of footer to show we are in dev mode.
		$creds .= ' 1';
	}
	return $creds;
}
*/
include_once( 'lib/genesis-header-nav.php' );


