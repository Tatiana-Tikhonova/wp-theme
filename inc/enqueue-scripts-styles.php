<?php

/**
 * Enqueue scripts and styles.
 */
function prefix_scripts()
{
    wp_enqueue_style('prefix-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('prefix-main-styles', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);

    wp_enqueue_script('prefix-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'prefix_scripts');
