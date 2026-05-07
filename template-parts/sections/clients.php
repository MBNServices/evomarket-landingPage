<?php
/**
 * Technology ticker section.
 *
 * @package EvoMarket
 */

$technologies = array(
    'WordPress',
    'WooCommerce',
    'Elementor',
    'JavaScript',
    'PHP',
    'Python',
    'Java',
    'MySQL',
    'REST API',
    'Jira',
    'GitHub',
    'cPanel',
    'DirectAdmin',
    'Vercel',
    'Cloudflare',
    'Figma',
    'Canva',
    'N8N',
    'GPT',
);
?>

<section class="clients-strip" aria-label="טכנולוגיות וכלים">
    <div class="clients-strip__track">
        <?php foreach ($technologies as $technology) : ?>
            <div class="clients-strip__item">
                <span class="clients-strip__label"><?php echo esc_html($technology); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
