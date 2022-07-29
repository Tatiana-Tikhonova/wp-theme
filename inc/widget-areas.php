<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prefix_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'prefix'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'prefix'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer', 'prefix'),
            'id'            => 'sidebar-footer',
            'description'   => esc_html__('Add widgets here.', 'prefix'),
            'before_widget' => '<section id="%1$s" class="site-footer__item widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        )
    );
}
add_action('widgets_init', 'prefix_widgets_init');
