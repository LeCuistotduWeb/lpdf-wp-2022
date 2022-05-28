<?php get_header() ?>

  <main class="container">
    <article>
      <h1 class="page__title"><?php the_title(); ?></h1>
      <div class="page__content"><?php the_content(); ?></div>
    </article>
  </main>

<?php get_footer() ?>