<?php
/*
 * Template Name: functions.php
 */

/* --------------------------------------
カスタムロゴ機能追加
---------------------------------------  */

add_theme_support('custom-logo');



/* --------------------------------------
投稿のアーカイブページを作成する
---------------------------------------  */

function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'blog'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/* --------------------------------------
カスタムロゴ機能追加
---------------------------------------  */

add_theme_support('custom-logo');

/* --------------------------------------
メニューの設定
---------------------------------------  */
function register_my_menus()
{
    register_nav_menus(array(
'main-menu' => 'Main Menu',
// 'about-menu' => 'about menu',
// 'tab-menu' => 'tab menu',
));
}
add_action('after_setup_theme', 'register_my_menus');

/* --------------------------------------
パンくずリスト
---------------------------------------  */


function output_breadcrumb(){
    $home = '<li><a href="'.get_bloginfo('url').'">HOME</a>   </li>';
    echo '<ul class="breadcrumb">';
  
    // トップページの場合
    if ( is_front_page() ) {
  
    // カテゴリーページの場合
    } else if ( is_category() ) {
    $cat = get_queried_object();
    $cat_id = $cat->parent;
    $cat_list = array();
    while($cat_id != 0) {
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach ($cat_list as $value) {
      echo $value;
    }
    the_archive_title('<li>', '</li>');
  
    // アーカイブページの場合
    } else if ( is_archive() ) {
    echo $home;
    the_archive_title('<li>', '</li>');
  
    // 投稿ページの場合
    } else if ( is_single() ) {
    $cat = get_the_category();
    if( isset( $cat[0]->cat_ID ) ) $cat_id = $cat[0]->cat_ID;
    $cat_list = array();
    while( $cat_id != 0 ) {
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach($cat_list as $value) {
      echo $value;
    }
    the_title('<li>', '</li>');
  
    // 固定ページの場合
    } else if ( is_page() ) {
    echo $home;
    the_title('<li>', '</li>');
  
    // 検索結果の場合
    } else if ( is_search() ) {
    echo $home;
    echo '<li>「'.get_search_query().'」の検索結果</li>';
  
    // 404ページの場合
    } else if ( is_404() ) {
    echo $home;
    echo '<li>ページが見つかりません</li>';
    }
    echo '</ul>';
  }
  


  // アイキャッチ画像
 add_theme_support( 'post-thumbnails' );
add_image_size( 'eyecatch-thumbnails', 400, 272, true );
 add_image_size( 'full', 1200, 472, true );

  
// アイキャッチ画像の有効化
add_theme_support('post-thumbnails');



function twpp_setup_theme() {
  add_theme_support( 'post-thumbnails' );
  // set_post_thumbnail_size( 200, 200, true );
}
add_action( 'after_setup_theme', 'twpp_setup_theme' );


//フッターメニュー出力
register_nav_menu( 'footer-menu', 'フッターメニュー' );


// 管理バーを表示
