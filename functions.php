<?php
/**
 * eden functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( 'eden_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eden_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eden, use a find and replace
	 * to change 'eden' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'eden', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	// Add Post format for THeme
	add_theme_support('post-formats', array(
		'link',
		'aside',
		'audio',
		'gallery',
		'video',
		'image',
		'chat',
		'status',
		'quote'
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'eden' ),
	) );

	register_nav_menus( array(
		'footer' => esc_html__( 'Footer', 'eden' ),
	) );

	register_nav_menus( array(
		'social' => esc_html__( 'Social', 'eden' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'eden_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'eden_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eden_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eden_content_width', 640 );
}
add_action( 'after_setup_theme', 'eden_content_width', 0 );

 // Replaces the excerpt "Read More" text by a link
function eden_excerpt_more($more) {
       global $post;
	return '<br><br><a class="moretag" href="'. get_permalink($post->ID) . '"> Read more</a>';
}
add_filter('excerpt_more', 'eden_excerpt_more');
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eden_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eden' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'eden' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eden_widgets_init' );


//Insert FlexSlider 2 plugin
function slider() {
        wp_enqueue_script( 'slider', get_stylesheet_directory_uri() . '/slider/owl.carousel.js', array('jquery') );
        wp_enqueue_script( 'slider-option', get_stylesheet_directory_uri() . '/slider/slider-option.js', array('jquery') );

        // Material Design JS
        wp_enqueue_script( 'material-option', get_stylesheet_directory_uri() . '/js/materialize.js', array('jquery') );
        wp_enqueue_style( 'material-css', get_stylesheet_directory_uri() . '/less/materialize.css');


        wp_enqueue_style( 'slider-css', get_stylesheet_directory_uri() . '/slider/owl.theme.css');
        wp_enqueue_style( 'slider-css2', get_stylesheet_directory_uri() . '/slider/owl.carousel.css');
}
add_action( 'wp_enqueue_scripts', 'slider' );
/**
 * Enqueue scripts and styles.
 */
function eden_scripts() {
	wp_enqueue_style( 'eden-style', get_stylesheet_uri() );

	wp_enqueue_script( 'eden-navigation', get_template_directory_uri() . '/js/my-script.js', array(), '20151215', true );
	wp_enqueue_script( 'eden-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'eden-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eden_scripts' );


/**
 *  eden_searchform()   : : Form Search
 */
function eden_searchform(){ ?>
	<div class="my-searchform">
		<span class="icon-search-click "><i class="fa fa-search" aria-hidden="true"></i></span>
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' );?>">
		    <label>
		        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		        <input type="search" class="search-field"
		            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
		            value="<?php echo get_search_query() ?>" name="s"
		            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		    </label>
		    
		    <input type="submit" class="search-submit"
		        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
		</form>
	</div>
<?php
}

function eden_searchform_footer(){ ?>
	<div class="my-searchform-footer">
		<span class="icon-search-click "><i class="fa fa-search" aria-hidden="true"></i></span>
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' );?>">
		    <label>
		        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		        <input type="search" class="search-field"
		            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
		            value="<?php echo get_search_query() ?>" name="s"
		            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		    </label>
		    
		    <input type="submit" class="search-submit"
		        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
		</form>
	</div>
<?php
}


function the_posts_navigation2( $args = array() ) {
     $navigation = '';
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
      	 $args = wp_parse_args( $args, array(
      	 	'mid_size'           => 1,
            'prev_text'          => _x( 'Previous', 'previous post',false ),
            'next_text'          => _x( 'Next', 'next post' ,false),
            'screen_reader_text' => __( 'Posts navigation' ),
	    ) );
      	  // Make sure we get a string back. Plain is the next best thing.
        if ( isset( $args['type'] ) && 'array' == $args['type'] ) {
                $args['type'] = 'plain';
        }

        // Set up paginated links.
        $links = paginate_links( $args );

   		if ( $links ) {
                $navigation = _navigation_markup( $links, 'pagination', $args['screen_reader_text'] );
        }
	}
	
	    return $navigation;
	
}

function header_search(){
	 global $tp_options;
	 if ($tp_options['header-search-on'] == 1) {
	 	return eden_searchform();
	 } 
}
function footer_search(){
	 global $tp_options;
	 if ($tp_options['footer-search-on'] == 1) {
	 	return eden_searchform_footer();
	 } 
}

function footer_logo(){
	global $tp_options;
					    		 
	    if ( $tp_options['logo-on'] == 1 ) : ?>
	  
        <div class="logo">
          <a href=" <?php echo get_stylesheet_directory_uri(); ?> "><img src="<?php echo $tp_options['logo-image']['url']; ?>"></a>
        </div>

		<?php endif; 
}
function footer_text_1(){
	global $tp_options;
	echo $tp_options['copyright-text-1'];
}
function footer_text_2(){
	global $tp_options;
	echo $tp_options['copyright-text-2'];
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Require theme option in Core folder.
 */
require get_template_directory() . '/core/init.php';
