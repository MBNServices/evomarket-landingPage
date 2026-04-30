<?php
/**
 * Contact section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';

$contact_items = array(
    array(
        'value' => '+972 54-266-6083',
        'type'  => 'phone',
    ),
    array(
        'value' => 'gmail@gmail.com',
        'type'  => 'mail',
    ),
    array(
        'value' => 'מונטיפיורי 14, הרצליה',
        'type'  => 'location',
    ),
);
?>

<section class="contact-section" id="contact" aria-labelledby="contact-title">
    <div class="contact-section__inner">
        <form class="contact-form landing-form" action="#" method="post">
            <img class="contact-form__background" src="<?php echo esc_url($asset_base . '/contact-bg.png'); ?>" alt="" aria-hidden="true">

            <div class="contact-form__row">
                <label class="contact-form__field">
                    <span class="contact-form__label">שם משפחה</span>
                    <input type="text" name="last_name" placeholder="הזן שם משפחה">
                </label>

                <label class="contact-form__field">
                    <span class="contact-form__label">שם פרטי</span>
                    <input type="text" name="first_name" placeholder="הזן שם פרטי">
                </label>
            </div>

            <div class="contact-form__row">
                <label class="contact-form__field">
                    <span class="contact-form__label">דוא”ל</span>
                    <input type="email" name="email" placeholder="הזן כתובת דוא”ל">
                </label>

                <label class="contact-form__field">
                    <span class="contact-form__label">טלפון</span>
                    <span class="contact-form__phone-wrap">
                        <input type="tel" name="phone" value="052-890-4501">
                        <span class="contact-form__phone-prefix" aria-hidden="true">
                            <img src="<?php echo esc_url($asset_base . '/icon-phone-caret.svg'); ?>" alt="">
                            <span>IL</span>
                        </span>
                    </span>
                </label>
            </div>

            <label class="contact-form__field contact-form__field--message">
                <span class="contact-form__label">הודעה</span>
                <span class="contact-form__textarea-wrap">
                    <textarea name="message" rows="5" placeholder="ספר לנו על הפרוייקט שלך..."></textarea>
                    <img class="contact-form__textarea-handle" src="<?php echo esc_url($asset_base . '/icon-textarea-handle.svg'); ?>" alt="" aria-hidden="true">
                </span>
            </label>

            <div class="contact-form__footer">
                <button class="contact-form__submit" type="submit">
                    <span>שליחת הודעה</span>
                    <img src="<?php echo esc_url($asset_base . '/icon-send.svg'); ?>" alt="" aria-hidden="true">
                </button>

                <label class="contact-form__checkbox">
                    <span>אני מקבל את <u>תנאים שימוש</u></span>
                    <input type="checkbox" name="terms">
                    <span class="contact-form__checkbox-box" aria-hidden="true"></span>
                </label>
            </div>
        </form>

        <div class="contact-info">
            <header class="contact-info__header">
                <h2 class="contact-info__title" id="contact-title">אנו נשמח לעמוד לרשותך!</h2>
                <p class="contact-info__text">טקסט הפסקה משמש כדוגמה למילוי עבור תבנית. ניתן להחליף טקסט זה בתוכן אמיתי.</p>
            </header>

            <div class="contact-info__list">
                <?php foreach ($contact_items as $item) : ?>
                    <div class="contact-info__item">
                        <span class="contact-info__value"><?php echo esc_html($item['value']); ?></span>
                        <span class="contact-info__icon contact-info__icon--<?php echo esc_attr($item['type']); ?>" aria-hidden="true"></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
