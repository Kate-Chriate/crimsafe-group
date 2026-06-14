<?php
    $copy = get_sub_field('copy');
    $title = get_sub_field('title');
    $button = get_sub_field('link');

    $background = get_sub_field('background_image');
    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="count-stats-section <?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container px-0 px-lg-3">
        <div class="row g-0 justify-content-center">
            <div class="col-12 col-lg-7 text-center p-4 p-lg-0">
                <h2 class="mb-70"><?php echo $title; ?></h2>
                <p class="mb-70"><?php echo $copy; ?></p>
            </div>
        </div>
        <div class="number-stats-splide splide">
            <div class="splide__track">
                <ul class="splide__list d-flex justify-content-lg-center">
                    <?php if (have_rows('statistics')) : ?>
                        <?php while (have_rows('statistics')) : the_row();
                            $number = get_sub_field('number');
                            $after = get_sub_field('after_number');
                            $label = get_sub_field('label');
                        ?>
                            <li class="splide__slide col-lg-2">
                                <div class="number-stats_item">
                                    <div class="number-stats__content d-flex h-100 align-items-center justify-content-center  flex-column text-center">
                                        <h1 class="number-stats__number mb-0"><span class="count-up" data-target="<?php echo esc_attr($number); ?>">0</span><?php if($after) { echo '<span class="count-after">' . esc_html($after) . '</span>'; } ?></h1>
                                        <p class="number-stats__label mb-0"><?php echo $label; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php if ($background) { ?><img src="<?php echo $background['url']; ?>" alt="<?php echo $background['alt']; ?>" class="count-stats-back" /> <?php } ?>
</section>
