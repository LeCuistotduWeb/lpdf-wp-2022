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
  <section class="section-brands">
    <div class="container">
      <h2 class="section__title section-brands__title">Les dernières marques</h2>
    </div>
    <div class="section-brands__list container">
      <?php foreach( $brands as $brand ): ?>
        <?php $brandId = $brand->ID ?>
        <h3 class="section-brands__brand">
          <a class="section-brands__link" href="<?= get_permalink($brandId) ?>"><?= get_the_title($brandId) ?></a>
        </h3>
        <?php wp_reset_postdata(); ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif;?>