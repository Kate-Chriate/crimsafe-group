<?php

class Crimsafe_Nav_Walker extends Walker_Nav_Menu {

    private $toplevel_image = '';

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $nav_image_url = '';
        if ( function_exists( 'get_field' ) ) {
            $nav_image = get_field( 'nav_image', $data_object );
            if ( $nav_image ) {
                $nav_image_url = esc_url( is_array( $nav_image ) ? $nav_image['url'] : $nav_image );
            }
        }

        if ( $depth === 0 ) {
            $this->toplevel_image = $nav_image_url;
        }

        $item_output = '';
        parent::start_el( $item_output, $data_object, $depth, $args, $current_object_id );

        if ( $nav_image_url ) {
            $item_output = preg_replace( '/^(\s*<li)/', '$1 data-nav-image="' . $nav_image_url . '"', $item_output, 1 );
        }

        $output .= $item_output;
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        parent::start_lvl( $output, $depth, $args );

        if ( $depth === 0 && $this->toplevel_image ) {
            $output .= '<li class="mega-menu__image-col" aria-hidden="true">';
            $output .= '<div class="mega-menu__image-wrap">';
            $output .= '<img class="mega-menu__image" src="' . $this->toplevel_image . '" alt="" loading="eager">';
            $output .= '</div>';
            $output .= '</li>';
        }
    }
}

/**
 * Proper way to enqueue scripts and styles
 */
function theme_styles()
{
    $stylesheet_cache = get_stylesheet_directory() . '/lib/styles/css/main.min.css';
    $scripts_cache = get_stylesheet_directory() . '/lib/scripts/scripts.min.js';
    wp_enqueue_style('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), null);
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/lib/styles/css/main.min.css', array('splide'), filemtime($stylesheet_cache));
    wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true);
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/lib/scripts/scripts.min.js', array('jquery', 'splide'), filemtime($scripts_cache), true);

    /**
     * Use if making custom ajax request from client
     */
    wp_localize_script('scripts', 'AJAX_REQUEST_URL', array(
        "url" => admin_url("admin-ajax.php"),
    ));
}

add_action('wp_enqueue_scripts', 'theme_styles');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

register_nav_menus(array(
    'header' => esc_html__('Header'),
    'footer' => esc_html__('Footer')
));

/**
 * Enable SVG Uploads
 **/
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

// Restrict ACF admin settings and comments
function wpdocs_remove_menus()
{
    $current_user = get_current_user_id();
    if ($current_user != 1) {
        remove_menu_page('edit.php?post_type=acf-field-group');    //ACF
        remove_menu_page('edit-comments.php');          //Comments
    }
}

add_action('admin_menu', 'wpdocs_remove_menus');

show_admin_bar(false);

function disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}

add_action('admin_init', 'disable_comments_post_types_support');

function disable_comments_status()
{
    return false;
}

add_filter('comments_open', 'disable_comments_status', 20, 2);

function disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'disable_comments_admin_menu');
add_filter('pings_open', 'disable_comments_status', 20, 2);

/* ACF Hover Module Effect */
function my_acf_admin_head() {
    $siteURL = get_site_url();
    ?>
    <style type="text/css">
    .imagePreview { position:absolute; right:100%; top:0px; z-index:999999; border:1px solid #f2f2f2; box-shadow:0px 0px 3px #b6b6b6; background-color:#fff; padding:0px;}
    .imagePreview img { width:450px; height:auto; display:block; }
    
    </style>
    <script>
    jQuery(document).ready(function($) {
        $('a[data-name=add-layout]').click(function(){
            waitForEl('.acf-tooltip li', function() {
                $('.acf-tooltip li a').hover(function(){
                    imageTP = $(this).attr('data-layout');
                    $('.acf-tooltip').append('<div class="imagePreview"><img src="<?php echo $siteURL; ?>/wp-content/themes/crimsafegroup/template-parts/acf_images/' + imageTP + '.jpg?v=3"></div>');
                }, function(){
                    $('.imagePreview').remove();
                });
                });
            })
            var waitForEl = function(selector, callback) {
                if (jQuery(selector).length) {
                    callback();
                } else {
                    setTimeout(function() {
                    waitForEl(selector, callback);
                }, 100);
            }
        };
    })
    </script>
    <?php
    }
    add_action('acf/input/admin_head', 'my_acf_admin_head');
