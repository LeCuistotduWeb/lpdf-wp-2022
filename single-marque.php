<?php
/*
The single post file
*/
get_header();

$description = get_field('brand_description');
?>

  <div id="singleBrand" class="col-md-12 wrapper-content no-padding single-brand single-brand__<?= the_ID() ?>">

    <!-- Content -->
    <div class="row">
      <?php if ( have_posts() ):  ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <header class="header__bloc">
            <div class="header__title">
              <h1><?php the_title() ?></h1>
              <?php if ( has_post_thumbnail() ) : ?>
                <img class="hidden-xs brand-logo" width="200" width="200" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute() ? the_title_attribute() :  the_title()?>">
              <?php endif; ?>
            </div>

            <div class="header__content">
              <?= $description ?>
            </div>
          </header>

          <div class="container">

            <?php
            $products = getBrandProducts(get_the_ID());
            if( $products ): ?>
              <section>
                <h2>Produits de la marque</h2>
                <div class="grid-md-3 grid-xs-2">
                  <?php foreach( $products as $product ): ?>
                    <?php $productId = $product->ID ?>
                    <div class="">
                      getProductSummaryTemplate
<!--                      --><?//= getProductSummaryTemplate($product) ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                  <?php endforeach; ?>
                </div>
              </section>
            <?php endif; ?>

            <?php
            $posts = getBrandPosts(get_the_ID());
            if( $posts ): ?>
              <section>
                <h2>J'en parle ici</h2>
                <div class="grid-md-4 grid-xs-2 related-posts">
                  <?php foreach( $posts as $post ): ?>
                    <?php $postsId = $post->ID ?>
                    <div class="post-summary__col">
                      <div class="post-summary">
                        <a href="<?php the_permalink( $postsId ); ?>">
                          <?php if ( has_post_thumbnail($postsId) ) : ?>
                            <img width="210" src="<?= get_the_post_thumbnail_url($postsId, 'large'); ?>" alt="<?php the_title_attribute($postsId) ? get_the_title_attribute($productId) : get_the_title($postsId)?>">
                          <?php endif; ?>
                          <div class="post-summary__content">
                            <div><?= get_the_title( $postsId ); ?></div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                  <?php endforeach; ?>
                </div>
              </section>
            <?php endif; ?>

          </div>

        <?php endwhile; ?>

        <!-- No Results -->
      <?php else: ?>
        <p>Aucune marque :(</p>
      <?php endif; ?>
    </div>
    <!-- /Content -->

  </div>
<?php get_footer(); ?>