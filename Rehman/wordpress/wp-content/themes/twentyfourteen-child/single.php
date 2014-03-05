<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>

<?php
	// Start the Loop.
	
	
	
	get_header();
	get_sidebar();
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/slider/jquery.fractionslider.js"></script>



		
<div id="" class="content-post">
		<div id="content" class="" role="main">
		    <div id="category_slider_1" class="category_slider slider">
		       
<?php
	
	wp_reset_query();
	
	$category = get_the_category();
	
	query_posts('cat=' . $category[0]->cat_ID . '&orderby=id&order=asc');
	
	$category_name = $category[0]->name;
	
	
	if ($category[0]->parent != 0 ) {
	    $category_name = get_cat_name ($category[0]->parent);
	}
	
	$current_post_id = get_the_ID();
	
	if ($category_name !='Home' || $category_name != 'Management') {
		    ##
	}
	
	if ($category_name != 'Student Life') {
	
	//style="background:url('<?=$link>') no-repeat 100%;background-position-x:13.9em;"
	$currentSlide = 0;
	
	$slideNo = 0;
	
	
	while ( have_posts() ) : the_post();
	
	
	    $attachment = get_posts( array(
                		'post_parent'    => $post->ID,
                		'numberposts'    => -1,
                        'post_status'    => 'any',
                		'post_type'      => 'attachment',
                		'post_mime_type' => 'image'
                	) );
                	
                
        
        $link = $attachment[0]->guid;
        
        $class = "";
        
        if ($current_post_id == $post -> ID) {
            $currentSlide = $slideNo;
        }
?>

	
            <?php
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 * get_post_format()
					 */
					get_template_part( 'content', strtolower($category_name));
			$slideNo++;
		 endwhile;
			?>
			   
			</div><!-- #category_slider-->
		</div><!-- #content -->
	</div><!-- #primary -->
	
	<script type="text/javascript">
    	$('.slider').fractionSlider({
    	                autoChange:false, 
    	                controls:true,
    	                currentSlide:<?=$currentSlide?>,
    	           });
    	$('a[rel="play"]').click(function(e){
    	
    	    $('.slider').fractionSlider('stopanimate');
    	    e.preventDefault();
    	})
    </script>


<?php
	} else {
	    get_template_part( 'single-studentlife');
	}
    //get_footer();
?>


