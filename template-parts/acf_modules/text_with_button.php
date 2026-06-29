<?php 
    $copy = get_sub_field('copy');
    $title = get_sub_field('title');
    $button = get_sub_field('link');
    $logo = get_sub_field('logo');
    $logoautoheight = get_sub_field('increase_logo_height');
    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container p-4 p-lg-0">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <div class="text-module__content medium">
                   <?php if($copy) {?> <h2 class="text-center mb-70"><?php echo $title; ?></h2> <?php } ?>
                    <?php if($copy) { echo $copy; } ?>
                    <?php if( $button ): ?>
                        <a href="<?php echo esc_url($button['url']); ?>" target="_blank" class="btn btn--primary mt-4 d-inline-block"><?php echo esc_html($button['title']); ?> &nbsp; <?php echo file_get_contents(get_template_directory_uri() . '/lib/images/arrow.svg'); ?></a>
                    <?php endif; ?>
                    <?php if ($logo) { ?>
                        <div class="text-module__logo py-5 <?php if($logoautoheight) { echo 'autoheight';} ?>">
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>