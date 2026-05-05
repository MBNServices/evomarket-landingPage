<?php
/**
 * About section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';
$about_points = array(
    array(
        'title'       => 'אפיון לפני פיתוח',
        'description' => 'לפני שנוגעים בעיצוב או בקוד, אנחנו מגדירים את המטרה, את המשתמשים, את התהליך ואת הפעולות שהמערכת צריכה לבצע.',
    ),
    array(
        'title'       => 'פיתוח שמותאם לעבודה אמיתית',
        'description' => 'אנחנו בונים פתרונות שמשרתים את העסק ביום יום: חנויות, מערכות ניהול, אזורי משתמשים, אוטומציות, דוחות, הרשאות ואינטגרציות.',
    ),
);
?>

<section class="about-section" id="about" aria-labelledby="about-title">
    <img class="about-section__background reveal reveal-scale" src="<?php echo esc_url($asset_base . '/about-bg.png'); ?>" alt="" aria-hidden="true">

    <div class="about-section__content">
        <div class="about-section__copy reveal reveal-up">
            <p class="about-section__paragraph">
                EvoMarket היא חברת פיתוח דיגיטלית שמתמחה בבניית אתרים, חנויות ומערכות מותאמות אישית לעסקים שצריכים פתרון רציני, לא רק נוכחות באינטרנט.
            </p>
            <p class="about-section__paragraph">
                אנחנו משלבים אפיון עסקי, חשיבה מוצרית, עיצוב חוויית משתמש ופיתוח טכנולוגי כדי להפוך צורך עסקי למערכת ברורה, נוחה ויעילה. לפעמים זה אתר תדמית, לפעמים חנות אונליין, ולפעמים מערכת שלמה לניהול תהליכים, משתמשים, הרשאות, קטלוגים, הזמנות או תוכן לימודי.
            </p>
            <p class="about-section__paragraph">
                העבודה שלנו מתחילה מהבנת העסק: איך הוא עובד, מי משתמש במערכת, מה צריך לקרות מאחורי הקלעים, ואיך בונים פתרון שאפשר לנהל, להרחיב ולסמוך עליו לאורך זמן.
            </p>

            <div class="about-section__points">
                <?php foreach ($about_points as $point_index => $point) : ?>
                    <article class="about-point reveal reveal-up" style="--reveal-index: <?php echo esc_attr($point_index); ?>;">
                        <header class="about-point__header">
                            <h3 class="about-point__title"><?php echo esc_html($point['title']); ?></h3>
                            <img src="<?php echo esc_url($asset_base . '/icon-check-star.svg'); ?>" alt="" aria-hidden="true">
                        </header>
                        <p class="about-point__description"><?php echo esc_html($point['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="about-section__headline reveal reveal-up" style="--reveal-delay: 140ms;">
            <div class="about-section__title-group">
                <h2 class="about-section__title" id="about-title">EvoMarket</h2>
                <p class="about-section__title">פיתוח דיגיטלי</p>
                <p class="about-section__title">לעסקים שצריכים</p>
                <p class="about-section__title">יותר מאתר.</p>
            </div>

            <a class="about-section__cta" href="#contact">פניה בוואצפ</a>
        </div>
    </div>
</section>
