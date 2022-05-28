<?php

/**
 * Get the brand related products
 * @param $brandId
 * @return int[]|WP_Post[]|null
 */
function getBrandProducts($brandId){
  if(!empty((int)$brandId)){
    $products = get_posts(array(
      'post_type' => 'product',
      'numberposts' => '4',
      'meta_query' => array(
        array(
          'key' => 'product_brand',
          'value' => '"' . $brandId . '"',
          'compare' => 'LIKE'
        )
      )
    ));
    return $products;
  } else {
    return null;
  }
}


/**
 * Get the brands related posts
 * @param $brandId
 * @return int[]|WP_Post[]|null
 */
function getBrandPosts($brandId){
  if(!empty((int)$brandId)){
    $posts = get_posts(array(
      'post_type' => 'post',
      'post_status' => 'publish',
//      'numberposts' => '4',
      'meta_query' => array(
        array(
          'key' => 'post_brands',
          'value' => '"' . $brandId . '"',
          'compare' => 'LIKE'
        )
      )
    ));
    return $posts;
  } else {
    return null;
  }
}