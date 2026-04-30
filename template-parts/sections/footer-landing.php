<?php
/**
 * Landing footer section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';

$footer_columns = array(
    array(
        'title' => 'פרויקטים',
        'items' => array(
            'לינק פרוייקט 01',
            'לינק פרוייקט 01',
            'לינק פרוייקט 01',
            'לינק פרוייקט 01',
            'לינק פרוייקט 01',
            'לינק פרוייקט 01',
        ),
    ),
    array(
        'title' => 'שירותים',
        'items' => array(
            'אתרי תדמית',
            'חנויות דיגיטליות',
            'מערכות מורכבות',
            'אתרי קורסים',
            'כרטיסי ביקור דיגטלים',
        ),
    ),
    array(
        'title' => 'מפת אתר',
        'items' => array(
            'עמוד הבית',
            'אודות',
            'עבודות',
            'צור קשר',
        ),
        'highlight' => 'עמוד הבית',
    ),
);

$social_icons = array('x', 'instagram', 'youtube', 'facebook', 'linkedin');
?>

<section class="landing-footer" aria-label="פוטר">
    <div class="landing-footer__card">
        <div class="landing-footer__top">
            <div class="landing-footer__columns">
                <?php foreach ($footer_columns as $column) : ?>
                    <div class="landing-footer__column">
                        <h2 class="landing-footer__column-title"><?php echo esc_html($column['title']); ?></h2>
                        <ul class="landing-footer__links">
                            <?php foreach ($column['items'] as $item) : ?>
                                <li>
                                    <a
                                        class="landing-footer__link<?php echo (! empty($column['highlight']) && $column['highlight'] === $item) ? ' is-active' : ''; ?>"
                                        href="#"
                                    >
                                        <?php echo esc_html($item); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="landing-footer__brand-area">
                <a class="landing-footer__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="EvoMarket">
                    <span class="landing-footer__brand-mark">
                        <img src="<?php echo esc_url($asset_base . '/footer-mark.png'); ?>" alt="" aria-hidden="true">
                    </span>
                    <img class="landing-footer__brand-logo" src="<?php echo esc_url($asset_base . '/footer-logo.svg'); ?>" alt="EvoMarket">
                </a>

                <form class="landing-footer__subscribe footer-subscribe" action="#" method="post">
                    <label class="landing-footer__subscribe-label" for="footer-email">אני רוצה להיות ברשימת התפוצה שלכם!</label>
                    <div class="landing-footer__subscribe-row">
                        <button type="submit">קבל מייל</button>
                        <input id="footer-email" type="email" name="footer_email" placeholder="הזן כתובת דוא”ל">
                    </div>
                </form>
            </div>
        </div>

        <div class="landing-footer__bottom">
            <div class="landing-footer__copyright">
                <span>כל הזכויות שמורות</span>
                <strong>© 2024</strong>
            </div>

            <div class="landing-footer__socials" aria-label="רשתות חברתיות">
                <?php foreach ($social_icons as $icon) : ?>
                    <a class="landing-footer__social" href="#" aria-label="<?php echo esc_attr($icon); ?>">
                        <img src="<?php echo esc_url($asset_base . '/icon-social-' . $icon . '.svg'); ?>" alt="" aria-hidden="true">
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="landing-footer__legal">
                <a href="#">תנאי שימוש</a>
                <a href="#">מדיניות פרטיות</a>
            </div>
        </div>
    </div>
</section>
