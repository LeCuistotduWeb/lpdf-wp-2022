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
  <section class="homepage__section-brands">
    <div class="container">
      <h2 class="homepage__section-title">Les dernières marques</h2>
    </div>
    <div class="homepage__brands-list container">
      <?php foreach( $brands as $brand ): ?>
        <?php $brandId = $brand->ID ?>
        <h3>
          <a class="brand-link" href="<?= get_permalink($brandId) ?>"><?= get_the_title($brandId) ?></a>
        </h3>
        <?php wp_reset_postdata(); ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif;?>