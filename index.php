<?php get_header() ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article>
        <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </article>
<?php endwhile; else: ?>
    <p>Aucun article :(</p>
<?php endif; ?>

<?php get_footer() ?>