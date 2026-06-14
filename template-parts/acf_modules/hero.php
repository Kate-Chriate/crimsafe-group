<?php 
    $hero_type = get_field('hero_type');
    $title = get_field('subtitle'); 
    $headline = get_field('heading'); 
    $background = get_field('background');
    $background_mobile = get_field('background_mobile');
    $grid = get_field('grid_images', 'option');
?>

<section id="top" class="hero <?php echo $hero_type; ?>">
    <div class="container-fluid px-0 h-100">
        <?php if ($hero_type == 'simple') { ?>
            <div class="simple-back h-100">
                <img src="<?php echo $background['url']; ?>" alt="<?php echo $background['alt']; ?>" class="d-none d-lg-block hero-back" />
                <img src="<?php echo $background_mobile['url']; ?>" alt="<?php echo $background_mobile['alt']; ?>" class="d-lg-none hero-back" />
            </div>
        <?php } else { ?>
        <?php 
            if( $grid ): ?>
                <div class="hero-grid">
                    <?php foreach( $grid as $image ): ?>
                        <div class="tile"><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <img class="down" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/down.svg" alt="" class="down">
        <?php } ?>  
        <div class="row g-0 hero-content justify-content-center align-items-end">
            <div class="col-12 text-center">
                <?php if($headline) { ?><h1><?php echo $headline; ?></h1><?php }?>
                <?php if($title) { ?><p class="h4 orange"><?php echo $title; ?></p><?php }?>
            </div>
       </div>
    </div>
</section>
