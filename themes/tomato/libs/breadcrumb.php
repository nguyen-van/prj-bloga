<?php if(!is_home()){?>

<ul class="c-breadcrumb">
<li><a href="<?php echo home_url(); ?>">home</a></li>

<?php /*=======================================
custom post
===============================================*/ ?>
<?php if(is_singular("xxxx")){ ?>


<?php /*=======================================
single
===============================================*/ ?>
<?php }elseif((is_single()&&get_post_type()=="post")){ ?>

<?php /*=======================================
single
===============================================*/ ?>
<?php }elseif(is_single()){ ?>


<?php /*=======================================
pages
===============================================*/ ?>
<?php }elseif(is_page()){ ?>


<?php /*=======================================
other
===============================================*/ ?>
<?php }else{ ?>




<?php } ?>


<li><?php the_title(); ?></li>
</ul>

<?php } ?>
