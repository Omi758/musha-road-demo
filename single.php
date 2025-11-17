<?php get_header(); ?>
<main class="u-ptb">
  <div class="l-container-s">
    <!-- single-article -->
    <?php if ( have_posts() ) :?>
    <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>
      <div class="c-meta">
        <?php
        //投稿に関連するカテゴリーを取得
        $categories = get_the_category();
        if ($categories) {
          $category = $categories[0]; //最初のカテゴリーを使用
          $category_id = $category->term_id;
          $category_name = $category->name;
          $category_color = get_category_color($category_id);

          //インラインスタイルでカテゴリーの色を適用
          echo '<span class="c-label" style="background-color: ' .esc_attr($category_color) . ';">';
          echo esc_html($category_name);
          echo '</span>';
        }
        ?>
        <time datetime="<?php the_time('Y-m-d'); ?>" class="c-date"><?php the_time("Y/m/d"); ?></time>
      </div>

      <div class="single-title">
        <h1 class="c-title-level1"><?php the_title(); ?></h1>
      </div>

      <div class="single-thumbnail">
        <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
        <?php endif ?>
      </div>

      <div class="single-contents">
        <?php the_content(); ?>
      </div>

      <a href="https://www.google.com/" target="_blank" class="single-banner" rel="noopener noreferrer">
        <picture>
          <source media="(max-width: 767px)"
            srcset="<?php echo get_template_directory_uri(); ?>/assets/img/banner-sp.png" />
          <source media="(min-width: 768px)"
            srcset="<?php echo get_template_directory_uri(); ?>/assets/img/banner.png" />
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner.png" width="1520" height="338"
            alt="模写修行 駆け出しエンジニアのためのコーディング練習教材 詳しくはこちら" />
        </picture>
      </a>
    </article>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- end single-article -->

    <?php
          // 現在の投稿のカテゴリを取得
          $current_categories = get_the_category();
          $current_category_ids = array();

          // カテゴリIDを配列に格納
          if ($current_categories) {
            foreach ($current_categories as $category) {
              $current_category_ids[] = $category->term_id;
            }
          }

          // クエリ引数を設定
          $args = array(
            "post_type" => "post", // 投稿タイプ：通常の投稿
            "posts_per_page" => 6, // 表示件数：6件
            "post__not_in" => array(get_the_ID()), // 現在の投稿を除外_除外タイプと包含タイプはアンダーバー2つ分必要
            "orderby" => "rand", // ランダム表示
            "category__in" => $current_category_ids, // 現在の投稿と同じカテゴリで絞り込み_除外タイプと包含タイプはアンダーバー2つ分必要
          );

          // 新しいクエリを実行
          $recommended_posts = new WP_Query($args);

          // 投稿がある場合
          if ($recommended_posts->have_posts()):
          ?>

    <!-- single-recommend：ここから表示 -->
    <aside class="single-recommend">
      <h2 class="single-recommend-title">おすすめ記事</h2>

      <div class="single-recommend-posts">
        <div class="c-posts c-posts--col2">
          <?php
          while ($recommended_posts->have_posts()) : $recommended_posts->the_post();
          // 各投稿のカテゴリを取得
          $post_categories = get_the_category();
          $category = !empty($post_categories) ? $post_categories[0] : null;

          // カテゴリがある場合はカテゴリの色を取得、なければデフォルト色を使用
          $category_color = $category ? get_category_color($category->term_id) : "#cccccc";
          $category_name = $category ? $category->name : '';
          ?>

          <article class="c-post">
            <div class="c-meta">
              <span class="c-label" style="background-color :
                <?php echo esc_attr($category_color); ?>;"><?php echo esc_html($category_name); ?>
              </span>
              <time datetime="<?php the_time("Y-m-d"); ?>" class="c-date"><?php the_time("Y/m/d"); ?></time>
            </div>
            <a href="<?php the_permalink(); ?>" class="c-post-thumbnail">
              <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail("full", array("width" => "1200", "height" => "630", "alt" => get_the_title())); ?>
              <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumbnail.png" width="1200" height="630"
                alt="<?php the_title_attribute(); ?>" />
              <?php endif ?>
            </a>
            <h3 class="c-post-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
          </article>
          <?php
          endwhile;
          // WordPressのクエリをリセット
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </aside>
    <!-- end single-recommend -->
    <?php endif; ?>
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

<!-- footer -->
<?php get_footer(); ?>