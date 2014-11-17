<?php
/**
 * This file is based on:
 *
 * Genesis Header Nav
 *
 * @package   Genesis_Header_Nav
 * @author    Gary Jones
 * @license   GPL-2.0+
 * @link      https://github.com/GaryJones/genesis-header-nav
 * @copyright 2013 Gary Jones, Gamajo Tech
 */








// Adds the menu location to the admin panel
add_action( 'init', 'register_header_nav_menu' );
// Adds the actual menu location to the front end
add_action( 'genesis_header', 'show_header_menu', 13 );
// Adds the Bootstrap collapse button
add_action( 'genesis_header', 'bs_collapse_button', 6);
add_action( 'genesis_header', 'bs_collapse_start', 12);
add_action( 'genesis_header', 'bs_collapse_end', 14);
//* Remove the header right widget area
unregister_sidebar( 'header-right' );

add_filter( 'genesis_attr_site-header', 'make_header_into_navbar' );

function register_header_nav_menu() {
	// Adds the menu location to the admin panel
	register_nav_menu( 'header', __( 'Header' ) );
}

function show_header_menu() {
// Adds the actual menu location to the front end

	$class = 'nav navbar-nav navbar-right';

	genesis_nav_menu(
		array(
			'theme_location' => 'header',
			'menu_class'     => $class,
		)
	);
}

function make_header_into_navbar()
{
	$class['class'] = 'navbar navbar-default navbar-static-top';
	return $class;
}

function bs_collapse_button()
{
	?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
	<?php
}
function bs_collapse_start()
{
	?>
          <div id="top-navbar" class="navbar-collapse collapse">
	<?php
}
function bs_collapse_end()
{
	?> </div> <?php
}