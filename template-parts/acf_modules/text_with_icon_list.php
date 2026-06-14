<?php 
    $text_content = get_sub_field('text_content');
        $copy = $text_content['copy'];
        $title = $text_content['title'];


    $image = get_sub_field('image');
    $block_order = get_sub_field('block_order');
    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xxl-4 large orange bold mb-5 mb-lg-0">
                <?php if($title) {?> <h2 class="mb-70"><?php echo $title; ?></h2> <?php } ?>
                <?php if($copy) { echo $copy; } ?>
            </div>
            <div class="col-12 col-lg-6 offset-lg-1 offset-xxl-2">
                <div class="icon__rows">
                   
                    <div class="text-icon-list">
                        <?php if (have_rows('icons')) :  ?>
     
                            <?php while (have_rows('icons')) : the_row(); 
                                $count = count(get_sub_field('icon_group'));?> 
                              <div class="text-icon-list__item row d-flex align-items-center">  
                                 <?php if (have_rows('icon_group')) : 
                                    while (have_rows('icon_group')) : the_row(); 
                                        $icon = get_sub_field('icon');
                                        $label = get_sub_field('label');
                                        $text = get_sub_field('text');
                                    ?>
                                        <div class="col-2 ">
                                            <?php if($icon) { ?><img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="text-icon-list__icon" /> <?php } ?>
                                        </div>
        
                                        <div class="<?php if ($count == 1) { echo 'col-10'; } else { echo 'col-10 col-lg-4'; } ?>">
                                            <h4 class="orange mb-0"><?php echo $label; ?></h4>

                                            <?php if($text) { ?><p class="text-icon-list__text mb-0 mt-3"><?php echo $text; ?></p> <?php } ?>
                                        </div>
                                    
                                    <?php endwhile; ?>
                                <?php endif; ?>
                               </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
