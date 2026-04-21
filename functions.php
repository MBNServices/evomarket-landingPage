<?php

function evomarket_enqueue_assets() {
    wp_enqueue_style(
        'evomarket-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'evomarket-responsive-style',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('evomarket-main-style'),
        '1.0'
    );

    wp_enqueue_script(
        'evomarket-main-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'evomarket_enqueue_assets');

function evomarket_theme_setup() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'evomarket_theme_setup');
