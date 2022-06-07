<?php get_header();
$term = get_queried_object();
$headerBackgroundColor = get_field('category_background_color',$term);
$headerTextColor = get_field('category_text_color',$term);
?>
<main role="main">
    <header class="category-header" style="background-color: <?= $headerBackgroundColor ?? '#FFDCD9' ?>">
        <div class="container">
            <h1 class="category-header__title">
                <div class="category-header__overline" style="color: <?= $headerTextColor ?? '#C47F79' ?>">Catégories</div>
                <div class="category-header__name"><?php single_cat_title() ?></div>
            </h1>
        </div>
      <?php the_archive_description('<div class="category__description container">','</div>'); ?>
    </header>

    <div class="category-page__container">
        <div class="container">
          <div class="category-page__post-list">
            <?php if(have_posts()):
            while (have_posts()): the_post(); ?>

                <article class="post-card post-card-large">
                    <a class="post-card__link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                        <div class="post-card__container">
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
                                <p class="post-card__excerpt"><?php the_excerpt(); ?></p>
                                <div class="post-card__link text-link">Lire l'article</div>
                            </div>
                        </div>
                    </a>
                </article>

            <?php endwhile; ?>

              <?php customPagination(); ?>

          <?php else: ?>
              <div>
                  <p>Il n'y a aucun resultat</p>
              </div>
          <?php endif; ?>
          </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>


