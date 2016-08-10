<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eden
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

		<div class="entry-wrap">

			<header class="entry-header">
				<div class="post-tag">
					<span>I Do Link</span>
				</div>
				<?php 
				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php eden_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
 
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<hr>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					
					the_excerpt();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eden' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php eden_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>		
</article><!-- #post-## -->
