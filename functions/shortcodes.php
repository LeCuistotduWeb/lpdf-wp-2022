<?php

function shortcodeCategorySection( $atts )
{
  if(!isset($atts['category_name']) && empty($atts['category_name'])) { return null; }

  $category = get_category_by_slug($atts['category_name']);
  if ( $category instanceof WP_Term ) {
    $categoryName = $category->name;
    $categorySlug = $category->name;
  } else { return null; }

  ob_start();
  get_template_part( 'parts/category-section', '', [
    'data' => [
      'category' => $category,
      'categoryName' => $categoryName,
      'categorySlug' => $categorySlug,
      'type' => $atts['type'] ?? 'default',
      'bgColor' => $atts['bg_color'] ?? '#FFDCD9',
    ],
  ]);
  $html = ob_get_contents();
  ob_end_clean();

  return $html;
}
add_shortcode( 'category-section', 'shortcodeCategorySection' );

function shortcodeBrandsSection( $atts )
{
  ob_start();
  get_template_part( 'parts/brands-section', '', [
    'data' => [
      'limit' => $atts['limit'] ?? '4',
    ],
  ]);
  $html = ob_get_contents();
  ob_end_clean();

  return $html;
}
add_shortcode( 'brands-section', 'shortcodeBrandsSection' );