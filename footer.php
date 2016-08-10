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
						
					      <?php footer_logo(); ?>
						<br>
						<div class="footer-menu-area">
							<div id="site-navigation" class="footer-navigation" role="navigation">
								
								<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
							</div><!-- #site-navigation -->
							<div class="head-searchform">
								<?php  
									footer_search();
								?>
							</div>
						</div>
						<br>
				     	<hr>
						<br>
						<span>
				          	<?php footer_text_1(); ?>
				        </span>
				        <br>
						<hr>
						<br>
						<span>
				          	<?php footer_text_2(); ?>
				        </span>
						<br>
				        <div class="social-menu-area">
							<div id="social-navigation" class="social-navigation" role="navigation">
						
								<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'menu-social' ) ); ?>
							</div><!-- #site-navigation -->
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
