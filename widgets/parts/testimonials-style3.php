<?php if (!defined('ABSPATH')) exit; ?>

<div class="swiper-slide elementor-repeater-item-<?php echo esc_attr($testimonial['_id']); ?>">
    <div <?php $this->print_render_attribute_string('testimonial'); ?>>

        <?php if (!empty($data['quote_icon']['value']) && $data['quote_icon_trigger'] == 'yes'): ?>
            <div class="ese-quote-icon">
                <?php esse_render_icon($data['quote_icon']) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($testimonial['review'])): ?>
            <div class="ese-review">
                <?php echo esc_html($testimonial['review']) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($testimonial['rating'])&& $data['stars_trigger'] == 'yes'): ?>
            <div class="ese-stars">
                <?php if (!empty($testimonial['rating'] >= 1)): ?>
                    <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/star.svg') ?>
                <?php endif; ?>
                <?php if (!empty($testimonial['rating'] >= 2)): ?>
                    <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/star.svg') ?>
                <?php endif; ?>
                <?php if (!empty($testimonial['rating'] >= 3)): ?>
                    <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/star.svg') ?>
                <?php endif; ?>
                <?php if (!empty($testimonial['rating'] >= 4)): ?>
                    <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/star.svg') ?>
                <?php endif; ?>
                <?php if (!empty($testimonial['rating'] >= 5)): ?>
                    <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/star.svg') ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="ese-bottom">
            <div class="ese-left">
                <?php if (!empty($testimonial['client_image']['url'])): ?>
                    <div class="ese-image" style="background-image:url('<?php echo esc_url($testimonial['client_image']['url']) ?>');"></div>
                <?php endif; ?>
            </div>
            <div class="ese-center">
                <?php if (!empty($testimonial['name'])): ?>
                    <div class="ese-name">
                        <?php echo esc_html($testimonial['name']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($testimonial['role'])): ?>
                    <div class="ese-role">
                        <?php echo esc_html($testimonial['role']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="ese-right">
                <?php if (!empty($testimonial['client_logo']['url'])): ?>
                    <div class="ese-logo">
                        <img src="<?php echo esc_url($testimonial['client_logo']['url']); ?>" alt="client logo">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>