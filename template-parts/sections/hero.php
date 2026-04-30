<?php
/**
 * Hero section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';

$service_cards = array(
    array(
        'modifier'       => 'design',
        'top_heading'    => 'תכנון חוויית משתמש',
        'lead'           => 'מתמחים בתכנון חוויית משתמש ומבנה מוצר מדויק, כדי לבנות בסיס נכון למערכת מקצועית, ברורה ואפקטיבית.',
        'title_outline'  => 'UX / UI',
        'title_solid'    => 'DESIGN',
        'icon'           => $asset_base . '/icon-sparkles.svg',
    ),
    array(
        'modifier'       => 'course',
        'top_heading'    => 'מערכות קורסים דיגיטליות',
        'lead'           => 'מפתחים מערכות קורסים ולמידה דיגיטלית שמעניקות למותג, למכללה או לתוכנית שלך מעטפת מקצועית ומסודרת.',
        'title_accent'   => 'ONLINE',
        'title_light'    => 'COURSE',
        'icon'           => $asset_base . '/icon-course-arrow.svg',
    ),
    array(
        'modifier'       => 'dashboards',
        'top_heading'    => 'פיתוח מערכות מורכבות',
        'heading'        => 'מפתחים מערכות Web ופתרונות SaaS מתקדמים בהתאמה מלאה לדרישות הלקוח ולתהליכים עסקיים מורכבים.',
        'title_solid'    => 'DASHBOARDS',
        'title_outline'  => 'SAAS',
        'icon'           => $asset_base . '/icon-loading.svg',
    ),
    array(
        'modifier'       => 'ecommerce',
        'top_heading'    => 'פיתוח חנויות אינטרנטיות',
        'description'    => 'חנות אינטרנטית חכמה ומעוצבת עם ניהול מלאי, הזמנות ולקוחות — הכל בתשלום חודשי וללא עלות הקמה.',
        'title_accent'   => 'WEBSITES &',
        'title_solid'    => 'ECOMMERCE',
        'icon'           => $asset_base . '/icon-double-right.svg',
    ),
);
?>

<section class="hero-section" id="top" aria-labelledby="hero-title">
    <div class="hero-panel">
        <img
            class="hero-panel__background"
            src="<?php echo esc_url($asset_base . '/hero-bg.png'); ?>"
            alt=""
            aria-hidden="true"
        >

        <div class="hero-content">
            <div class="hero-content__title-block">
                <p class="hero-content__welcome">ברוכים הבאים</p>
                <div class="hero-content__stack">
                    <h1 class="hero-content__title" id="hero-title">
                        <span class="hero-content__title-main">EVO</span>
                        <span class="hero-content__title-outline">Market</span>
                    </h1>
                    <p class="hero-content__subtitle">פתרונות דיגיטליים חכמים: אתרים, חנויות ומערכות מתקדמות</p>
                </div>
            </div>
            <a class="hero-content__cta" href="#contact">
                <span>התחל עכשיו</span>
                <img src="<?php echo esc_url($asset_base . '/icon-arrow-start.svg'); ?>" alt="" aria-hidden="true">
            </a>
        </div>
    </div>

    <div class="hero-services" id="services" aria-label="השירותים שלנו">
        <?php foreach ($service_cards as $card) : ?>
            <article class="service-card service-card--<?php echo esc_attr($card['modifier']); ?>">
                <div class="service-card__content">
                    <div class="service-card__top">
                        <p class="service-card__top-heading"><?php echo esc_html($card['top_heading']); ?></p>
                    </div>

                    <div class="service-card__body">
                        <?php if ('design' === $card['modifier'] || 'course' === $card['modifier']) : ?>
                            <p class="service-card__lead"><?php echo esc_html($card['lead']); ?></p>
                        <?php elseif ('dashboards' === $card['modifier']) : ?>
                            <p class="service-card__heading"><?php echo esc_html($card['heading']); ?></p>
                        <?php else : ?>
                            <p class="service-card__description"><?php echo esc_html($card['description']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="service-card__bottom">
                        <?php if ('design' === $card['modifier']) : ?>
                            <div class="service-card__bottom-main">
                                <div class="service-card__design-title">
                                    <p class="service-card__outline-title"><?php echo esc_html($card['title_outline']); ?></p>
                                    <h2 class="service-card__solid-title"><?php echo esc_html($card['title_solid']); ?></h2>
                                </div>
                                <img class="service-card__sparkles" src="<?php echo esc_url($card['icon']); ?>" alt="" aria-hidden="true">
                            </div>
                        <?php elseif ('course' === $card['modifier']) : ?>
                            <div class="service-card__bottom-main">
                                <div class="service-card__course-title">
                                    <h2 class="service-card__accent-title"><?php echo esc_html($card['title_accent']); ?></h2>
                                    <p class="service-card__light-title"><?php echo esc_html($card['title_light']); ?></p>
                                </div>
                                <img class="service-card__course-arrow" src="<?php echo esc_url($card['icon']); ?>" alt="" aria-hidden="true">
                            </div>
                        <?php elseif ('dashboards' === $card['modifier']) : ?>
                            <div class="service-card__bottom-main">
                                <div class="service-card__dashboard-title">
                                    <h2 class="service-card__dashboard-main"><?php echo esc_html($card['title_solid']); ?></h2>
                                    <p class="service-card__dashboard-sub"><?php echo esc_html($card['title_outline']); ?></p>
                                </div>
                                <img class="service-card__loader-image" src="<?php echo esc_url($card['icon']); ?>" alt="" aria-hidden="true">
                            </div>
                        <?php else : ?>
                            <div class="service-card__bottom-main">
                                <div class="service-card__ecommerce-bottom">
                                    <p class="service-card__accent"><?php echo esc_html($card['title_accent']); ?></p>
                                    <h2 class="service-card__ecommerce-title"><?php echo esc_html($card['title_solid']); ?></h2>
                                </div>
                                <img class="service-card__ecommerce-arrow" src="<?php echo esc_url($card['icon']); ?>" alt="" aria-hidden="true">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
