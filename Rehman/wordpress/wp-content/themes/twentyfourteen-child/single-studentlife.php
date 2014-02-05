<?php
$postAry = array();

while ( have_posts() ) : the_post();
    $ary = array();
    
    $title = get_the_title();
    $icon = get_field('icon');
    $content = get_the_content();
    $postid = get_the_ID();
    
    $ary['title'] = $title;
    $ary['icon'] = $icon;
    $ary['content'] = $content;
    $ary['id'] = $postid;
    
    array_push($postAry, $ary);

endwhile;
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
    
    .content{
        display:none;
    }
    
    .content.active {
        display:block;
    }
    
    .item {
        cursor:pointer;
    }
</style>

<div  class="slide">
<img src="<?=$link?>" width="100%" data-position="0,0" data-in="fade" data-delay="0" data-out="fade">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-position="50,80"  data-in="fade" data-delay="500" data-out="fade" >
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
	        <h1 class="entry-title"><?=$category_name?></h1>
			
			<div class="items">
			    <?php
			        foreach ($postAry as $item) {
			            $title = $item['title'];
			            $icon = $item['icon']['url'];
			            $id = $item['id']
			            ?>
			                <div class="item" postid="<?=$id?>">
			                    <img class="icon" src="<?=$icon?>">
			                    </img>
			                    <h1 class="title">
			                        <?=$title?>
			                    </h1>
			                </div>
			            <?php
			        }
			    ?>
		    </div>
	    </div>
	    <div class="divider">
	       <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Divider-Line.png" />
	    </div>
	    <div class="right-content">
	        <div class="contents">
	            <?php
	                $i = 0;
	                foreach ($postAry as $item) {
			            $title = $item['title'];
			            $id = $item['id'];
			            $content = $item['content'];
			            $class = '';
			            if ($i == 0) {
			                $class = 'active';
			                $i++;
			            }
	            ?>
	            <div class="content <?=$class?>" id="post-<?=$id?>">
        	        <div class="entry-title"><h1><?=$title?></h1></div>
        	        <div class="entry-description">
        	           <?=$content?>
        			</div>
    			</div>
    			<?php
	                }
    			?>
			</div>
			<div class="footer">
			  
			    <div class="third">
			        <span>Careers</span>
			        <span>Gallery</span>
			        <span>Contact Us</span>
			    </div>
		    </div>
	    </div>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->

</div>

	        </div><!-- #category_slider-->
		</div><!-- #content -->
	</div><!-- #primary -->
<script type="text/javascript">
    $('.item').click(function(){
        var id = $(this).attr('postid');
        $('.content.active').removeClass('active');
        $('#post-'+id).addClass('active');
    });
</script>