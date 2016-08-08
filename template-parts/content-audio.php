<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eden
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-top eden_audio">
			<?php 
				$tp_country = get_post_meta( $post->ID, 'eden_audio', true );
				if( $tp_country ) { // kiểm tra xem nó có dữ liệu hay không
	                echo $tp_country;
	            }
			 ?>
		</div>
		<div class="entry-wrap">

			<header class="entry-header">
				<div class="post-tag ">
					<span>I Do Listen</span>
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
				<?php eden_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>		
</article><!-- #post-## -->
