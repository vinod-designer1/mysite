<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
 $req = get_field('right_content');
 $bkgImg = get_field('background_image');
 
 
 $link = $bkgImg['url'];
 $style = "background:url('" . $link . "') no-repeat 100%;";
?>
<div  class="slide" style="<?=$style?>">
<img src="<?=$link?>" width="100%" data-position="0,0" data-in="fade" data-delay="0" data-out="fade">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-position="50,710" data-in="fade" data-delay="500" data-out="fade" >
	<?php twentyfourteen_post_thumbnail(); ?>
	
	

	<header class="entry-header">
		
		<?php
		

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
				//if ( 'post' == get_post_type() )
				//	twentyfourteen_posted_on();

				
			?>
			<?php

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			
			// Previous/next post navigation.
			twentyfourteen_post_gallery_nav();
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->

</div>