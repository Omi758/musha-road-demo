<?php  get_header(); ?>
<main>
  <!-- top-kv -->
  <?php if ( is_home() ): ?>

  <?php
    // ---------------
    // ピックアップメニューから投稿IDを取得
    // ---------------
    $pickup_post_id = null;

    // テーマのメニュー位置と実際のメニューIDの対応を取得
    $location = get_nav_menu_locations();
    if (!empty($location['pickup'])) {
      // 「ピックアップ」位置に割り当てられているメニューIDを取得
      $pickup_menu_id = $location['pickup'];

      // そのメニューに登録されている項目一覧
      $pickup_items = wp_get_nav_menu_items($pickup_menu_id);

      // 先頭のメニュー項目があれば、投稿/固定ページIDを取得
      if ( ! empty( $pickup_items ) && isset($pickup_items[0]->object_id) ) {
        $pickup_post_id = (int) $pickup_items[0]->object_id;
    }
  }
    // ピックアップ投稿が取得できた場合のみKVを表示
    if ($pickup_post_id) :
        $pickup_post = get_post($pickup_post_id);
      ?>


  <div class="top-kv">
    <div class="l-container">
      <div class="top-kv-inner">

        <article class="top-kv-recommend">
          <a href="<?php echo esc_url( get_permalink($pickup_post_id)); ?>" class="top-kv-recommend-link">

            <div class="top-kv-recommend-thumbnail">
              <?php
              // アイキャッチ画像がある場合は表示、なければデフォルト画像
              if ( has_post_thumbnail($pickup_post_id) ) {
                echo get_the_post_thumbnail($pickup_post_id,
                 "full",
                  array(
                     "width" => "1200",
                      "height" => "630",
                       "alt" => get_the_title($pickup_post_id),
                      )
                    );
                  } else {
                    ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumbnail.png" width="1200" height="630"
                alt="<?php echo esc_attr(get_the_title($pickup_post_id)); ?>" />
              <?php
                  }
?>
            </div>

            <div class="top-kv-recommend-body">
              <?php
              // カテゴリ―の取得と表示($pickup_post_idから取得)
              $categories = get_the_category($pickup_post_id);
              if ( $categories ) :
                $category = $categories[0]; // 最初のカテゴリーを使用
                $category_id = $category->term_id;
                $category_name = $category->name;
                $category_color = get_category_color($category_id);
              ?>
              <span class="c-label" style="background-color: <?php echo esc_attr($category_color); ?>;">
                <?php echo esc_html($category_name); ?>
              </span>
              <?php endif; ?>

              <h2 class="top-kv-recommend-title">
                <?php echo esc_html(get_the_title($pickup_post_id)); ?>
              </h2>

              <div class="top-kv-recommend-date">
                <time datetime=" <?php echo esc_attr(get_the_date("Y-m-d", $pickup_post_id)) ?>" class="c-date">
                  <?php echo esc_html( get_the_date("Y-m-d", $pickup_post_id)); ?>
                </time>
              </div>
            </div>
          </a>
        </article>

        <div class="top-kv-character">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-kv-character.png" width="400"
            height="569" alt="おすすめの記事" />
        </div>
      </div>
    </div>

    <div class="top-kv-treat">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-kv-treat.png" width="500" height="172"
        alt="" />
    </div>
  </div>
  <?php endif; // $pickup_post_idが有るか ?>
  <?php endif; // is_home ?>

  <!-- end top-kv -->

  <div class="u-ptb">
    <div class="l-container">

      <!-- posts-pagenation -->
      <?php get_template_part( "template-parts/loop","article" ); ?>
    </div>
  </div>
</main>
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