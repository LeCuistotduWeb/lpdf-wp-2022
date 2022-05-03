<?php
$category = $args['data']['category'];
$categoryName = $args['data']['categoryName'];
$categorySlug = $args['data']['categorySlug'];
$bgColor = $args['data']['bgColor'];
$type = $args['data']['type'];
?>

<section class="section-category section-category__<?= $type ?>" style="background-color: <?= $bgColor ?>">
  <div class="container">
    <h2 class="section__title section-category__title">Catégorie <em><?= $categoryName ?></em></h2>
  </div>
  <div class="section-category__posts-list container">
    <?php
    $args = ['posts_per_page' => 3, 'category_name' => $categorySlug];
    $query = new WP_Query( $args );
    if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); ?>
      <article class="post-card">
        <a class="post-card__link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
          <div class="post-card__thumbnail">
            <img width="200" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
            <div class="post-card__info">
              <div class="post-card__info-likes">
                <?= getPostLikes(get_the_ID()) ?>
              </div>
              <div class="post-card__info-comments">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15.732 13.765">
                  <path id="Icon_awesome-comment" data-name="Icon awesome-comment" d="M7.866,2.25C3.521,2.25,0,5.111,0,8.641a5.672,5.672,0,0,0,1.751,4.016A7.817,7.817,0,0,1,.068,15.6a.244.244,0,0,0-.046.267.241.241,0,0,0,.224.147,7.027,7.027,0,0,0,4.32-1.579,9.371,9.371,0,0,0,3.3.6c4.345,0,7.866-2.861,7.866-6.391S12.21,2.25,7.866,2.25Z" transform="translate(0 -2.25)" fill="#232323"/>
                </svg>
                <span><?= get_comments_number() ?></span>
              </div>
            </div>
          </div>
          <div class="post-card__content">
            <h3 class="post-card__title"><?php the_title(); ?></h3>
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