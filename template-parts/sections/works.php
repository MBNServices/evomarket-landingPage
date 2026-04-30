<?php
/**
 * Works section template.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';
$view_project_label = 'צפייה בפרויקט';
$project_tags = array('תחזוקה', 'פיתוח', 'UX/UI');

$rows = array(
    array(
        'title'          => 'אתרים מורכבים',
        'projects'       => array(
            array(
                'image'             => 'project-otlesegula.png',
                'alt'               => 'OtLesegula - אות לסגולה',
                'image_fit'         => 'contain',
                'card_title'        => 'OtLesegula  -  אות לסגולה',
                'description'       => 'אות לסגולה הוא אתר ייחודי המאפשר לגולשים למצוא את שמם או ביטוי אישי בתוך פסוקי התורה, לבחור פסוק פנוי, ולהקדיש אות, מילה או פסוק כסגולה לברכה, שמירה והצלחה. המערכת כוללת חיפוש חכם בעברית, מנגנון בחירה והזמנה, חיבור לתשלום, והפקת תעודה אישית מעוצבת עם פרטי ההקדשה.',
                'tags'              => $project_tags,
                'modal_title'       => 'OtLesegula - אות לסגולה',
                'modal_description' => 'אות לסגולה הוא אתר ייחודי המאפשר לגולשים למצוא את שמם או ביטוי אישי בתוך פסוקי התורה, לבחור פסוק פנוי, ולהקדיש אות, מילה או פסוק כסגולה לברכה, שמירה והצלחה. המערכת כוללת חיפוש חכם בעברית, מנגנון בחירה והזמנה, חיבור לתשלום, והפקת תעודה אישית מעוצבת עם פרטי ההקדשה.',
                'modal_images'      => array(
                    array('image' => 'project-otlesegula.png', 'alt' => 'OtLesegula - אות לסגולה'),
                ),
            ),
            array(
                'image'             => 'project-supercatalog.png',
                'alt'               => 'SuperCatalog - סופר קטלוג',
                'image_fit'         => 'contain',
                'card_title'        => 'SuperCatalog  -  סופר קטלוג',
                'description'       => 'מערכת ניהול מתקדמת שפותחה בהתאמה אישית לעסקים עם קטלוגי מוצרים גדולים. הפרויקט כלל פיתוח מסכי ספירת מלאי, ניהול קטלוג, הזמנות מספקים, סריקת ברקודים דרך מצלמת מובייל, חיבורי API פנימיים, עבודה עם קבצי Excel, שימוש במבני JSON לניהול נתונים מורכבים, שמירת היסטוריות, סינון מידע והפקת דוחות.',
                'tags'              => $project_tags,
                'modal_title'       => 'SuperCatalog - סופר קטלוג',
                'modal_description' => 'מערכת ניהול מתקדמת שפותחה בהתאמה אישית לעסקים עם קטלוגי מוצרים גדולים. הפרויקט כלל פיתוח מסכי ספירת מלאי, ניהול קטלוג, הזמנות מספקים, סריקת ברקודים דרך מצלמת מובייל, חיבורי API פנימיים, עבודה עם קבצי Excel, שימוש במבני JSON לניהול נתונים מורכבים, שמירת היסטוריות, סינון מידע והפקת דוחות.',
                'modal_images'      => array(
                    array('image' => 'project-supercatalog.png', 'alt' => 'SuperCatalog - סופר קטלוג'),
                ),
            ),
        ),
    ),
    array(
        'title'          => '',
        'projects'       => array(
            array(
                'image'             => 'project-halalitcar.png',
                'alt'               => 'HalalitCar - חללית קאר',
                'image_fit'         => 'contain',
                'card_title'        => 'HalalitCar  -  חללית קאר',
                'description'       => 'מערכת ניהול רכבים שפותחה ב־React עבור מגרש רכבים, ומאפשרת לנהל את מלאי הרכבים, לעדכן פרטים, לעקוב אחרי סטטוס הרכב ולהציג את הנתונים בצורה נוחה ומהירה.',
                'tags'              => $project_tags,
                'modal_title'       => 'HalalitCar - חללית קאר',
                'modal_description' => 'מערכת ניהול רכבים שפותחה ב־React עבור מגרש רכבים, ומאפשרת לנהל את מלאי הרכבים, לעדכן פרטים, לעקוב אחרי סטטוס הרכב ולהציג את הנתונים בצורה נוחה ומהירה.',
                'modal_images'      => array(
                    array('image' => 'project-halalitcar.png', 'alt' => 'HalalitCar - חללית קאר'),
                ),
            ),
            array(
                'image'             => 'project-medicalherbs.png',
                'alt'               => 'MedicalHerbs - המרכז לרפואה טבעית',
                'image_fit'         => 'contain',
                'card_title'        => 'MedicalHerbs  -  המרכז לרפואה טבעית',
                'description'       => 'אתר לימודי עבור המרכז לרפואה טבעית, הכולל מערכת למידה לסטודנטים, אזורי תוכן, שיעורים, חומרי לימוד וגישה מסודרת לקורסים דרך ממשק נוח ומותאם למובייל.',
                'tags'              => $project_tags,
                'modal_title'       => 'MedicalHerbs - המרכז לרפואה טבעית',
                'modal_description' => 'אתר לימודי עבור המרכז לרפואה טבעית, הכולל מערכת למידה לסטודנטים, אזורי תוכן, שיעורים, חומרי לימוד וגישה מסודרת לקורסים דרך ממשק נוח ומותאם למובייל.',
                'modal_images'      => array(
                    array('image' => 'project-medicalherbs.png', 'alt' => 'MedicalHerbs - המרכז לרפואה טבעית'),
                ),
            ),
        ),
    ),
    array(
        'title'          => 'חנויות אינטרנטיות',
        'projects'       => array(
            array(
                'image'             => 'project-medicalherbs.png',
                'alt'               => 'MedicalHerbs - המרכז לרפואה טבעית',
                'image_fit'         => 'contain',
                'card_title'        => 'MedicalHerbs  -  המרכז לרפואה טבעית',
                'description'       => 'טקסט זה הוא דוגמה לטקסט שניתן להחליף באותו חלל.טקסט זה נוצר ממחולל הטקסט בערבית,',
                'tags'              => $project_tags,
                'modal_title'       => 'MedicalHerbs - המרכז לרפואה טבעית',
                'modal_description' => 'טקסט זה הוא דוגמה לטקסט שניתן להחליף באותו חלל.טקסט זה נוצר ממחולל הטקסט בערבית,',
                'modal_images'      => array(
                    array('image' => 'project-medicalherbs.png', 'alt' => 'MedicalHerbs - המרכז לרפואה טבעית'),
                ),
            ),
            array(
                'image'             => 'project-hafistuk.png',
                'alt'               => 'Hafistuk - הפיסטוק',
                'image_fit'         => 'cover',
                'card_title'        => 'Hafistuk  -  הפיסטוק',
                'description'       => 'חנות אינטרנטית למוצרי פיצוחים, תבלינים ומזון יבש, עם קטלוג מוצרים ברור, עיצוב מותאם למותג, חוויית קנייה פשוטה וניהול מלאי ומוצרים דרך WooCommerce.',
                'tags'              => $project_tags,
                'modal_title'       => 'Hafistuk - הפיסטוק',
                'modal_description' => 'חנות אינטרנטית למוצרי פיצוחים, תבלינים ומזון יבש, עם קטלוג מוצרים ברור, עיצוב מותאם למותג, חוויית קנייה פשוטה וניהול מלאי ומוצרים דרך WooCommerce.',
                'modal_images'      => array(
                    array('image' => 'project-hafistuk.png', 'alt' => 'Hafistuk - הפיסטוק'),
                ),
            ),
        ),
    ),
);
?>

<section class="works-section" id="works" aria-labelledby="works-title">
    <h2 class="visually-hidden" id="works-title">עבודות</h2>
    <div class="works-section__heading" aria-hidden="true">WORKS</div>

    <div class="works-section__rows">
        <?php foreach ($rows as $row_index => $row) : ?>
            <?php
            $has_title = isset($row['title']) && trim((string) $row['title']) !== '';
            ?>
            <section class="works-row" aria-labelledby="works-row-<?php echo esc_attr($row_index + 1); ?>">
                <?php if ($has_title) : ?>
                    <header class="works-row__header">
                        <?php if ($has_title) : ?>
                            <h2 class="works-row__title" id="works-row-<?php echo esc_attr($row_index + 1); ?>">
                                <?php echo esc_html($row['title']); ?>
                            </h2>
                        <?php endif; ?>
                    </header>
                <?php else : ?>
                    <span class="visually-hidden" id="works-row-<?php echo esc_attr($row_index + 1); ?>">עבודות</span>
                <?php endif; ?>

                <div class="works-row__grid">
                    <?php foreach ($row['projects'] as $project_index => $project) : ?>
                        <?php
                        $project_key = 'project-' . ($row_index + 1) . '-' . ($project_index + 1);
                        $modal_images = ! empty($project['modal_images']) ? $project['modal_images'] : array(
                            array(
                                'image' => $project['image'],
                                'alt'   => $project['alt'],
                            ),
                        );
                        $modal_payload = array(
                            'title'       => ! empty($project['modal_title']) ? $project['modal_title'] : 'NAME PROJECT',
                            'description' => ! empty($project['modal_description']) ? $project['modal_description'] : '',
                            'images'      => array_map(
                                static function ($image) use ($asset_base, $project) {
                                    return array(
                                        'src' => esc_url($asset_base . '/' . $image['image']),
                                        'alt' => isset($image['alt']) ? $image['alt'] : $project['alt'],
                                    );
                                },
                                $modal_images
                            ),
                        );
                        $tags = ! empty($project['tags']) && is_array($project['tags']) ? $project['tags'] : $project_tags;
                        $image_fit = ! empty($project['image_fit']) ? $project['image_fit'] : 'contain';
                        ?>
                        <article class="project-card">
                            <button
                                class="project-card__trigger"
                                type="button"
                                data-project-key="<?php echo esc_attr($project_key); ?>"
                                data-project="<?php echo esc_attr(wp_json_encode($modal_payload)); ?>"
                                aria-haspopup="dialog"
                                aria-controls="works-project-modal"
                            >
                                <div class="project-card__media">
                                    <img
                                        class="project-card__image project-card__image--<?php echo esc_attr($image_fit); ?>"
                                        src="<?php echo esc_url($asset_base . '/' . $project['image']); ?>"
                                        alt="<?php echo esc_attr($project['alt']); ?>"
                                    >
                                    <?php if (! empty($project['extra_image'])) : ?>
                                        <img
                                            class="project-card__image project-card__image--overlay"
                                            src="<?php echo esc_url($asset_base . '/' . $project['extra_image']); ?>"
                                            alt=""
                                            aria-hidden="true"
                                        >
                                    <?php endif; ?>
                                </div>

                                <div class="project-card__body">
                                    <h3 class="project-card__title"><?php echo esc_html(! empty($project['card_title']) ? $project['card_title'] : 'NAME PROJECT'); ?></h3>
                                    <p class="project-card__text"><?php echo esc_html($project['description']); ?></p>
                                    <ul class="project-card__tags" aria-label="תגיות הפרויקט">
                                        <?php foreach ($tags as $tag) : ?>
                                            <li class="project-card__tag"><?php echo esc_html($tag); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <span class="project-card__cta" aria-hidden="true">
                                        <img src="<?php echo esc_url($asset_base . '/icon-eye.svg'); ?>" alt="">
                                        <span><?php echo esc_html($view_project_label); ?></span>
                                    </span>
                                </div>
                            </button>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <div class="works-modal" id="works-project-modal" hidden>
        <div class="works-modal__overlay" data-modal-close></div>
        <div
            class="works-modal__dialog"
            role="dialog"
            aria-modal="true"
            aria-labelledby="works-modal-title"
            aria-describedby="works-modal-description"
            tabindex="-1"
        >
            <button class="works-modal__close" type="button" data-modal-close aria-label="Close project details">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="works-modal__layout">
                <div class="works-modal__content">
                    <h3 class="works-modal__title" id="works-modal-title"></h3>
                    <p class="works-modal__description" id="works-modal-description"></p>
                </div>
                <div class="works-modal__media">
                    <div class="works-modal__slider">
                        <div class="works-modal__track" data-modal-track></div>
                    </div>
                    <div class="works-modal__controls" data-modal-controls>
                        <button class="works-modal__arrow works-modal__arrow--prev" type="button" data-modal-prev aria-label="Previous image">
                            <span aria-hidden="true">&lsaquo;</span>
                        </button>
                        <button class="works-modal__arrow works-modal__arrow--next" type="button" data-modal-next aria-label="Next image">
                            <span aria-hidden="true">&rsaquo;</span>
                        </button>
                    </div>
                    <div class="works-modal__dots" data-modal-dots aria-label="Image slide navigation"></div>
                </div>
            </div>
        </div>
    </div>
</section>
