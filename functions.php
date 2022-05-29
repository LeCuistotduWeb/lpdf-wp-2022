<?php
function monthemeRegisterAssets()
{
  wp_enqueue_style( 'lpdf-styles', get_template_directory_uri() . '/assets/css/app.css', [], 1);
  wp_enqueue_script('lpdf-scripts', get_template_directory_uri(). '/assets/js/app.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'monthemeRegisterAssets');

function monthemeSupports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('mobile', 'menu mobile');
    register_nav_menu('footer', 'Pied de page');
    add_image_size('post-thumbnail', 350, 215, true);
}
add_action('after_setup_theme', 'monthemeSupports');

function removeDefaultJquery( &$scripts){
  if(!is_admin()){
    $scripts->remove( 'jquery');
  }
}
add_filter( 'wp_default_scripts', 'removeDefaultJquery' );

/**
 * Unload WooCommerce assets on non WooCommerce pages.
 */
function removeWcAssets()
{

  // if WooCommerce is not active, abort.
  if (!class_exists('WooCommerce')) {
    return;
  }

  // if this is a WooCommerce related page, abort.
  if (is_woocommerce() || is_cart() || is_checkout() || is_page(array('my-account'))) {
    return;
  }

  remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
  remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
  remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
}
add_action( 'get_header', 'removeWcAssets' );

/**
 * Register widget areas
 */
function widgetsInit()
{
//  register_sidebar(array(
//    'name'          => esc_html__('Blog Sidebar', 'sharlene'),
//    'id'            => 'blog-sidebar',
//    'description' => esc_html__( 'Blog/Posts sidebar widget area', 'sharlene' ),
//    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//    'after_widget'  => '</aside>',
//    'before_title'  => '<div class="widget-title"><h3>',
//    'after_title'   => '</h3></div>',
//  ));

  register_sidebar(array(
    'name'          => esc_html__('Footer Widget 1', 'sharlene'),
    'id'            => 'footer-widget-1',
    'description' => esc_html__( 'The first footer widget area', 'sharlene' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget__title"><h3>',
    'after_title'   => '</h3></div>',
  ));

  register_sidebar(array(
    'name'          => esc_html__('Footer Widget 2', 'sharlene'),
    'id'            => 'footer-widget-2',
    'description' => esc_html__( 'The second footer widget area', 'sharlene' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget__title"><h3>',
    'after_title'   => '</h3></div>',
  ));

  register_sidebar(array(
    'name'          => esc_html__('Footer Widget 3', 'sharlene'),
    'id'            => 'footer-widget-3',
    'description' => esc_html__( 'The second footer widget area', 'sharlene' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget__title"><h3>',
    'after_title'   => '</h3></div>',
  ));
}
add_action('widgets_init', 'widgetsInit');

/**
 * Excerpt length limit
 * @param $length
 * @return int
 */
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 10);

/**
 * Custom pagination
 * @return void
 */
function customPagination()
{
  global $wp_query;
  $big = 999999999;
  echo '<div class="pagination">' . paginate_links([
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'mid_size' => 1,
    'prev_next' => true,
    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16.216" height="26.26" viewBox="0 0 16.216 26.26">
  <path id="Icon_material-keyboard-arrow-left" data-name="Icon material-keyboard-arrow-left" d="M28.216,31.425,18.193,21.38,28.216,11.336,25.13,8.25,12,21.38,25.13,34.51Z" transform="translate(-12 -8.25)" fill="#e0cec7"/>
</svg>',
    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16.216" height="26.26" viewBox="0 0 16.216 26.26">
  <path id="Icon_material-keyboard-arrow-left" data-name="Icon material-keyboard-arrow-left" d="M16.216,23.175,6.193,13.13,16.216,3.086,13.13,0,0,13.13,13.13,26.26Z" transform="translate(16.216 26.26) rotate(180)" fill="#e0cec7"/>
</svg>'
  ]) . '</div>';
}

/**
 * Transient functions
 */
require_once('classes/transient.class.php');

/**
 * Post-like Classe
 */
require_once('classes/custom-post-likes.class.php');

/**
 * Shortcodes functions
 */
require_once('functions/shortcodes.php');

/**
 * Brand functions
 */
require_once('functions/brand.php');

/**
 * Search functions
 */
require_once('functions/search.php');