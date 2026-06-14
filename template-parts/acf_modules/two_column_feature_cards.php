<?php
    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container pe-0 pe-lg-reset">
        <div class="two-col-feature-splide splide">
            <div class="splide__track">
                <ul class="splide__list d-flex">
                    <?php
                    if( have_rows('cards') ):
                        while( have_rows('cards') ) : the_row();

                            $image = get_sub_field('image');
                            $title = get_sub_field('title');
                            $copy = get_sub_field('copy');
                            $link = get_sub_field('link');
                            ?>
                            <li class="splide__slide feature-card-col">
                                <div class="feature-card p-3 p-lg-5">
                                    <?php if( $image ): ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="feature-card__image mb-4 mb-xxl-5" />
                                    <?php endif; ?>
                                    <div class="feature-card__content">
                                        <h3 class="feature-card__title mb-4 mb-xxl-5"><?php echo $title; ?></h3>
                                        <div class="feature-card__copy"><?php echo $copy; ?></div>
                                        <?php if( $link ): ?>
                                            <a href="<?php echo $link['url']; ?>" target="_blank" class="btn btn--primary mt-lg-4 d-inline-block"><span class="btn__inner d-flex align-items-center justify-content-between"><?php echo $link['title']; ?> &nbsp; <?php echo file_get_contents(get_template_directory_uri() . '/lib/images/arrow.svg'); ?></span></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
