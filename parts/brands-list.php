<?php
$limit = $args['data']['limit'];
?>
<?php
$brands = get_posts([
  'post_type' => 'marque',
  'meta_query' => [],
  'post_status' => 'publish',
  'limit' => $limit,
  'orderby'           => 'date',
  'order'             => 'DESC',
]);
if( $brands ): ?>
  <ul class="brands-list container">
    <?php foreach( $brands as $brand ): ?>
      <?php $brandId = $brand->ID ?>
      <li>
        <h3>
          <a class="section-brands__link" href="<?= get_permalink($brandId) ?>"><?= get_the_title($brandId) ?></a>
        </h3>
      </li>
      <?php wp_reset_postdata(); ?>
    <?php endforeach; ?>
  </ul>
<?php endif;?>