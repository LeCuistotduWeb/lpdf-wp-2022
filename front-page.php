<?php get_header() ?>

  <header class="homepage__hero">
    <div class="hero__thumbnail flex-center">
      <img src="<?php the_post_thumbnail_url()?>" alt="<?php the_title(); ?>">
    </div>
    <div class="container">
      <div class="hero__content">
        <h1><?php the_title()?></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi esse, molestiae nostrum praesentium reiciendis repellendus sequi sunt? Ab accusantium consequuntur distinctio doloremque eligendi exercitationem, modi porro quaerat quibusdam soluta. Cupiditate dolore id quidem sed.</p>
      </div>
    </div>
  </header>

<?php the_content()?>

<?php get_footer() ?>