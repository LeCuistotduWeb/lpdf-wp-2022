<footer class="footer">
  <div class="footer__container container">
    <?php if ( is_active_sidebar( 'footer-widget-1' )) : ?>
      <div class="footer__col footer_col-1">
        <?php dynamic_sidebar('footer-widget-1'); ?>
      </div>
    <?php endif;?>

    <?php if ( is_active_sidebar( 'footer-widget-2' )) : ?>
      <div class="footer__col footer_col-2">
        <?php dynamic_sidebar('footer-widget-2'); ?>
      </div>
    <?php endif;?>

    <?php if ( is_active_sidebar( 'footer-widget-3' )) : ?>
      <div class="footer__col footer_col-3">
        <?php dynamic_sidebar('footer-widget-3'); ?>
      </div>
    <?php endif;?>
  </div>

  <div class="container">
    <hr class="divider">
  </div>

  <div class="footer-bottom container">
    <p>Tous droits réservés <strong>Lepoudrierdefleur</strong> ♡ site réalisé par <a href="https://lecuistotduweb.fr" target="_blank" rel="noreferrer">Lecuistotduweb</a></p>
  </div>
</footer>
<?php wp_footer() ?>
</body>
</html>