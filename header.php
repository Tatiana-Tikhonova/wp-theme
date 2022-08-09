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
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'tati'); ?></a>
		<header id="masthead" class="site-header">
			<div class="customize-test" style="color:<?php echo get_theme_mod('my_color_control'); ?>;">
				<p><?php //echo get_theme_mod('text_input'); 
					?></p>
				<?php
				echo '<pre>';
				print_r(get_theme_mod('my_media_control'));
				echo '</pre>';
				echo wp_get_attachment_image(get_theme_mod('my_media_control'), 'full');
				// if (get_theme_mod('my_media_control')) {
				// 	echo '<video controls="controls">
				// 	<source src="' . wp_get_attachment_url(get_theme_mod('my_media_control')) . '">
				// 	</video>';
				// }
				// if (get_theme_mod('my_media_control')) {
				// 	echo '<audio controls src="' . wp_get_attachment_url(get_theme_mod('my_media_control')) . '"></audio>';
				// }
				//wp_add_inline_script('wayup-customizer', get_theme_mod('my_code_editor')); 
				?>
			</div>
			<div class="container site-header__container">
				<?php
				//the_header_image_tag(array('class' => 'site-header__bg')); 
				?>
				<div class="site-branding">
					<?php
					the_custom_logo();
					?>
					<div class="site-branding__text">
						<div class="site-branding__title"><?php bloginfo('name'); ?></div>
						<?php
						$tati_description = get_bloginfo('description', 'display');
						if ($tati_description || is_customize_preview()) : ?>
							<div class="site-branding__description"><?php echo $tati_description; ?></div>
						<?php endif; ?>
					</div>
				</div><!-- .site-branding -->

				<?php
				get_search_form();
				?>

				<button type="button" class="header-search__open">&#128269;</button>
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
					<span class="menu-toggle__wrapper">
						<span class="menu-toggle__line"></span>
						<span class="menu-toggle__line"></span>
						<span class="menu-toggle__line"></span>
					</span>
				</button>
			</div>
		</header>