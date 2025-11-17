<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />

  <!-- favicon/webclipicon -->
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="apple-touch-icon" href="webclip.png" />


  <!-- css -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" />

  <!-- google-fonts, JS -->
  <?php wp_head();
 ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- header -->
  <header class="header">
    <div class="l-container">
      <div class="header-head-inner">
        <h1 class="header-logo">
          <a href="<?php echo home_url(); ?>">
            <picture>
              <source media="(max-width: 559px)"
                srcset="<?php echo get_template_directory_uri(); ?>/assets/img/logo-sp.png" />
              <source media="(min-width: 560px)"
                srcset="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" width="640" height="84"
                alt="武者への道 Presented by 模写修行" loading="lazy" />
            </picture>
          </a>
        </h1>
        <div class="header-search">
          <button class="header-search-open-button js-search-open-button">記事検索</button>
        </div>

        <div class="c-sns">
          <a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-sns-twitter.svg" width="400"
              height="400" alt="twitter" loading="lazy" />
          </a>

          <a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-sns-facebook.svg" width="1024"
              height="1024" alt="facebook" loading="lazy" />
          </a>
        </div>
      </div>
    </div>

    <nav class="header-nav">
      <div class="l-container">
        <?php wp_nav_menu(
          array(
            "theme_location" => "header-menu",
            "container"      => false, // 余計なdivを出さない
            "menu_class"      => "header-list",
            "depth"         => 1, // メニューの深さを1にする(サブメニューなし)
            "fallback_cb"   => false, // メニューがない場合は何も表示しない
          )
        );
        ?>
      </div>
    </nav>

  </header>
  <!-- search-modal -->
  <div class="header-modal-bg js-modal-bg"></div>

  <dialog class="header-search-modal js-modal" aria-label="検索のモーダル">
    <div class="header-modal-inner">
      <div class="header-modal-contents js-modal-contents">
        <button class="header-close-button js-close-button"></button>
        <h2 class="header-modal-text">キーワードを入力</h2>
        <form action="<?php echo home_url("/"); ?>" method="get" class="header-search-form">
          <input type="text" name="s" value="<?php the_search_query(); ?>" aria-label="search" autofocus>
          <button type="submit" class="header-search-button js-search-button">検索する</button>
        </form>
      </div>
    </div>
  </dialog>

  <!-- end header-->