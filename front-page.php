<?php get_header() ?>

  <section class="homepage__hero">
    <div class="hero__thumbnail flex-center">
      <img src="<?php the_post_thumbnail_url()?>" alt="<?php the_title(); ?>">
    </div>
    <div class="container">
      <div class="hero__content">
        <h1><?php the_title()?></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi esse, molestiae nostrum praesentium reiciendis repellendus sequi sunt? Ab accusantium consequuntur distinctio doloremque eligendi exercitationem, modi porro quaerat quibusdam soluta. Cupiditate dolore id quidem sed.</p>
      </div>
    </div>
  </section>

  <section class="homepage__section-category" style="background-color: #FFDCD9">
    <div class="container">
      <h2 class="homepage__section-title">Catégorie <em>Sois coquette</em></h2>
    </div>
    <div class="homepage__posts-list container">
      <?php
      $args = ['posts_per_page' => 3, 'category_name' => 'sois-coquette'];
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
  </section>

  <section class="homepage__section-category" style="background-color: #efffd9">
    <div class="container">
      <h2 class="homepage__section-title">Catégorie <em>Sois gourmande</em></h2>
    </div>
    <div class="homepage__posts-list container">
      <?php
      $args = ['posts_per_page' => 3, 'category_name' => 'sois-gourmande'];
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
  </section>

  <section class="homepage__section-category" style="background-color: #d9fffe">
    <div class="container">
      <h2 class="homepage__section-title">Catégorie <em>Sois à la mode</em></h2>
    </div>
    <div class="homepage__posts-list container">
      <?php
      $args = ['posts_per_page' => 3, 'category_name' => 'sois-a-la-mode'];
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
  </section>

  <section class="container">
    <?php the_content()?>
  </section>

<?php get_footer() ?>