<?php get_header() ?>

  <div class="container">
    <article>
      <h1 class="page__title"><?php the_title(); ?></h1>
      <div class="page__content"><?php the_content(); ?></div>
    </article>
  </div>

<?php get_footer() ?>