<!DOCTYPE html>
<html lang="<?php echo esc_attr(get_bloginfo('language')); ?>" dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('evomarket-body'); ?>>
<?php wp_body_open(); ?>
<header class="site-header" aria-label="<?php esc_attr_e('Primary header', 'evomarket'); ?>">
    <div class="site-header__inner container">
        <a class="site-header__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'evomarket'); ?>">
            <img
                class="site-header__logo"
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header-hero/logo.svg'); ?>"
                alt="<?php esc_attr_e('EvoMarket', 'evomarket'); ?>"
            >
        </a>

        <nav class="site-header__nav" aria-label="<?php esc_attr_e('Primary navigation', 'evomarket'); ?>">
            <ul class="site-header__menu">
                <li><a class="is-active" href="#"><?php esc_html_e('עמוד הבית', 'evomarket'); ?></a></li>
                <li><a href="#about"><?php esc_html_e('אודות', 'evomarket'); ?></a></li>
                <li><a href="#services"><?php esc_html_e('שירותים', 'evomarket'); ?></a></li>
                <li><a href="#works"><?php esc_html_e('עבודות', 'evomarket'); ?></a></li>
                <li><a href="#contact"><?php esc_html_e('צור קשר', 'evomarket'); ?></a></li>
            </ul>
        </nav>

        <a class="site-header__cta" href="#contact"><?php esc_html_e('פניה בוואצפ', 'evomarket'); ?></a>
    </div>
</header>
