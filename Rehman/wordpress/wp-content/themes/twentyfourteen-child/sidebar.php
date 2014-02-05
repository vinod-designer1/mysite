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
<div id="sidemenu">
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/home" rel="home">
        <img src="<?php bloginfo('template_directory'); ?>/images/sprites/KMMC-Sprite_Logo-Small-(sitemap).png" />
    </a></h1>
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( ! empty ( $description ) ) :
	?>
	<h2 class="site-description"></h2>
	<?php endif; ?>

	<?php  if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
	<?php endif; ?>

	
</div><!-- #secondary -->
