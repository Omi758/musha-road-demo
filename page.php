<!-- header -->
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<main class="u-ptb">
  <div class="l-container-s">
    <h1 class="c-title-level1"><?php the_title(); ?></h1>

    <div class="l-page-body">
      <?php the_content(); ?>
    </div>
  </div>
</main>
<?php endwhile; ?>
<?php endif; ?>

<!-- breadcrumb -->
<?php get_template_part("template-parts/breadcrumb"); ?>


<?php
// 現在のページがお問い合わせページではない場合のみCTAを表示
if (!is_page("contact") && !is_page("お問い合わせ")) :
?>
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
<?php endif; ?>

<!-- footer -->
<?php get_footer(); ?>