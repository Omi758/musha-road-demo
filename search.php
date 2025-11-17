<?php get_header(); ?>
<main>
  <!-- page-kv -->
  <div class="c-page-kv">
    <div class="l-container">
      <?php
      // 検索キーワードを取得
      $search_query = get_search_query();
      
      // 検索キーワードが空かどうかで表示分岐
      if ( !empty($search_query) ) :
      ?>
      <h1 class="c-title-level1">『<?php echo esc_html($search_query); ?>』の検索結果</h1>
      <?php else : ?>
      <h1 class="c-title-level1">検索結果</h1>
      <?php endif; ?>
    </div>
  </div>
  <!-- end page-kv -->
  <!-- search-result -->
  <div class="u-ptb">
    <div class="l-container">
      <?php if ( have_posts() ) : ?>

      <!-- loop-article.phpにループ処理を委任 -->
      <?php get_template_part("template-parts/loop", "article"); ?>

      <?php else: ?>
      <div class="search-result-description">
        <p>『<?php the_search_query(); ?>』の検索結果が見つかりませんでした。</p>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- search-result -->
</main>

<!-- breadcrumb -->
<?php get_template_part("template-parts/breadcrumb"); ?>

<!-- cta -->
<div class="c-cta">
  <div class="l-container-s">
    <div class="c-cta-inner">
      <div class="c-cta-screenshot">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-cta-screenshot.png" width="640"
          height="362" alt="模写修行のPC画面のスクリーンショット" />
      </div>

      <div class="c-cta-body">
        <div class="c-cta-logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-moshashugyo.png" width="850"
            height="102" alt="模写修行" />
        </div>
        <p class="c-cta-copy">駆け出しエンジニアのためのコーディング練習教材</p>
        <div class="c-cta-button">
          <a href="https://www.google.com/" class="c-button c-button--size-medium c-button--white" target="_blank"
            rel="noopener noreferrer">詳しくはこちら</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end cta -->

<!-- footer -->
<?php get_footer(); ?>