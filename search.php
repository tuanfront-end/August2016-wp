<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * 
 * @package eden
 */

get_header(); ?>

	<div id="primary" class="content-area">
	<article>
		<div class="entry-wrap search-rs">
			<h1 class="page-title"><?php printf( esc_html__( 'Search results for %1$s   ', 'eden' ), '<strong><i class="fa fa-angle-double-left" aria-hidden="true"></i>' . get_search_query() . '<i class="fa fa-angle-double-right" aria-hidden="true"></i></strong>' );
			 ?>
			 </h1>
			<?php 
				$search_query = new WP_Query('s='.$s.'&showpost=-1');
				$search_keyword = _wp_specialchars($s,1);
				$search_count= $search_query->found_posts;
				
				printf(__('<h4>%1$s  Item Found </h4>','eden'),$search_count);
			 ?>
			
		</div>
	</article>

		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			?>
			 <div class="page-num">
			 	<?php echo the_posts_navigation2(); ?>
			 </div>
			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();