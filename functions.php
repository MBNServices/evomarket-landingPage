<?php

function evomarket_enqueue_assets() {
    wp_enqueue_style(
        'evomarket-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
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