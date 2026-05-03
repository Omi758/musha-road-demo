<?php

/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support("post-thumbnails");

/**
 * CSS・JSファイルの読み込み
 */
function mushaenomichi_enqueue_scripts() {
    // cssファイルの読み込み
    wp_enqueue_style(
        "mushaenomichi-style",
        get_template_directory_uri()."/assets/css/main.css",
        array(),
        "1.0.0"
    );

    // GoogleFontsの読み込み
 wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap',
        array(),
        '1.0.0'
    );

    // JavaScriptファイルの読み込み
    wp_enqueue_script(
        "mushaenomichi-main",
        get_template_directory_uri(). "/assets/js/main.js",
        array(),
        "1.0.1", //バージョン番号（キャッシュ対策で更新）
        true //footerで読み込む（true = </body>直前、false = <head>内）
    );
}

add_action("wp_enqueue_scripts", "mushaenomichi_enqueue_scripts");


/**
 * カテゴリーの色を取得する
 */
function get_category_color($category_id){
  // ACFでカテゴリーに設定した”category_color”フィールドの値を取得
  $color = get_field("category_color", "category_" . $category_id);

  // 色が設定されていない場合はデフォルト色を返す
  if(!$color) {
    $color = "#cccccc";
  }

  return $color;
}

/**
 * アーカイブページ_接頭語を削除
 */
function custom_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_date() ) {
        // 日付アーカイブの場合
        if ( is_year() ) {
            $title = get_the_date( 'Y年' );
        } elseif ( is_month() ) {
            $title = get_the_date( 'Y年n月' );
        } elseif ( is_day() ) {
            $title = get_the_date( 'Y年n月j日' );
        }
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title' );

/**
 * 投稿者アーカイブページを無効にする
 */
add_filter("author_rewrite_rules", "__return_empty_array");
function disable_author_archive(){
    if(isset($_GET["author"]) || preg_match("#/author/.#", $_SERVER["REQUEST_URI"])){
        wp_redirect(home_url("/"));
        exit;
    }
}
add_action("init", "disable_author_archive");

/**
 * 検索結果を投稿記事のみに制限する
 *
 * @param WP_Query $query 検索クエリオブジェクト
 * @return void
 */
function custom_search_filter($query) {
    //管理画面ではない かつ メインクエリ かつ 検索ページの場合
    if(!is_admin() && $query->is_main_query() && $query->is_search()) {
        //投稿タイプを「ポスト」のみに制限
        $query->set("post_type", "post");
    }
}
add_action("pre_get_posts", "custom_search_filter");

/**
 * ブロックエディターにCSSを読み込む
 */
function my_editor_support() {
    add_theme_support("editor-styles");
    
    // Google Fontsをエディターにも読み込む
    add_editor_style('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap');
    
    // カスタムエディタースタイルを読み込む
    add_editor_style("assets/css/editor-style.css");
}
add_action("after_setup_theme", "my_editor_support");

/**
 * エディター用のCSS変数を定義
 */
function add_editor_css_variables() {
    $template_uri = get_template_directory_uri();
    echo "
    <style>
    .editor-styles-wrapper h3::before {
        background-image: url('{$template_uri}/assets/img/icon-mosha.png') !important;
    }
    </style>
    ";
}
add_action('admin_head', 'add_editor_css_variables');

/**
 * 「カスタムメニュー」昨日を使ってグローバルナビゲーションメニュー作成
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => 'ヘッターメニュー',
			'pickup'        => 'ピックアップ',
			'footer-menu' => 'フッターメニュー',
		)
	);
}
add_action( 'after_setup_theme', 'register_my_menus' );