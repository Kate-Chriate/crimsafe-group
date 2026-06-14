<?php
$module_id = get_sub_field('module_id');
$map = get_sub_field('base_map');
$main_marker = get_sub_field('main_marker');
$module_id = get_sub_field('module_id');
 $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>


<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
  <div class="map_with_hovers__block">
    <img src="<?php echo $map['sizes']['2048x2048'];?>" alt="<?php echo $map['alt'];?>" class="map_with_hovers__map">
    <div class="map_with_hovers__markers">
      <?php if ( have_rows('hovers') ) : ?>

        <?php while( have_rows('hovers') ) : the_row();
        $position = get_sub_field('position');
        $position = explode(',', $position);
        $content = get_sub_field('content');
        $label_position = get_sub_field('hover_position');
        ?>

        <div class="map_with_hovers__marker" style="top:<?php echo $position[1];?>; left:<?php echo $position[0];?>;">
          <div class="map_with_hovers__marker-dot"></div>

          <div class="map_with_hovers__marker-inner position-<?php echo $label_position;?>">
          
            <div class="map_with_hovers__marker-label">
              <?php echo $content;?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>

      <?php endif; ?>

    </div>
  </div>
</section>