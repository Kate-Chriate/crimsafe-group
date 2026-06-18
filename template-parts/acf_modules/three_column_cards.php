<?php
    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];

?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container">
        <div class="row g-4">
            <?php
            if( have_rows('cards') ):
                while( have_rows('cards') ) : the_row();

                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $copy = get_sub_field('copy');
                    $link = get_sub_field('link');
                    ?>
                    <div class="col-12 col-xl-4">
                        <div class="column-card p-3 pb-4 p-md-4 p-xxl-5 d-flex flex-column justify-content-between">
                            <div class="column-card__content">
                                <?php if( $image ): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="feature-card__image mb-3 mb-lg-4" />
                                <?php endif; ?>

                                <?php if( $title ): ?><p class="large bold mb-3 mb-lg-4"><?php echo $title; ?></p><?php endif; ?>
                                <?php if( $copy ): ?><div class="column-card__copy"><?php echo $copy; ?></div><?php endif; ?>
                            </div>
                            <?php if( $link ): ?>
                                <a href="<?php echo $link['url']; ?>" target="_blank" class="btn btn--primary mt-4 d-inline-block"><?php echo $link['title']; ?> &nbsp; <?php echo file_get_contents(get_template_directory() . '/lib/images/arrow.svg'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
