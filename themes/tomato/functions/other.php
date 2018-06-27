<?php
/**********************************************************************************
 * ■その他
 **********************************************************************************/

//////////////////////////////////////////////////////////////////////////////////
// wp_pagenavi スタイル変更
//////////////////////////////////////////////////////////////////////////////////
//add_filter( 'wp_pagenavi', 'custom_wp_pagenavi' );
//function custom_wp_pagenavi($html) {
//  $out = '';
//  $out = str_replace("<div", "", $html);
//  $out = str_replace("class='wp-pagenavi'>", "", $out);
//  $out = str_replace("<a", "<li><a", $out);
//  $out = str_replace("</a>", "</a></li>", $out);
//  $out = str_replace("<span", "<li><span", $out);
//  $out = str_replace("</span>", "</span></li>", $out);
//  $out = str_replace("</div>", "", $out);
//
//  return '<div class="wp-pagenavi"><ul>'.$out.'</ul></div>';
//}

/*===================================
RSSにカスタム投稿を含める
===================================*/
function myfeed_request($qv) {
  if (isset($qv['feed']) && !isset($qv['post_type']))
    $qv['post_type'] = array('post','case');
  return $qv;
}
//add_filter('request', 'myfeed_request');

/*===================================
セルフピンバックを停止
===================================*/
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );



/*===================================
制作用 固定ページ作成
add_page('スラッグ','ページタイトル')
===================================*/
function add_page($slug,$title) {

// $page_list="";

query_posts(Array(
'post_type' => 'page',
'showposts' => -1
));
if(have_posts()){while(have_posts()){the_post();
$page_list[] = basename(get_permalink());
}}

$my_post = array(
'post_title'  => $title,
'post_name' => $slug,
'post_status' => 'publish',
'post_type' => 'page'
);


if(!in_array($slug,$page_list)){
wp_insert_post( $my_post );
}

}