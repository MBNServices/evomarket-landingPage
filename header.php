<!DOCTYPE html>
<html lang="<?php echo esc_attr(get_bloginfo('language')); ?>" dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('evomarket-body'); ?>>
<?php wp_body_open(); ?>
<div class="site-shell">
    <header class="site-header" aria-label="<?php esc_attr_e('Primary header', 'evomarket'); ?>">
        <div class="site-header__inner">
            <a class="site-header__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'evomarket'); ?>">
                <img
                    class="site-header__logo"
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header-hero/logo.svg'); ?>"
                    alt="<?php esc_attr_e('EvoMarket', 'evomarket'); ?>"
                >
            </a>

            <button class="site-header__menu-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false">
                <span class="visually-hidden">Menu</span>
                <span class="site-header__menu-icon" aria-hidden="true"></span>
            </button>

            <nav class="site-header__nav" id="primary-navigation" aria-label="<?php esc_attr_e('Primary navigation', 'evomarket'); ?>">
                <ul class="site-header__menu">
                    <li><a class="is-active" href="#top">עמוד הבית</a></li>
                    <li><a href="#about">אודות</a></li>
                    <li><a href="#services">שירותים</a></li>
                    <li><a href="#works">עבודות</a></li>
                    <li><a href="#contact">צור קשר</a></li>
                </ul>
            </nav>

            <a class="site-header__cta" href="#contact">פניה בוואצפ</a>
        </div>
    </header>
