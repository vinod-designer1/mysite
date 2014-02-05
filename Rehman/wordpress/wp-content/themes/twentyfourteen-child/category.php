<?php 
    if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post();
		
		    wp_redirect(get_permalink($post->ID));
		endwhile;

	else :
		// If no content, include the "No posts found" template.
		wp_redirect('/404');
	endif;
?>