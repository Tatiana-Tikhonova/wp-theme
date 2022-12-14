<?php

/**
 * базовый функционал темы
 */
if (!function_exists('tati_setup')) :
    function tati_setup()
    {
        load_theme_textdomain('tati', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
        add_theme_support(
            'custom-background',
            apply_filters(
                'tati_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
                'header-text' => array('site-title', 'site-description'),
                'unlink-homepage-logo' => true,
            )
        );


        add_theme_support('customize-selective-refresh-widgets');

        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'tati'),
            )
        );
    }
    add_action('after_setup_theme', 'tati_setup');
endif;

/**
 * базовая ширина контента в пикселях
 * @global int $content_width
 */
// function tati_content_width()
// {
//     $GLOBALS['content_width'] = apply_filters('tati_content_width', 1000);
// }
// add_action('after_setup_theme', 'tati_content_width', 0);
