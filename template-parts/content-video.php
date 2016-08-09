<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eden
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('video'); ?>>
		<div class="post-top eden-video-tag">
			<?php 
				$tp_country = get_post_meta( $post->ID, 'eden_tag_post', true );
				if( $tp_country ) { // kiểm tra xem nó có dữ liệu hay không
	                echo $tp_country;
	            }
			 ?>
		</div>
		<div class="entry-wrap">

			<header class="entry-header">
				<div class="post-tag">
					<span>I Do Whatch</span>
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
				<footer class="entry-footer">
					<?php eden_entry_footer(); ?>
				</footer><!-- .entry-footer -->

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php
					// the content here
				?>
			</div><!-- .entry-content -->

			
		</div>		
</article><!-- #post-## -->
