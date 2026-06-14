<?php
get_header();
?>

<main>

  
  <div class="container padding-top">

    <div class="row py-5">
      <div class="col-12">
        <h1 class=""><?php the_title(); ?></h1>
      </div>
    </div>
  </div>

  <div class="container padding-bottom">
    <div class="row pb-5">
      <div class="col-12">
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
  </section>

  <?php
  get_footer();
  ?>
