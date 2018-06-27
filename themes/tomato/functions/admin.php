<?php
/* ===============================================================================
  管理画面設定ファイル
=============================================================================== */

/*===================================
wp_head 不用な情報を消す
===================================*/
//バージョン
remove_action('wp_head', 'wp_generator');
//遠隔投稿
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
//コメントフィードを削除
remove_action('wp_head', 'feed_links_extra', 3);

/*===================================
エディターにCSS適用
===================================*/
function mytheme_setup() {
  add_editor_style('style.css');
}
add_action( 'after_setup_theme', 'mytheme_setup' );

/*===================================
adminバー非表示
===================================*/
add_filter( 'show_admin_bar', '__return_false' );

/*===================================
自動整形をはずす
===================================*/
remove_filter('the_content', 'wpautop');

/*===================================
更新通知を削除
===================================*/
add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));

// プラグイン更新通知非表示
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;"));

// テーマ更新通知非表示
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));


/*===================================
メニュー非表示 右上のヘルプ・ダッシュボードの点線
===================================*/
function disable_help_link() {
    echo '<style type="text/css">
            #contextual-help-link-wrap {display: none !important;}
            .empty-container{ border:0px !important}
            .metabox-holder .postbox-container .empty-container {display: none;}
          </style>';
}
add_action('admin_head', 'disable_help_link');

/*===================================
管理バー 項目非表示
===================================*/
function remove_bar_menus( $wp_admin_bar ) {
    $wp_admin_bar->remove_menu( 'wp-logo' );      // ロゴ
    //$wp_admin_bar->remove_menu( 'site-name' );    // サイト名
    $wp_admin_bar->remove_menu( 'view-site' );    // サイト名 -> サイトを表示
    $wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 -> ダッシュボード (公開側)
    $wp_admin_bar->remove_menu( 'themes' );       // サイト名 -> テーマ (公開側)
    $wp_admin_bar->remove_menu( 'customize' );    // サイト名 -> カスタマイズ (公開側)
    $wp_admin_bar->remove_menu( 'comments' );     // コメント
    $wp_admin_bar->remove_menu( 'updates' );      // 更新
    $wp_admin_bar->remove_menu( 'view' );         // 投稿を表示
    $wp_admin_bar->remove_menu( 'new-content' );  // 新規
    $wp_admin_bar->remove_menu( 'new-post' );     // 新規 -> 投稿
    $wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
    $wp_admin_bar->remove_menu( 'new-link' );     // 新規 -> リンク
    $wp_admin_bar->remove_menu( 'new-page' );     // 新規 -> 固定ページ
    $wp_admin_bar->remove_menu( 'new-user' );     // 新規 -> ユーザー
    //$wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
    $wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント -> プロフィール
    $wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント -> プロフィール編集
    //$wp_admin_bar->remove_menu( 'logout' );       // マイアカウント -> ログアウト
    $wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
}
//if(!current_user_can('administrator')){
add_action('admin_bar_menu', 'remove_bar_menus', 201);
//}

/*===================================
ダッシュボード 項目非表示
===================================*/
function example_remove_dashboard_widgets() {
  remove_action( 'welcome_panel', 'wp_welcome_panel' ); //WordPressへようこそ
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); //WordPressニュースなど
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); //クイックドラフト
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); //コメント
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal'); //アクティビティ
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


/*===================================
メニュー削除
===================================*/
function remove_menus () {
  //remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // 投稿 -> タグ
  //remove_menu_page('edit.php'); // 投稿
  //remove_menu_page('tools.php'); // ツール
  //remove_menu_page('edit.php?post_type=page'); // 固定ページ
  //remove_menu_page('themes.php'); // 外観
  //remove_menu_page('plugins.php'); // プラグイン
  //remove_menu_page('options-general.php'); // 設定
  remove_menu_page('link-manager.php'); // リンク
  remove_menu_page('edit-comments.php'); // コメント
  global $menu;
}

if(!current_user_can('administrator')){
add_action('admin_menu', 'remove_menus',999);
}


/*===================================
管理画面 フッターを削除
===================================*/
function remove_footer_version() {
    remove_filter('update_footer','core_update_footer');
}
add_action('admin_menu','remove_footer_version');
add_filter('admin_footer_text','__return_empty_string');

