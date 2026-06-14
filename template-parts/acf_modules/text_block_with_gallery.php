<?php 
    $text_content = get_sub_field('text_content');
        $copy = $text_content['copy'];
        $title = $text_content['title'];
        $subtitle = $text_content['subtitle'];

    $gallery = get_sub_field('gallery');

    $block_order = get_sub_field('block_order');
    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 flex-grow mb-3 mb-lg-0 <?php if($block_order == 'image-right') { echo 'order-1 order-lg-2 mb-3 mb-lg-0';}  ?>">
                <?php if ($gallery): ?>
                    <div class="splide gallery-splide-block h-100">
                         <div class="splide__track h-100">
                            <div class="splide__list h-100">
                                <?php foreach($gallery as $image): ?>
                                    <div class="splide__slide">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="cta-img h-100" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6 <?php if($block_order == 'image-right') { echo 'order-2 order-lg-1 ';} ?>">
                <div class="gallery-text-block p-70">
                   <?php if($title) {?> <h2 class="mb-3"><?php echo $title; ?></h2> <?php } ?>
                   <h4 class="mb-5 orange"><?php echo $subtitle; ?></h4>
                    <?php if($copy) { echo $copy; } ?>
                </div>
            </div>
        </div>
    </div>
</section>