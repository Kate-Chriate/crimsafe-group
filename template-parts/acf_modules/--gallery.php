<?php
    $gallery = get_sub_field('gallery');

    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <?php if( $gallery ): ?>
        <div class="splide gallery-splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach( $gallery as $image ): ?>
                        <li class="splide__slide">
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</section>
