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

          <header class="single-brand-header__container">
            <div class="single-brand-header__title container <?= has_post_thumbnail() ? 'has-logo' : '' ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <img class="hidden-xs single-brand__logo" width="200" width="200" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute() ? the_title_attribute() :  the_title()?>">
              <?php endif; ?>
              <h1><?php the_title() ?></h1>
            </div>

            <div class="single-brand-header__content container">
              <?= $description ?>
            </div>
          </header>

          <?php if (!empty(get_the_content())) : ?>
            <div class="container">
              <?php the_content(); ?>
            </div>
          <?php endif; ?>

          <div class="container">
            <?php
            $posts = getBrandPosts(get_the_ID());
            if( $posts ): ?>
              <section>
                <h2>J'en parle ici</h2>
                <div class="single-brand__posts-list container">
                  <?php foreach( $posts as $post ): ?>
                    <?php $postsId = $post->ID ?>
                    <article class="post-card card-border">
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

      <div class="container">
        <a href="/marques">Voir toutes les marques</a>
      </div>

    </div>
    <!-- /Content -->

  </div>
<?php get_footer(); ?>