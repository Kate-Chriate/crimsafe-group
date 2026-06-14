<footer>
    <?php 
       $footer_title = get_field('title', 'option');
       $footer_subtitle = get_field('subtitle', 'option');
       $footer_link = get_field('link', 'option');
       $footer_logos = get_field('footer_logos', 'option');
       $social = get_field('social_links', 'option');
        $youtube = $social['youtube'];
        $linkedin = $social['linkedin'];
        $instagram = $social['instagram'];
        $facebook = $social['facebook'];
    ?>
    <section id="register" class="padding-top">
        <div class="container">
            <div class="row g-0 align-items-start padding-bottom">
                <div class="col-12 col-lg-6 col-xxl-5 ">
                    <h2><?php echo $footer_title; ?></h2>
                    <h4 class="orange mt-3"><?php echo $footer_subtitle; ?></h4>
                    <?php if(!is_page('contact-us')) { ?><a href="<?php echo $footer_link['url']; ?>" class="btn btn--primary d-inline-block mt-4 mt-lg-5 mb-5 mb-lg-0"><?php echo $footer_link['title']; ?> &nbsp; <?php echo file_get_contents(get_template_directory_uri() . '/lib/images/arrow.svg'); ?></a> <?php } ?>
                </div>
                <div class="<?php if(is_page('contact-us')) { echo 'col-12';} else { echo 'd-none d-lg-block';} ?> col-lg-12 col-xxl-6 offset-xxl-1 mt-5 mt-xxl-0">
                        <?php if( have_rows('contact_details', 'option') ): ?>
                        <div class="footer-contacts d-flex flex-wrap">
                            <?php while( have_rows('contact_details', 'option') ): the_row(); ?>
                            <?php
                                $title = get_sub_field('title'); 
                               $contacts = get_sub_field('contacts'); ?>
                            <?php if( $contacts ): ?>
                                <div class="contact-detail col-12 col-lg-4">
                                    <p class="contact-title large bold mb-3"><?php echo $title; ?></p>
                                    <?php echo $contacts; ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </div>
                    
                    <?php endif; ?>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12 col-lg-6">
                    <div class="social-links d-flex flex-wrap gap-3">
                        <?php if( $facebook ): ?>
                            <a href="<?php echo $facebook; ?>" class="social-link" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/lib/images/social-fb.svg" alt="facebook" />
                            </a>
                        <?php endif; ?>
                        <?php if( $instagram ): ?>
                            <a href="<?php echo $instagram; ?>" class="social-link" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/lib/images/social-insta.svg" alt="instagram" />
                            </a>
                        <?php endif; ?>
                         <?php if( $linkedin ): ?>
                            <a href="<?php echo $linkedin; ?>" class="social-link" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/lib/images/social-li.svg" alt="linkedin" />
                            </a>
                        <?php endif; ?>
                        <?php if( $youtube ): ?>
                            <a href="<?php echo $youtube; ?>" class="social-link" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/lib/images/social-yt.svg" alt="youtube" />
                            </a>
                        <?php endif; ?>
                    </div>   
                </div>
                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <?php if( have_rows('footer_logos', 'option') ): ?>
                        <div class="footer-logos d-flex flex-wrap justify-content-lg-end gap-4">
                            <?php while( have_rows('footer_logos', 'option') ): the_row(); ?>
                            <?php
                                $logo = get_sub_field('logo'); ?>
                            <?php if( $logo ): ?>
                                <div class="logo-item">
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom-footer">
        <div class="container">
              <div class="row g-3 pb-3 justify-content-center align-items-end">
                <div class="col-12 col-lg-6 m-0">
                   <?php wp_nav_menu(array(
                        'theme_location'  => 'footer',
                        'container'       => 'footer-nav'
                    )); ?>

                </div>
                <div class="col-12 col-lg-6 text-lg-end  m-0">
                    <p class="mb-0">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
                </div>
            </div>
        </div>
    </section>
   
   
</footer>

<?php wp_footer(); ?>
</body>

</html>
