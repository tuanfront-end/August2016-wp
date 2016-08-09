<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eden
 */

?>	
				</div><!-- #content -->
				<!-- </div> #row -->
			</div><!-- #col-md-10 -->
		</div><!-- #row -->
	</div><!-- #container -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row footer-row">
				<div class="col-md-10 footer-wrap">
					<div class="site-info text-center">
						
						<?php
					      global $tp_options;
					    ?>
					 
					    <?php if ( $tp_options['logo-on'] == 1 ) : ?>
					  
				        <div class="logo">
				          <a href=" <?php echo get_stylesheet_directory_uri(); ?> "><img src="<?php echo $tp_options['logo-image']['url']; ?>"></a>
				        </div>

						<?php endif; ?>
						
						<br>
						<div class="footer-menu-area">
							<nav id="site-navigation" class="footer-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Footer Menu', 'eden' ); ?>
								</button>
								<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
							</nav><!-- #site-navigation -->
							<div class="head-searchform">
								<?php  eden_searchform(); ?>
							</div>
						</div>
						<br>
				     	<hr>
						<br>
						<span>
				          	<?php echo $tp_options['copyright-text-1']; ?>
				        </span>
				        <br>
						<hr>
						<br>
						<span>
				          	<?php echo $tp_options['copyright-text-2']; ?>
				        </span>
						<br>
				        <div class="social-menu-area">
							<nav id="social-navigation" class="social-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="social-menu" aria-expanded="false"><?php esc_html_e( 'Social Menu', 'eden' ); ?>
								</button>
								<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'menu-social' ) ); ?>
							</nav><!-- #site-navigation -->
						</div>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
