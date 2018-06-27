<?php

get_header(); 
// get header site

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	<article class="p-post"></article>
		<!-- <h2>title is there</h2> -->
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
		<!-- get link title -->
	</article>
	<?php the_content(); ?>

	<?php endwhile;

	else: 
		echo '<p>no content found</p>';
	endif;
get_footer();
// get footer site
?>
<!-- get title and show content post -->