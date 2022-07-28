<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site-wrapper">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'prefix'); ?></a>
		<header id="masthead" class="site-header">
			<div class="container site-header__container">
				<?php the_header_image_tag(); ?>
				<div class="site-branding">
					<?php
					the_custom_logo();
					?>
					<div class="site-branding__text">
						<div class="site-branding__title"><?php bloginfo('name'); ?></div>
						<?php
						$prefix_description = get_bloginfo('description', 'display');
						if ($prefix_description || is_customize_preview()) : ?>
							<div class="site-branding__description"><?php echo $prefix_description; ?></div>
						<?php endif; ?>
					</div>
				</div><!-- .site-branding -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container' 	 => 'nav',
						'container_id'  => 'site-navigation',
						'container_class' => 'site-header__navigation main-navigation',
						'menu_class' => 'main-navigation__menu main-menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb' => '',
					)
				);
				?>
				<!-- #site-navigation -->
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</header>