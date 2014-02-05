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
 
 $bkgImg = get_field('background_image');
 
 
 $link = $bkgImg['url'];
 $style = "background:url('" . $link . "') no-repeat 100%;";
?>
<style type="text/css">
    .social-content {
        position:relative;
        top:20vh;
    }
    
    .video {
        
    }
    
    .social {
        position: relative;
        top: -1.5em;
    }
    
    .social a{
        margin-right:4%;
    }
    
    .entry-content {
        padding:20px;
        height: 450px;
    }
    
    .entry-content .head{
    
    }
    
    .entry-content .content-footer {
        bottom: 130px;
        position: absolute;
        width: 88%;
    }
    
    .entry-content .content-footer .navigation{
        bottom: -2vh;
        position: relative;
        margin: 0;
        padding: 0;
    }
    
    .nav-links .next {
        width:40px;
        position: absolute;
        right: 0vh;
        top: 0px;
    }
    
    .nav-links .prev {
        width:40px;
        position: absolute;
        left: 0vh;
        top:0px;
    }
    
    .entry-content .description {
    
    }
</style>

<div  class="slide" >
<img src="<?=$link?>" width="100%" data-position="0,0" data-in="left" data-delay="0" data-out="right">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-position="50,710" data-in="left" data-delay="1" data-out="right" >
	<?php twentyfourteen_post_thumbnail(); ?>
	
	

	<header class="entry-header">

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
	    <div class="head">
	    <?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title" align="center">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title" align="center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
			
		?>
		</div>
		
		<div class="description">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
		?>
		</div>
		
		<div class="content-footer">
		    <div class="social-content" align="center">
                <div class="video">
        	        <a href="#">
        	            <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Play-button.png"/>
        	        </a>
                    <p> watch our students perform</p>
                </div>
        	    <div class="social">
        		    <a href="#">
        		        <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_FB-(small).png" />
        		    </a>
        		    <a href="#">
        		        <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Twitter-(small).png" />
        		    </a>
        		    <a href="#">
        		        <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_G+-(small).png" />
        		    </a>
        	    </div>
            </div>
		    <?php
		        // Previous/next post navigation.
			    twentyfourteen_post_gallery_nav();
			?>
	    </div>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
    
</div>
