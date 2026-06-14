<?php
get_header(); 
?>
    <main id="main" class="site-main">
       <?php if ( have_posts() ) : ?>
      <div class="container padding-top padding-bottom">
        
        <div class="row pt-5">
          <div class="col-12 col-lg-9">
              <header class="page-header pb-5">
                  <h1><?php single_post_title(); ?></h1>
              </header>
            </div>
        </div>
        <div class="row pt-5">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-12 col-md-6 col-lg-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail pb-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="entry-meta">
                            <span class="posted-on"><?php echo get_the_date(); ?></span>
                        </div>
                    </header>

                    <div class="entry-content pt-4">
                        <?php the_excerpt();  ?>
                    </div>

                    <footer class="entry-footer">
                        <span class="cat-links">Categories: <?php the_category( ', ' ); ?></span>
                    </footer>

                </div>

       <?php endwhile;  ?>
         </div>
            <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Previous', 'textdomain' ),
                'next_text' => __( 'Next', 'textdomain' ),
            ) );

        else :
            // Fallback if no posts are found
            ?>
            <p><?php _e( 'No posts found.', 'textdomain' ); ?></p>
            <?php
        endif; ?>
        </div>

  </main>     



  <?php
  get_footer();
  ?>
