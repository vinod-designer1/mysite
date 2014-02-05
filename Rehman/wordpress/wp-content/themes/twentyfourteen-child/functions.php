<?php
if ( ! function_exists( 'twentyfourteen_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( true, '', true );
	$next     = get_adjacent_post( true, '', false );
	

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-links">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'twentyfourteen' ) );
			else :
				previous_post_link( '%link', __( '<span class="meta-nav pull-left">&#60</span>', 'twentyfourteen' ), true );
				next_post_link( '%link', __( '<span class="meta-nav pull-right">&#62</span>', 'twentyfourteen' ), true );
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );
	

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}
	
	
	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_post_gallery_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_post_gallery_nav() {
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( true, '', true );
	    $next     = get_adjacent_post( true, '', false );
	    
	    $post = get_post();
	    
	    if (!next && !previous) {
	        return;
	    }
	     
	    $category = get_the_category();
	    $category_name = $category[0]->slug;
	    $category_parent_url = '';
	    
	    if ($category[0]->parent !=0 ) {
	        $category_parent_url = '/'.strtolower(get_cat_name ($category[0]->parent));
	    }
	    //http://www.vantagepoint3.org/resources/wp/wp-content/uploads/2012/11/pause-button1.png
	    //<a href="#" class="play" id="playpauses" rel="play" playid="<?=$post->ID"></a>
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
		    
			<?php
			if ( $previous ) :
			    $post_name = $previous->post_name;
			    $post_id = $previous->ID;
			    //$link = $category_parent_url.'/' . $category_name . '/'. $post_name . '/';
			    $link = get_permalink( $post_id );
				$html = '<a href="' . $link . '" class="prev" postid="' . $post_id . '" rel="prev"><span class="meta-nav pull-left">
				    <img src="'.  get_template_directory_uri() . '/images/sprites/KMMC-Sprite_Left-Arrow.png" />
				</span></a>';
				echo $html;
			endif;
			
			if( $next ) :
			    $post_name = $next->post_name;
			    $post_id = $next->ID;
			    $link = get_permalink( $post_id );
			    //$link = $category_parent_url.'/' . $category_name . '/'. $post_name . '/';
			    $html = '<a href="' . $link . '" class="next" postid="' . $post_id . '" rel="next"><span class="meta-nav pull-right">
			        <img src="'.  get_template_directory_uri() . '/images/sprites/KMMC-Sprite_Right-Arrow.png" />
			    </span></a>';
			    echo $html;
				
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

function twentyfourteen_post_course_nav() {
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( true, '', true );
	    $next     = get_adjacent_post( true, '', false );
	    
	    $post = get_post();
	    
	    if (!next) {
	        return;
	    }
	     
	    $category = get_the_category();
	    $category_name = $category[0]->cat_name;
	    //http://www.vantagepoint3.org/resources/wp/wp-content/uploads/2012/11/pause-button1.png
	    //<a href="#" class="play" id="playpauses" rel="play" playid="<?=$post->ID"></a>
	    if( $next ) :
	       $post_name = $next->post_name;
		   $post_id = $next->ID;
		   $link = '/' . $category_name . '/'. $post_name . '/';
	?>
	<div class="arrow-down">
	       <a href="<?=$link?>" class="next" postid="<?=$post_id?>" rel="next">
	        <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Down-Arrow.png" />
	       </a>
	</div>
	<?php
	   endif;
}
endif;
?>