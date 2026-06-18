<?php 
    $hero_type = get_field('hero_type');
    $title = get_field('subtitle'); 
    $headline = get_field('heading'); 
    $background = get_field('background');
    $background_mobile = get_field('background_mobile');
    $grid = get_field('grid_images');
    $gallery = get_field('gallery_images');
?>

<section id="top" class="hero <?php echo $hero_type; ?>">
    <div class="container-fluid px-0 h-100">
        <?php if ($hero_type == 'simple') { ?>
            <div class="simple-back h-100">
                <img src="<?php echo $background['url']; ?>" alt="<?php echo $background['alt']; ?>" class="d-none d-lg-block hero-back" />
                <img src="<?php echo $background_mobile['url']; ?>" alt="<?php echo $background_mobile['alt']; ?>" class="d-lg-none hero-back" />
            </div>
        <?php } elseif ($hero_type == 'grid') { ?>
        <?php if( $grid ): ?>
                <div class="hero-grid">
                    <?php
                    $hero_grid_rows = 3;
                    $hero_grid_rows_arr = array_fill(0, $hero_grid_rows, []);
                    foreach( $grid as $i => $image ) {
                        $hero_grid_rows_arr[ $i % $hero_grid_rows ][] = $image;
                    }
                    foreach( $hero_grid_rows_arr as $i => $row_images ):
                        $row_class = 'hero-grid__row' . ( $i % 2 === 1 ? ' hero-grid__row--reverse' : '' );
                        $duration = 45 + ( $i * 8 );
                        ?>
                        <div class="<?php echo $row_class; ?>" style="--duration: <?php echo $duration; ?>s">
                            <div class="hero-grid__track">
                                <?php for( $rep = 0; $rep < 2; $rep++ ): ?>
                                    <?php foreach( $row_images as $image ): ?>
                                        <div class="tile"><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                                    <?php endforeach; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <img class="down" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/down.svg" alt="" class="down">
        <?php } elseif ($hero_type == 'gallery') { ?>
        
            <div class="hero-gallery">
                 <?php if( $gallery ): ?>
                    <div class="splide hero-gallery-splide">
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
                <img class="down" src="<?php echo get_stylesheet_directory_uri(); ?>/lib/images/down.svg" alt="" class="down">
            </div>
        <?php } ?>  
        <div class="row g-0 hero-content justify-content-center align-items-end">
            <div class="col-12 text-center">
                <?php if($headline) { ?><h1><?php echo $headline; ?></h1><?php }?>
                <?php if($title) { ?><p class="h4 orange"><?php echo $title; ?></p><?php }?>
            </div>
       </div>
    </div>
</section>
