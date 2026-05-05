<?php
/**
 * Landing footer section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';
$footer_email = 'info@EvoMarket.info';
$footer_phone = '+972 54-266-6083';
$terms_url = 'mailto:' . $footer_email . '?subject=' . rawurlencode('בקשה לקבלת תנאי שימוש');
$privacy_url = 'mailto:' . $footer_email . '?subject=' . rawurlencode('בקשה לקבלת מדיניות פרטיות');

$footer_contact_items = array(
    array(
        'value' => $footer_phone,
        'type'  => 'phone',
        'url'   => 'tel:+972542666083',
    ),
    array(
        'value' => $footer_email,
        'type'  => 'mail',
        'url'   => 'mailto:' . $footer_email,
    ),
);

$social_icons = array(
    array(
        'icon'  => 'x',
        'label' => 'X',
        'url'   => 'https://x.com/',
    ),
    array(
        'icon'  => 'instagram',
        'label' => 'Instagram',
        'url'   => 'https://www.instagram.com/',
    ),
    array(
        'icon'  => 'youtube',
        'label' => 'YouTube',
        'url'   => 'https://www.youtube.com/',
    ),
    array(
        'icon'  => 'facebook',
        'label' => 'Facebook',
        'url'   => 'https://www.facebook.com/',
    ),
    array(
        'icon'  => 'linkedin',
        'label' => 'LinkedIn',
        'url'   => 'https://www.linkedin.com/',
    ),
);
?>

<section class="landing-footer" id="contact" aria-label="<?php esc_attr_e('Footer', 'evomarket'); ?>">
    <div class="landing-footer__card">
        <div class="landing-footer__top">
            <form class="landing-footer__form landing-form reveal reveal-up" action="<?php echo esc_url('mailto:' . $footer_email); ?>" method="post" enctype="text/plain" data-footer-mailto="<?php echo esc_attr($footer_email); ?>">
                <img class="landing-footer__form-background" src="<?php echo esc_url($asset_base . '/contact-bg.png'); ?>" alt="" aria-hidden="true">

                <div class="landing-footer__form-row">
                    <label class="landing-footer__field">
                        <span class="landing-footer__field-label">שם החברה</span>
                        <input type="text" name="footer_company_name" placeholder="לדוגמא: מנופים בע״מ">
                    </label>

                    <label class="landing-footer__field">
                        <span class="landing-footer__field-label">שם מלא</span>
                        <input type="text" name="footer_full_name" placeholder="לדוגמא: שלמה ארצי">
                    </label>
                </div>

                <div class="landing-footer__form-row landing-footer__form-row--single">
                    <label class="landing-footer__field">
                        <span class="landing-footer__field-label">טלפון</span>
                        <span class="landing-footer__phone-wrap">
                            <input type="tel" name="footer_phone" value="052-890-4501">
                            <span class="landing-footer__phone-prefix" aria-hidden="true">
                                <img src="<?php echo esc_url($asset_base . '/icon-phone-caret.svg'); ?>" alt="">
                                <span>IL</span>
                            </span>
                        </span>
                    </label>
                </div>

                <label class="landing-footer__field landing-footer__field--message">
                    <span class="landing-footer__field-label">הודעה</span>
                    <span class="landing-footer__textarea-wrap">
                        <textarea name="footer_message" rows="5" placeholder="שניה לפני שאנחנו מדברים, נשמח שתספר/י לנו בקצרה כיצד נוכל לעזור לך (-:"></textarea>
                        <img class="landing-footer__textarea-handle" src="<?php echo esc_url($asset_base . '/icon-textarea-handle.svg'); ?>" alt="" aria-hidden="true">
                    </span>
                </label>

                <div class="landing-footer__form-footer">
                    <button class="landing-footer__submit" type="submit">
                        <span>שליחת הודעה</span>
                        <img src="<?php echo esc_url($asset_base . '/icon-send.svg'); ?>" alt="" aria-hidden="true">
                    </button>

                    <label class="landing-footer__checkbox">
                        <input type="checkbox" name="footer_terms">
                        <span class="landing-footer__checkbox-box" aria-hidden="true"></span>
                        <span>אני מקבל את <a href="<?php echo esc_url($terms_url); ?>">תנאים שימוש</a></span>
                    </label>
                </div>
            </form>

            <div class="landing-footer__brand-area reveal reveal-up" style="--reveal-delay: 140ms;">
                <a class="landing-footer__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="EvoMarket">
                    <span class="landing-footer__brand-mark">
                        <img src="<?php echo esc_url($asset_base . '/footer-mark.png'); ?>" alt="" aria-hidden="true">
                    </span>
                    <img class="landing-footer__brand-logo" src="<?php echo esc_url($asset_base . '/footer-logo.svg'); ?>" alt="EvoMarket">
                </a>

                <div class="landing-footer__intro">
                    <h2 class="landing-footer__headline">אנו נשמח לעמוד לרשותך!</h2>
                    <p class="landing-footer__text">אתר תדמית, חנות אונליין, מערכת ניהול, פלטפורמת למידה או פתרון מותאם אישית, נתחיל מהצורך העסקי ונבנה יחד תהליך נכון.</p>
                </div>

                <div class="landing-footer__contact-list">
                    <?php foreach ($footer_contact_items as $item) : ?>
                        <a class="landing-footer__contact-item" href="<?php echo esc_url($item['url']); ?>">
                            <span class="landing-footer__contact-value"><?php echo esc_html($item['value']); ?></span>
                            <span class="contact-info__icon contact-info__icon--<?php echo esc_attr($item['type']); ?>" aria-hidden="true"></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="landing-footer__bottom reveal reveal-fade">
            <div class="landing-footer__copyright">
                <span>כל הזכויות שמורות © EvoMarket</span>
            </div>

            <div class="landing-footer__socials" aria-label="רשתות חברתיות">
                <?php foreach ($social_icons as $icon) : ?>
                    <a class="landing-footer__social" href="<?php echo esc_url($icon['url']); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr($icon['label']); ?>">
                        <img src="<?php echo esc_url($asset_base . '/icon-social-' . $icon['icon'] . '.svg'); ?>" alt="" aria-hidden="true">
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="landing-footer__legal">
                <a href="<?php echo esc_url($terms_url); ?>">תנאי שימוש</a>
                <a href="<?php echo esc_url($privacy_url); ?>">מדיניות פרטיות</a>
            </div>
        </div>
    </div>
</section>
