<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WPTheme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function prefix_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'prefix_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function prefix_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'prefix_pingback_header');




function taty_change_logo_class($html)
{
	$html = str_replace('custom-logo', 'site-branding__logo', $html);
	$html = str_replace('custom-logo-link', 'site-branding__logo-link', $html);

	return $html;
}
add_filter('get_custom_logo', 'taty_change_logo_class');
