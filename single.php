<?php get_header() ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <article>
    <div class="single__hero">
      <div class="post__thumbnail flex-center">
        <img src="<?php the_post_thumbnail_url()?>" alt="<?php the_title(); ?>">
      </div>
      <div class="container">
      <div class="single__hero-like-btn">
        <?= get_simple_likes_button(get_the_ID(), NULL, true, true, true,"btn btn-rounded") ?>
      </div>
      </div>
    </div>
    <div class="post__content container">
      <h1 class="post__title"><?php the_title(); ?></h1>

      <div class="post__info">
        <div class="post__info-categories">
          <!-- Category -->
          <?php if(true == get_theme_mod('post_meta_category', true)) : ?>
            <div class="post__categories">
              <?php the_category(', ') ?>
            </div>
          <?php endif; ?>
          <!-- /Category -->
        </div>
        <div class="post__info-comments">
          <div>
            <?= get_simple_likes_button(get_the_ID(), null, false, false, true) ?>
          </div>
          <div>
            <a href="#comments">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15.732 13.765">
                <path id="Icon_awesome-comment" data-name="Icon awesome-comment" d="M7.866,2.25C3.521,2.25,0,5.111,0,8.641a5.672,5.672,0,0,0,1.751,4.016A7.817,7.817,0,0,1,.068,15.6a.244.244,0,0,0-.046.267.241.241,0,0,0,.224.147,7.027,7.027,0,0,0,4.32-1.579,9.371,9.371,0,0,0,3.3.6c4.345,0,7.866-2.861,7.866-6.391S12.21,2.25,7.866,2.25Z" transform="translate(0 -2.25)" fill="#232323"/>
              </svg>
              <span><?= get_comments_number() ?></span>
            </a>
          </div>
        </div>
      </div>

      <!-- Content -->
      <?php the_content()?>
      <!-- /Content -->
      <div class="post__content-footer">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="125" height="70" viewBox="0 0 125 70">
          <image id="signature-fleur70px" width="125" height="70" xlink:href="data:image/png;base64,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"/>
        </svg>
        <div>
          <div class="post-like__button">
            <?= get_simple_likes_button(get_the_ID(), NULL, false, false, false, 'btn btn-rounded-corners btn-large') ?>
          </div>
        </div>
      </div>

    </div>

    <div class="post__navigation container">
      <!-- Posts Navigation -->
      <?php $prevPost = get_previous_post(true);?>
      <?php $nextPost = get_next_post(true);?>
      <?php if(true == get_theme_mod('post_nav', true)) : ?>
        <div id="post-nav" class="row">
          <?php if (get_previous_post_link()) : ?>
            <div class="post-previous col-md-6 no-padding">
              <h4><?php previous_post_link(); ?></h4>
            </div>
          <?php endif; ?>
          <?php if (get_next_post_link()) : ?>
            <div class="post-next col-md-6 no-padding">
              <h4><?php next_post_link(); ?></h4>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <!-- /Posts Navigation -->
    </div>

    <?php if (comments_open() || get_comments_number()){
      comments_template();
    } ?>
  </article>
<?php endwhile; else: ?>
  <p>Aucun article :(</p>
<?php endif; ?>


<?php get_footer() ?>