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
 
 $right_content = get_field('right_content');
 $bkg_img = get_field('background_image');
 $file = get_field('file');
 $right_title = get_field('right_title');
 
 $title = get_the_title();
 
 
 $link = $bkg_img['url'];
 $style = "background:url('" . $link . "') no-repeat 100%;";
?>
<style type="text/css">
    .post {
        width:960px;
        height:100%;
    }
    
    .entry-content {
        height:460px;
        padding:10px 30px;
    }
    
    .entry-content > .left-content{
        float:left;
        width: 440px;
    }
    
    .entry-content > .right-content{
        float:right;
        width:440px;
    }
    
    .entry-content > .right-content > .entry-description{
        height: 270px;
        font-size:10px;
    }
    
    .entry-content > .left-content > .entry-description{
        height: 300px;
        font-size:10px;
    }
    
    .entry-content > .left-content > .footer{
        
    }
    
    .entry-content > .left-content > .footer > .left{
        float:left;
    }
    
    .entry-content > .left-content > .footer > .right{
        
    }
    
    .entry-content .entry-title{
        text-align: center;
    }
    
    .entry-content .divider {
        float: left;
    }
    
    .entry-content .divider img{
        height: 424px;
        position: relative;
        width: 2px;
    }
    
    .entry-content > .right-content > .footer{
        
    }
    
    .entry-content > .right-content > .footer > .first{
        
    }
    
    .entry-content > .right-content > .footer > .second{
        
    }
    
    .entry-content > .right-content > .footer > .third{
        margin-top: 38px;
    }
    
    .entry-content > .right-content > .footer > .third > span{
        margin-left:80px;
    }
    #applynow {
        margin-bottom:13px;
    }
    
    .btn {
        border-radius: 0px;
        width: 185px;
        font-size: 20px;
        font-weight: 300;
        height: 33px;
        line-height: 1px;
    }
    
    .btn-red {
        background-color:#AB2239;
    }
    
    .btn-blue {
        background-color:#2789BA;
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
    
    .arrow-down{
        float: right;
        position: relative;
    }
</style>

<div  class="slide">
<img src="<?=$link?>" width="100%" data-position="0,0" data-in="fade" data-delay="0" data-out="fade">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-position="50,280"  data-in="fade" data-delay="500" data-out="fade" >
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
	    <div class="left-content">
	        <?php
    	        if ( is_single() ) :
    				the_title( '<h1 class="entry-title">', '</h1>' );
    			else :
    				the_title( '<div class="entry-title"><h1>', '</h1></div>' );
    			endif;
    		?>
			<div class="entry-description">
			    <?php
			        the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			    ?>
			</div>
			<div class="footer">
			    <div class="left">
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
			    <?php if($title != 'The Overview') { ?>
			    <div class="right">
			        <a href="<?=$file['url']?>" target="_blank">
			            <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Download-PDF.png" />
			        </a>
			    </div>
			    <?php } ?>
		    </div>
	    </div>
	    <div class="divider">
	       <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Divider-Line.png" />
	    </div>
	    <div class="right-content">
	        <div class="entry-title"><h1 ><?=$right_title?></h1></div>
	        <div class="entry-description">
	            <?=$right_content?>
			</div>
			<?php if($title != 'The Overview') { ?>
			<div class="footer">
			    <div class="first">
			        <button id="applynow" class="btn btn-red">APPLY NOW</button>
			    </div>
			    <?php
			
			        twentyfourteen_post_course_nav();
		        ?>
			    <div class="second">
			        <button id="seefaculty" class="btn btn-blue">SEE FACULTY</button>
			    </div>
			    <div class="third">
			        <span>Careers</span>
			        <span>Gallery</span>
			        <span>Contact Us</span>
			    </div>
		    </div>
		    <?php } else { ?>
		    <div class="footer">
			    <div class="first">
			        <button id="prospectus" class="btn btn-red">PROSPECTUS</button>
			    </div>
			    <?php
			
			        twentyfourteen_post_course_nav();
		        ?>
		    </div>
		    <?php } ?>
	    </div>
	    
		
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->

</div>