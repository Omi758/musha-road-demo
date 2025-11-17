      <!-- posts -->
      <?php if ( have_posts() ) : ?>
      <div class="c-posts c-posts--col3">
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("c-post"); ?>>
          <?php
          $categories = get_the_category();
          if($categories):
            $category = $categories[0]; // 最初のカテゴリーを使用
            $category_id = $category->term_id;
            $category_color = get_category_color($category_id);
          ?>
          <div class="c-meta">
            <span class="c-label" style="background-color: <?php echo esc_attr($category_color); ?>;">
              <?php echo esc_html($category->name); ?>
            </span>
            <time datetime=" <?php the_time("Y-m-d") ?>" class="c-date"><?php the_time("Y/m/d"); ?></time>
          </div>
          <?php endif; ?>

          <a href="<?php the_permalink(); ?>" class="c-post-thumbnail">
            <?php if ( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail("medium"); ?>
            <?php else: ?>
            <img src='<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png' width='352' height='200'
              alt='' decoding='async'>
            <?php endif; ?>
          </a>
          <h2 class="c-post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
        </article>
        <?php endwhile; ?>
      </div>
      <!-- end posts -->

      <!-- pagination -->
      <nav class="c-pagination">
        <?php
        $pagination_args = array(
          "mid_size" => 1, // 現在のページの前後に表示するページ数
          "prev_text" => '<span class="u-visually-hidden">前のページ</span>', // 「前へ」テキスト
          "next_text" => '<span class="u-visually-hidden">次のページ</span>', // 「次へ」テキスト
          "screen_reader_text" => 'ページナビゲーション', // スクリーンリーダー用テキスト
          "type" => 'plain', // 出力形式
          "before_page_number" => '', // ページ番号の前に追加するHTML
          "after_page_number" => '<span class="u-visually-hidden">ページ目</span>' // ページ番号の後に追加するHTML
        );
          //paginate_links()の結果を変数に格納
          $pagination = paginate_links($pagination_args);

          // ページネーションのHTMLを整形して出力
          if ($pagination) {
            // クラスを追加するための処理
            $pagination = str_replace("page-numbers", "c-pagination-item", $pagination);
            $pagination = str_replace("current", "is-pagination-active", $pagination);
            $pagination = str_replace("prev", "c-pagination-item--prev", $pagination);
            $pagination = str_replace("next", "c-pagination-item--next", $pagination);

            // 「現在のページ：」テキストを追加
            $pagination =preg_replace(
              '/class="c-pagination-item is-pagination-active">([\d]+)/',
              'class="c-pagination-item is-pagination-active"><span class="u-visually-hidden">現在のページ：</span>$1',
              $pagination
            );

            echo $pagination;
          }
        ?>


      </nav>
      <!-- end pagination -->
      <?php endif; ?>