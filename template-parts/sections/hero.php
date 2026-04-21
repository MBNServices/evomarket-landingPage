<?php
/**
 * Hero section template.
 *
 * @package EvoMarket
 */

$hero_asset_base = get_template_directory_uri() . '/assets/images/header-hero';
?>

<section class="hero-section" aria-labelledby="hero-title">
    <div class="container">
        <div class="hero-panel">
            <div class="hero-content">
                <h1 class="hero-content__title" id="hero-title">
                    <img
                        class="hero-content__title-image"
                        src="<?php echo esc_url($hero_asset_base . '/title-section-1.png'); ?>"
                        alt="<?php esc_attr_e('ברוכים הבאים DIGITAL AGENCY נוכחות דיגיטלית חזקה חשובה היום יותר מאי פעם', 'evomarket'); ?>"
                    >
                </h1>
                <a class="hero-content__cta" href="#contact" aria-label="<?php esc_attr_e('התחל עכשיו', 'evomarket'); ?>">
                    <img
                        class="hero-content__cta-image"
                        src="<?php echo esc_url($hero_asset_base . '/hero-button.png'); ?>"
                        alt="<?php esc_attr_e('התחל עכשיו', 'evomarket'); ?>"
                    >
                </a>
            </div>

            <img
                class="hero-panel__earth"
                src="<?php echo esc_url($hero_asset_base . '/global-earth.jpg'); ?>"
                alt=""
                aria-hidden="true"
            >
        </div>

        <div class="hero-services" id="services" aria-label="<?php esc_attr_e('Featured services', 'evomarket'); ?>">
            <article class="service-card service-card--ecommerce">
                <div class="service-card__intro">
                    <p class="service-card__eyebrow"><?php esc_html_e('עיצוב ופיתוח אתרים', 'evomarket'); ?></p>
                    <p class="service-card__description"><?php esc_html_e('טקסט זה הוא דוגמה לטקסט שניתן להחליף באותו חלל.', 'evomarket'); ?></p>
                </div>
                <div class="service-card__footer service-card__footer--stacked">
                    <p class="service-card__accent">WEBSITES &amp;</p>
                    <h2 class="service-card__title service-card__title--small">ECOMMERCE &raquo;</h2>
                </div>
            </article>

            <article class="service-card service-card--dashboards">
                <p class="service-card__kicker"><?php esc_html_e('פיתוח מערכות מורכבות', 'evomarket'); ?></p>
                <div class="service-card__loader" aria-hidden="true"></div>
                <h2 class="service-card__title">DASHBOARDS<br><span>SAAS</span></h2>
            </article>

            <article class="service-card service-card--course">
                <p class="service-card__kicker"><?php esc_html_e('טקסט זה הוא דוגמה לטקסט שניתן להחליף באותו חלל.', 'evomarket'); ?></p>
                <h2 class="service-card__title">ONLINE<br><span>COURSE</span></h2>
            </article>

            <article class="service-card service-card--design">
                <p class="service-card__kicker"><?php esc_html_e('המומחיות שלנו היא בעיצוב ממשק וחוויית משתמש ברמה גבוהה ואיכותית', 'evomarket'); ?></p>
                <div class="service-card__spark" aria-hidden="true">✦</div>
                <h2 class="service-card__title">UX / UI<br><span>DESIGN</span></h2>
            </article>
        </div>
    </div>
</section>
