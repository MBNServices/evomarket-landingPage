<?php

function evomarket_enqueue_assets() {
    $theme_directory = get_template_directory();
    $theme_uri       = get_template_directory_uri();

    wp_enqueue_style(
        'evomarket-main-style',
        $theme_uri . '/assets/css/main.css',
        array(),
        filemtime($theme_directory . '/assets/css/main.css')
    );

    wp_enqueue_style(
        'evomarket-responsive-style',
        $theme_uri . '/assets/css/responsive.css',
        array('evomarket-main-style'),
        filemtime($theme_directory . '/assets/css/responsive.css')
    );

    wp_enqueue_script(
        'evomarket-main-script',
        $theme_uri . '/assets/js/main.js',
        array(),
        filemtime($theme_directory . '/assets/js/main.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'evomarket_enqueue_assets');

function evomarket_theme_setup() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'evomarket_theme_setup');
