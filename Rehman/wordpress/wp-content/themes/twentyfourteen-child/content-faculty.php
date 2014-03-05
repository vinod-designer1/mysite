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
 
 $tagsObj = get_the_tags();
 
 $tags = array();
 
 foreach ($tagsObj as $tag){
    $tags[] = $tag->name;
 }
?>
<style type="text/css">
    .social-content {
        position:absolute;
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
        height: 650px;
    }
    
    .entry-content .head{
    
    }
    
    .entry-content .head .navigation{
        bottom: 13vh;
        position: relative;
        margin: 0;
        padding: 0;
    }
    
    .nav-links .next {
        position: absolute;
        right: -10px;
        top: 3px;
        width: 40px;
    }
    
    .nav-links .prev {
        width:40px;
        position: absolute;
        left: -30px;
        top:11px;
    }
    
    .entry-content .description {
        height: 580px;
    }
    
    .arrow-down{
        float: right;
        position: relative;
    }
    
    .third {
        bottom: 27px;
        left: -9%;
        position: relative;
    }
    
    
    .third > span{
        margin-left:69px;
        color:white;
    }
    
    #page {
        height: 789px;
        position: relative;
        width: 100%;
    }
</style>

<div  class="slide" >
<img src="<?=$link?>" width="100%" data-position="0,0" data-in="fade" data-delay="0" data-out="fade">
<article id="post-<?php the_ID(); ?>" <?php post_class('faculty_post'); ?> data-position="50,820" data-in="fade" data-delay="500" data-out="fade" >
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
				the_title( '<h2 class="entry-title" align="center">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title" align="center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			
	        if (!in_array('home', $tags)) {
    			// Previous/next post navigation.
    			twentyfourteen_post_gallery_nav();
	        }
		?>
		</div>
		
		<div class="description">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
		?>
		</div>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<footer class="">
	    <?php
	        if (in_array('home', $tags)) {
	            twentyfourteen_post_course_nav();
	        }
		?>
	    <div class="third">
			<span>Careers</span>
	        <span>Gallery</span>
	        <span>Contact Us</span>
	    </div>
	</footer>
</article><!-- #post-## -->

    <div class="social-content" data-position="600,450" data-in="fade" data-delay="2" data-out="fade">
         <div class="video">
        	<a href="#">
        	   <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Play-button.png"/>
        	</a>
            <p class="watch-title"> watch our students perform</p>
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
    
</div>
