<?php 
    $text_content = get_sub_field('text_content');
        $copy = $text_content['copy'];
        $title = $text_content['title'];
        $button = $text_content['link'];
        $button_2 = $text_content['link_2'];

    $image = get_sub_field('image');

    $block_order = get_sub_field('block_order');

    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container-fluid px-0">
        <div class="row justify-content-center g-0">
            <div class="col-12 col-lg-6 <?php if($block_order == 'image-right') { echo 'order-1 order-lg-2';} ?>">
                <?php if ($image): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="cta-img h-100" />
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6 flex-grow <?php if($block_order == 'image-right') { echo 'order-2 order-lg-1';} ?>">
                <div class="cta-module__content h-100 p-70 large">
                   <?php if($title) {?> <h2 class="mb-70"><?php echo $title; ?></h2> <?php } ?>
                    <?php if($copy) { echo $copy; } ?>
                    <?php if( $button ): ?>
                        <a href="<?php echo esc_url($button['url']); ?>" target="_blank" class="btn btn--primary mt-3 d-inline-block<?php if(str_ends_with(strtolower(parse_url($button['url'], PHP_URL_PATH) ?? ''), '.pdf')) { echo ' btn--download'; } ?>"><?php echo esc_html($button['title']); ?> &nbsp; <?php echo file_get_contents(get_template_directory_uri() . '/lib/images/arrow.svg'); ?></a>
                    <?php endif; ?>
                    <?php if( $button_2 ): ?>
                        <br/>
                        <a href="<?php echo esc_url($button_2['url']); ?>" target="_blank" class="btn btn--primary mt-3 d-inline-block<?php if(str_ends_with(strtolower(parse_url($button_2['url'], PHP_URL_PATH) ?? ''), '.pdf')) { echo ' btn--download'; } ?>"><?php echo esc_html($button_2['title']); ?> &nbsp; <?php echo file_get_contents(get_template_directory_uri() . '/lib/images/arrow.svg'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>