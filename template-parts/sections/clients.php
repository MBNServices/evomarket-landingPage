<?php
/**
 * Clients strip section.
 *
 * @package EvoMarket
 */

$asset_base = get_template_directory_uri() . '/assets/images/landing';
$client_logos = array(
    array('file' => 'logo-chase.png', 'alt' => 'Chase', 'width' => 137, 'height' => 26),
    array('file' => 'logo-walmart.png', 'alt' => 'Walmart', 'width' => 133, 'height' => 33),
    array('file' => 'logo-js.png', 'alt' => 'JavaScript', 'width' => 55, 'height' => 55),
    array('file' => 'logo-asana.png', 'alt' => 'Asana', 'width' => 122, 'height' => 25),
    array('file' => 'logo-buzzfeed.png', 'alt' => 'BuzzFeed', 'width' => 120, 'height' => 20),
    array('file' => 'logo-toggl.png', 'alt' => 'Toggl', 'width' => 96, 'height' => 42),
    array('file' => 'logo-buzzfeed.png', 'alt' => 'BuzzFeed', 'width' => 120, 'height' => 20),
    array('file' => 'logo-asana.png', 'alt' => 'Asana', 'width' => 122, 'height' => 25),
);
?>

<section class="clients-strip" aria-label="לוגואים של לקוחות">
    <div class="clients-strip__track">
        <?php foreach ($client_logos as $logo) : ?>
            <div
                class="clients-strip__item"
                style="<?php echo esc_attr(sprintf('width:%dpx;height:%dpx;', $logo['width'], $logo['height'])); ?>"
            >
                <img
                    src="<?php echo esc_url($asset_base . '/' . $logo['file']); ?>"
                    alt="<?php echo esc_attr($logo['alt']); ?>"
                    width="<?php echo esc_attr($logo['width']); ?>"
                    height="<?php echo esc_attr($logo['height']); ?>"
                >
            </div>
        <?php endforeach; ?>
    </div>
</section>
