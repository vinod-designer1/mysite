<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 // bloginfo( 'name' );
 // echo esc_html( $description );
?>
<?php ?>
<script src="//code.jquery.com/jquery-latest.min.js"></script>


<div id="sidemenu" class="sidebar-pulled" style="left:-182px;">
    
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/home" rel="home">
        <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Logo-Large.png" />
    </a></h1>
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( ! empty ( $description ) ) :
	?>
	<h2 class="site-description"></h2>
	<?php endif; ?>

	<?php  if ( has_nav_menu( 'secondary' ) ) : ?>
	
	<nav class="navigation site-navigation secondary-navigation" role="navigation" >
	    <?php
	            $menu_name = 'secondary';
	            
	        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            
            	$menu_items = wp_get_nav_menu_items($menu->term_id);
            
            	$menu_list = '<ul id="menu-' . $menu_name . '">';
                
                $i = 0;
            	foreach ( (array) $menu_items as $key => $menu_item ) {
            	    $title = $menu_item->title;
            	    $url = $menu_item->url;
            	    $url = '/404';
            	    $class = '';
            	    
            	    if ($i == 0) {
            	       // $class = 'class="current"';
            	    }
            	    
            	    $style='';
            	    
            	    if ($title == 'Apply Now') {
            	        $style = "color:red";
            	    }
            	    
            	    $menu_list .= '<li ' .$class. '><a style="' .$style. '" href="' . $url . '">' . $title . '</a></li>';
            	    
            	    $i++;
            	}
            	$menu_list .= '</ul>';
            } else {
            	$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
            }
	    ?>
		<?php //wp_nav_menu( array( 'theme_location' => 'secondary',) ); 
            echo $menu_list;
		?>
	</nav>
	<?php endif; ?>
	<div style="position:absolute;bottom:45px">
	    <img src="<?php bloginfo('template_directory'); ?>/images/sprites/Middlesex-Logo-to-use.png" />
	</div>
</div><!-- #secondary -->

<script>
    $("#sidemenu").hover(function(e){
       // e.preventDefault();
        
       // if ($( "#sidemenu" ).hasClass('sidebar-pulled')) {
           
            $('#sidemenu').removeClass('sidebar-pulled').addClass('sidebar-pushed');
            $( "#sidemenu" ).animate({
            left: "+=182"
            }, 1000, function() {
                
            });
        //}
         
    },
    function(e){
        //e.preventDefault();
        
        //if ($( "#sidemenu" ).hasClass('sidebar-pushed')) {
           
            $('#sidemenu').removeClass('sidebar-pushed').addClass('sidebar-pulled');
            $( "#sidemenu" ).animate({
            left: "-=182"
            }, 1000, function() {
                
            });
        //}
         
    }
    );
    
    
    
</script>
