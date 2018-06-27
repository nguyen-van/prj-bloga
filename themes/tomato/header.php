<!doctype html>
<html lang="ja" id="pagetop">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php /*=======================================
Meta
===============================================*/ ?>
<?php include(get_template_directory().'/libs/meta.php');?>


<?php /*=======================================
CSS
===============================================*/ ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">

<?php /*======================================
JS
===============================================*/ ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.12.4.min"></script>

<?php /*======================================
Viewport
===============================================*/ ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<?php /*
<?php
require_once 'libs/Mobile_Detect.php';
$detect = new Mobile_Detect;

//タブレット
if($detect->isTablet()){?>

<?php //スマホ
}elseif($detect->isMobile()){?>

<?php //デスクトップ
}else{ ?>

<?php }?>

*/ ?>


<?php /*======================================
WPhead
===============================================*/ ?>
<?php wp_head(); ?>

</head>

<?php /*=======================================
body ページ別クラス追加
===============================================*/ ?>
<?php
if(is_page('top') || is_home()){
	$class="page-top";
}elseif(is_page()){
	$class="page-".get_page($page_id)->post_name;
}elseif(is_archive()){
	$class="archive-".get_post_type();
}elseif(is_single()){
	$class="single";
	$class.=" single-".get_post_type();
	$class.=" single-".$post->post_name;
}
$class_ie="";

$ua = $_SERVER['HTTP_USER_AGENT'];
if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {$class_ie=" ie";}?>

<body id="pagetop" class="<?php echo $class; ?><?php echo $class_ie; ?>">




<?php
//////////////////////////////////////////////////////////////////////////////////
// HEADER PC
////////////////////////////////////////////////////////////////////////////////// ?>


<div class="c-header">
	<!-- <div class="c-logo">
		<a href="">
		<div class="c-entry">
		<span class="c-entry__text">entry</span>
		</div>
		</a>
	</div> -->
	<div class="c-header1">
		<div class="c-navbar">
		<ul>
			<li><a href=""><p>home</p></a></li>
			<li class="c-toggle">
			<a href="#"><p>blogs</p></a>
			<!-- <ul class="c-subnav">
				<li>
				<a href="">
				<img src="http://placehold.jp/45x45.png" alt="">
				<p>item1</p>
				</a>
				</li>
				<li>
				<a href="">
				<img src="http://placehold.jp/45x45.png" alt="">
				<p>item2</p>
				</a>
				</li>
				<li>
				<a href="">
				<img src="http://placehold.jp/45x45.png" alt="">
				<p>item3</p>
				</a>
				</li>
			</ul> -->
			</li>
			<li><a href=""><p>porfile</p></a></li>
			<li><a href=""><p>contact</p></a></li>
			<li><a href="#"><p>gallery</p></a></li>
			<li><a href="#"><p>tips</p></a></li>
		</ul>
		</div>
	</div>
</div> 




<?php
//////////////////////////////////////////////////////////////////////////////////
// HEADER SP
////////////////////////////////////////////////////////////////////////////////// ?>