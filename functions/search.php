<?php
/**
 * Actions
 */

/**
 * Search
 */
if (isset($_REQUEST['action']) && ($_REQUEST['action'] === 'search')) {
  add_action('init', static function () {
    $value = $_POST['body']['data'] ?? '';
    wp_send_json($value, 200);
    if($value){
      $data = null;
      $html = null;
      $the_query = new WP_Query(
        array(
//          'posts_per_page' => 6,
          's' => esc_attr($value),
          'post_type' => ['post', 'product', 'marque'],
          'status' => 'publish',
        )
      );

      if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post();
          $data[get_post_type()][] = [
            "title"=> get_the_title(),
            "permalink" => get_the_permalink(),
            "thumbnail" => get_the_post_thumbnail(null, 'thumbnail'),
            "type"          => get_post_type(),
          ];
          $html = get_template_part( 'parts/search-result', '', ['data' => $data,]);
        endwhile;
        wp_reset_postdata();
      endif;
      wp_send_json($html, 200);
    }
    wp_send_json("search is empty", 404);
  });
}