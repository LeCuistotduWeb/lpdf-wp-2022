<?php
function montheme_register_assets()
{
  wp_enqueue_style( 'lpdf-styles', get_template_directory_uri() . '/assets/css/app.css', [], 1);
  wp_enqueue_script('lpdf-scripts', get_template_directory_uri(). '/assets/js/app.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'montheme_register_assets');

function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    add_image_size('post-thumbnail', 350, 215, true);
}
add_action('after_setup_theme', 'montheme_supports');

function remove_default_jquery( &$scripts){
  if(!is_admin()){
    $scripts->remove( 'jquery');
  }
}
add_filter( 'wp_default_scripts', 'remove_default_jquery' );

/**
 * Unload WooCommerce assets on non WooCommerce pages.
 */
function remove_wc_assets()
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
add_action( 'get_header', 'remove_wc_assets' );

require_once('classes/custom-post-likes.class.php');

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