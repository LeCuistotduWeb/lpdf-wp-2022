<?php
/**
 * Search Result
 */
?>

<div id="searchResultContainer" class="search-result-container">

  <!--  Brands  -->
  <div class="search-result-content search-result-content-brands">
    <div class="search-result-title">Marques</div>
    <div class="badges-container">
      <?php if($data['marque']):
        foreach ($data['marque'] as $brand){ ?>
          <a href="<?= $brand['permalink'] ?>">
            <div class="badge badge-primary badge-brand"><?= $brand['title'] ?></div>
          </a>
        <?php } else: ?>
        <div><?= __('Aucune marque trouvé') ?></div>
      <?php endif; ?>
    </div>
  </div>

  <!--  Posts  -->
  <div class="search-result-content search-result-content-posts">
    <div class="search-result-title">Articles</div>
    <div class="posts-container">
      <?php if($data['post']):
        foreach ($data['post'] as $post){ ?>
          <a class="search-result-link" href="<?= $post['permalink'] ?>">
            <div class="card-post">
              <div class="img">
                <?= $post['thumbnail'] ?>
              </div>
              <div class="content">
                <?= $post['title'] ?>
              </div>
            </div>
          </a>
        <?php } else: ?>
        <div><?= __('Aucune article trouvé') ?></div>
      <?php endif; ?>
    </div>
  </div>

  <!--  Products  -->
  <div class="search-result-content search-result-content-products">
    <div class="search-result-title">Produits</div>
    <?php if($data['product']):
      foreach ($data['product'] as $product){ ?>
        <a class="search-result-link" href="<?= $product['permalink'] ?>"><?= $product['title'] ?></a>
      <?php } else: ?>
      <div><?= __('Aucune produit trouvé') ?></div>
    <?php endif; ?>
  </div>
</div>