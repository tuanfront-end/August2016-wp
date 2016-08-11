<?php
/*
 Template Name: Archive
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
						<div class="archive-content">
							<div class="archive-left">
								<div class="author">
									<h1>Authors</h1>
									<?php 
										wp_list_authors( $author );
										$author = array(
									    'orderby'       => 'name', 
									    'order'         => 'ASC', 
									    'number'        => null,
									    'optioncount'   => false, 
									    'exclude_admin' => true, 
									    'show_fullname' => false,
									    'hide_empty'    => true,
									    'echo'          => true,
									    'feed'          => '', 
									    'feed_image'    => '',
									    'feed_type'     => '',
									    'style'         => 'list',
									    'html'          => true,
									    'exclude'       => '',
									    'include'       => '' ); 

									 ?>
								</div>

								<div class="category">
								 	<h1>Categories</h1>
									 <?php 
									 wp_list_categories( $args = '' ) {
									    $defaults = array(
									        'child_of'            => 0,
									        'current_category'    => 0,
									        'depth'               => 0,
									        'echo'                => 1,
									        'exclude'             => '',
									        'exclude_tree'        => '',
									        'feed'                => '',
									        'feed_image'          => '',
									        'feed_type'           => '',
									        'hide_empty'          => 1,
									        'hide_title_if_empty' => false,
									        'hierarchical'        => true,
									        'order'               => 'ASC',
									        'orderby'             => 'name',
									        'separator'           => '<br />',
									        'show_count'          => 0,
									        'show_option_all'     => '',
									        'show_option_none'    => __( 'No categories' ),
									        'style'               => 'list',
									       
									        'use_desc_for_title'  => 1,
									    )};
									  ?>
								</div>
							</div>
							 
							<div class="archive-right">
								<div class="latest">
								 	<h1>Latest Posts</h1>
									  <?php $args = array(
										    'numberposts' => 10,
										    'offset' => 0,
										    'category' => 0,
										    'orderby' => 'post_date',
										    'order' => 'DESC',
										    'include' =>'' ,
										    'exclude' => '',
										    'meta_key' => '',
										    'meta_value' =>'',
										    'post_type' => 'post',
										    'post_status' => 'publish, future, pending, private',
										    'suppress_filters' => true );

										    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );

										  foreach( $recent_posts as $recent ){
											echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
											}
										?>
								</div>

								<div class="month">
									<h1>Post By Month</h1>
									<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
								</div>
							</div>
						</div>
						
					</div>		
				</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->
 
<?php get_footer(); ?>