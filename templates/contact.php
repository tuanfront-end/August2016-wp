<?php
/*
 Template Name: Contact
 */
get_header(); ?>
 
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-wrap"> 

						<header class="entry-header">
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'read more', 'eden' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
							?>

							<?php 
								$id= get_queried_object_id();
								$post = get_post($id); 
								$content = apply_filters('the_content', $post->post_content); 
								echo $content;
							 ?>
						</div><!-- .entry-content -->
						<div class="contact-form">
					        <?php echo do_shortcode('[contact-form-7 id="1310" title="Contact form 1"]'); ?>
						</div>
						
					</div>		
				</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->
 
<?php get_footer(); ?>