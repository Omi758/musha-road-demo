    <?php get_header(); ?>
    <main>
      <!-- page-kv -->
      <div class="c-page-kv">
        <div class="l-container">
          <h1 class="c-title-level1 c-title-level1--center">404 エラー</h1>
        </div>
      </div>
      <!-- end page-kv -->

      <div class="u-ptb">
        <div class="l-container-s">
          <p class="error-text">
            <span>申し訳ございません。お探しのページは見つかりませんでした。</span><span>入力したアドレスが間違っているか、ページが移動・削除された可能性があります。</span>
          </p>

          <div class="error-button">
            <a href="<?php echo home_url('/'); ?>" class="c-button c-button--size-medium">トップへ</a>
          </div>
        </div>
      </div>
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
    <?php get_footer(); ?>