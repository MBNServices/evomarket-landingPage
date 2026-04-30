<?php
/**
 * About section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';
$about_points = array(
    array(
        'title'       => 'עיצוב שמרגש, טכנולוגיה שמביאה תוצאות',
        'description' => 'האתרים שאנחנו מייצרים לא רק יפים, אלא גם חכמים. עיצוב אסתטי בשילוב ממשקים אינטואיטיביים מבטיחים חוויית משתמש חלקה.',
    ),
    array(
        'title'       => 'פתרונות דיגיטליים בהתאמה אישית לעסק שלך',
        'description' => 'כל עסק הוא ייחודי, ואנחנו מתאימים את תהליך העבודה לצרכים שלך. בעזרת יחס אישי ושיתוף פעולה הדוק, אנו בונים אסטרטגיות מותאמות אישית',
    ),
);
?>

<section class="about-section" id="about" aria-labelledby="about-title">
    <img class="about-section__background" src="<?php echo esc_url($asset_base . '/about-bg.png'); ?>" alt="" aria-hidden="true">

    <div class="about-section__content">
        <div class="about-section__copy">
            <p class="about-section__paragraph">
                אצלנו ב-MBNServices, אנו מאמינים כי נוכחות דיגיטלית חזקה היא השער להצלחה בעידן המודרני.
            </p>
            <p class="about-section__paragraph">
                אנו לא רק בונים אתרים – אנו יוצרים חוויות שמדברות לקהל היעד שלך ומחברות אותו לעסק שלך בצורה בלתי נשכחת.
            </p>
            <p class="about-section__paragraph">
                בעזרת עיצוב אסתטי, ממשקים אינטואיטיביים ותהליכים מותאמים אישית, אנו הופכים רעיונות למציאות דיגיטלית שמייצרת תוצאות.
            </p>

            <div class="about-section__points">
                <?php foreach ($about_points as $point) : ?>
                    <article class="about-point">
                        <header class="about-point__header">
                            <h3 class="about-point__title"><?php echo esc_html($point['title']); ?></h3>
                            <img src="<?php echo esc_url($asset_base . '/icon-check-star.svg'); ?>" alt="" aria-hidden="true">
                        </header>
                        <p class="about-point__description"><?php echo esc_html($point['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="about-section__headline">
            <div class="about-section__title-group">
                <h2 class="about-section__title" id="about-title">דיגיטלית שמרגישים,</h2>
                <div class="about-section__title-row">
                    <img src="<?php echo esc_url($asset_base . '/icon-about-double-right.svg'); ?>" alt="" aria-hidden="true">
                    <p class="about-section__title">לבנות נוכחות</p>
                </div>
                <div class="about-section__title-row about-section__title-row--end">
                    <p class="about-section__title">רואים ומצליחים!</p>
                    <img src="<?php echo esc_url($asset_base . '/icon-about-arrow.svg'); ?>" alt="" aria-hidden="true">
                </div>
            </div>

            <a class="about-section__cta" href="#contact">פניה בוואצפ</a>
        </div>
    </div>
</section>
