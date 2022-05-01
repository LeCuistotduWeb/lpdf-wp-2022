<?php
$category = $args['data']['category'];
$categoryName = $args['data']['categoryName'];
$categorySlug = $args['data']['categorySlug'];
$bgColor = $args['data']['bgColor'];
$type = $args['data']['type'];
?>

<section class="homepage__section-category homepage__section-category-<?= $type ?>" style="background-color: <?= $bgColor ?>">
  <div class="container">
    <h2 class="homepage__section-title">Catégorie <em><?= $categoryName ?></em></h2>
  </div>
  <div class="homepage__posts-list container">
    <?php
    $args = ['posts_per_page' => 3, 'category_name' => $categorySlug];
    $query = new WP_Query( $args );
    if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); ?>
      <article class="post-card">
        <a class="post-card__link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
          <div class="post-card__thumbnail">
            <img width="200" src="<?php the_post_thumbnail_url()?>" alt="<?php the_title(); ?>">
          </div>
          <div class="post-card__content">
            <h2 class="post-card__title"><?php the_title(); ?></h2>
          </div>
        </a>
      </article>
    <?php endwhile; endif;
    wp_reset_postdata();
    ?>
  </div>

  <div class="section-category__link container">
    <a class="link-category" href="<?= get_category_link($category) ?>">
      Voir la catégorie <span><?= $categoryName ?></span>
      <svg class="link-category__icon" xmlns="http://www.w3.org/2000/svg" width="31.5" height="7.742" viewBox="0 0 31.5 7.742">
        <path id="Icon_awesome-long-arrow-alt-right" data-name="Icon awesome-long-arrow-alt-right" d="M22.074,12.723H.844c-.466,0-.844.189-.844.422v1.969c0,.233.378.422.844.422h21.23v1.619c0,.752,1.818,1.128,2.881.6l6.051-3.026c.659-.33.659-.864,0-1.193l-6.051-3.026c-1.063-.532-2.881-.155-2.881.6Z" transform="translate(0 -10.258)"/>
      </svg>
    </a>
  </div>
</section>