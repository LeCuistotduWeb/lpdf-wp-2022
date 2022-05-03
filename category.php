<?php get_header(); ?>

<main role="main">
  <header class="category-page__header">
    <div class="container">
      <h1 class="category-page__header-title">
        <span>catégories</span>
        <span><?= bloginfo('title'); ?></span>
      </h1>
    </div>
  </header>

  <div class="category-page__container">
    <div class="container">

      <?php if(have_posts()):
        while (have_posts()): the_post(); ?>

          <div class="col-md-4">
            <article class="card mb-4 shadow-sm">
              <a href="<?= the_permalink() ?>">
                <?php if($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large')):
                  $thumbnail_src = $thumbnail_html['0']; ?>
                  <picture>
                    <img src="<?= $thumbnail_src ?>" alt="<?= get_the_title() ?>" class="img-fluid">
                  </picture>
                <?php endif;?>
              </a>
              <div class="card-body">
                <h3><a href="<?= the_permalink() ?>"><?= get_the_title() ?></a></h3>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?= the_permalink() ?>">Lire l'article</a>
                  </div>
                  <small class="text-muted">231 ❤</small>
                </div>
              </div>
            </article>
          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <div class="row">
          <div class="col">
            <p>Il n'y a aucun resultat</p>
          </div>
        </div>

      <?php endif; ?>

    </div>
  </div>

</main>

<?php get_footer(); ?>


