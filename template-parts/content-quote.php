<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eden
 */

?>

<article  id="post-<?php the_ID(); ?>" <?php post_class('quote card'); ?>  >
		<div class="post-top">
			<?php 
				
			
			 ?>
		</div>
		<div class="entry-wrap">

			<header class="entry-header">
				<div class="quote-bg">
					<img src=' <?php echo get_template_directory_uri()."/images/quote.png" ?> ' alt="">
				</div>
				<div class="post-tag">
					<span>I Do Quote</span>
				</div>
	

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
			
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'eden' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eden' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php// eden_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>		
</article><!-- #post-## -->
