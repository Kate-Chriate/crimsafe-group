<?php

/**
 * Template name: Modules Page
 */

get_header();
?>

<?php get_template_part('template-parts/acf_modules/hero'); ?>
<main class="modules">
  <?php if (have_rows('page_modules')) : ?>
    <?php while (have_rows('page_modules')) : the_row();
      get_template_part('template-parts/acf_modules/' . get_row_layout());
    endwhile; ?>
  <?php endif; ?>
</main>
<?php
get_footer(); ?>
