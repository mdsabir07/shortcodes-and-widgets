<?php
/**
 * Industry RRFOnline functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Industry_RRFOnline
 */

if ( ! function_exists( 'industry_rrfonline_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function industry_rrfonline_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Industry RRFOnline, use a find and replace
		 * to change 'industry-rrfonline' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'industry-rrfonline', get_template_directory() . '/languages' );

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
        add_image_size( 'theme-image-size', 690, 315, true );
		add_image_size( 'feature-image-size', 730, 335, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'industry-rrfonline' ),
			'blog' => esc_html__( 'Blog menu', 'industry-rrfonline' ),
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


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'industry_rrfonline_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function industry_rrfonline_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'industry_rrfonline_content_width', 640 );
}
add_action( 'after_setup_theme', 'industry_rrfonline_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function industry_rrfonline_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'industry-rrfonline' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'industry-rrfonline' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets', 'industry-rrfonline' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add footer widgets here.', 'industry-rrfonline' ),
		'before_widget' => '<div id="%1$s" class="col widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'industry_rrfonline_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function industry_rrfonline_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all' );

	wp_enqueue_style( 'material-css', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '4.1.3', 'all'  );

	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.1.3', 'all'  );

	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '4.1.3', 'all'  );

	wp_enqueue_style( 'carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0', 'all'  );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0', 'all'  );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), 'v1.0.10', 'all' );

	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all'  );
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', 'all'  );

	wp_enqueue_style( 'industry-rrfonline-style', get_stylesheet_uri() );



	// script enqueue
	// wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/js/jquery.js', array(), '4.2.1', true );
	
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '4.2.1', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.2.1', true );

	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '4.2.1', true );

	wp_enqueue_script( 'carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '4.2.1', true );

	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.js', array(), '4.2.1', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), 'v1.0.10', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '4.2.1', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'industry_rrfonline_scripts' );





//Registar custom post
add_action( 'init', 'neuron_custom_post' );
function neuron_custom_post() {
    register_post_type( 'slide1',
        array(
            'labels' => array(
                'name' => esc_html__( 'Home Slider', 'neuron' ),
                'singular_name' => esc_html__( 'Home Slider' )
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
    register_post_type( 'project',
        array(
            'labels' => array(
                'name' => esc_html__( 'Project', 'neuron' ),
                'singular_name' => esc_html__( 'Project' )
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
    register_post_type( 'work',
        array(
            'labels' => array(
                'name' => esc_html__( 'Work', 'neuron' ),
                'singular_name' => esc_html__( 'Work' )
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
    register_post_type( 'more',
        array(
            'labels' => array(
                'name' => esc_html__( 'More projects', 'neuron' ),
                'singular_name' => esc_html__( 'More project' )
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
    register_post_type( 'slide2',
        array(
            'labels' => array(
                'name' => esc_html__( 'Case 4 Slider', 'neuron' ),
                'singular_name' => esc_html__( 'Case 4 Slider' )
            ),
            'supports' => array('thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
    register_post_type( 'slide3',
        array(
            'labels' => array(
                'name' => esc_html__( 'Case 5 Top Slider', 'neuron' ),
                'singular_name' => esc_html__( 'Case 5 Top Slider' )
            ),
            'supports' => array('thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
    register_post_type( 'slide4',
        array(
            'labels' => array(
                'name' => esc_html__( 'Case 5 Center Slider', 'neuron' ),
                'singular_name' => esc_html__( 'Case 5 Center Slider' )
            ),
            'supports' => array('thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true,
        )
    );
}

// Registering case studies custom post
add_action( 'init', 'case_studies_custom_post_type_func' );
function case_studies_custom_post_type_func() {
    //posttypename = case_studies
$labels = array(
'name' => _x( 'Case Studies post', 'brendan' ),
'singular_name' => _x( 'case studies', 'brendan' ),
'add_new' => _x( 'Add New post', 'services' ),
'add_new_item' => _x( 'Add New case-studies post', 'brendan' ),
'edit_item' => _x( 'Edit case-studies post', 'brendan' ),
'new_item' => _x( 'New case studies post', 'brendan' ),
'view_item' => _x( 'View case studies post', 'brendan' ),
'search_items' => _x( 'Search case studies post', 'brendan' ),
'not_found' => _x( 'No case studies post found', 'brendan' ),
'not_found_in_trash' => _x( 'No case studies post found in Trash', 'brendan' ),
'parent_item_colon' => _x( 'Parent case studies post:', 'brendan' ),
'menu_name' => _x( 'Case Studies', 'brendan' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
'description' => 'Hi, this is case studies custom post type.',
'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);
register_post_type( 'case_studies', $args );
}


// Registering Free resources custom post
add_action( 'init', 'resources_custom_post_type_func' );
function resources_custom_post_type_func() {
    //posttypename = resources
$labels = array(
'name' => _x( 'Resources post', 'brendan' ),
'singular_name' => _x( 'resources', 'brendan' ),
'add_new' => _x( 'Add New post', 'services' ),
'add_new_item' => _x( 'Add New resources post', 'brendan' ),
'edit_item' => _x( 'Edit resources post', 'brendan' ),
'new_item' => _x( 'New resources post', 'brendan' ),
'view_item' => _x( 'View resources post', 'brendan' ),
'search_items' => _x( 'Search resources post', 'brendan' ),
'not_found' => _x( 'No resources post found', 'brendan' ),
'not_found_in_trash' => _x( 'No resources post found in Trash', 'brendan' ),
'parent_item_colon' => _x( 'Parent resources post:', 'brendan' ),
'menu_name' => _x( 'Free Resources', 'brendan' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
'description' => 'Hi, this is resources custom post type.',
'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);
register_post_type( 'resources', $args );
}


// Numeric pagination
function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999;
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/theme-metabox-and-option.php';




// Testimonial shortcode
function testimonial_shortcode( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(
        'count'    => '-1',
    ), $atts ) );

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'project', 'orderby' => 'menu_order') );

    $testimonial_markup = '
        <div class="row">';
            
        while($q->have_posts()) : $q->the_post();
            $idd = get_the_ID();
            $image_icon = get_the_post_thumbnail_url($idd, 'full');

            if(get_post_meta($idd, 'theme_project_meta', true)) {
                $slide_meta = get_post_meta($idd, 'theme_project_meta', true);
            } else {
                $slide_meta = array();
            }

            if(array_key_exists('project_url', $slide_meta)){
                $project_url = $slide_meta['project_url'];
            }else{
                $project_url = '';
            }

        $testimonial_markup .= '
            <div class="col-md-6">
            	<div class="single-project singp1">
            		<a href="'.get_page_link($project_url).'" ><img src="'.$image_icon.'">
                        <div class="project_d">
                            <h1>'.get_the_title($idd).'</h1>
                            <p>'.get_the_content($idd).'</p>
                            <button>View case study</button>
                        </div>
                    </a>
            	</div>
            </div>
        ';

        endwhile;

    $testimonial_markup .= '
        </div>
    ';
    wp_reset_query();
    
        
    return $testimonial_markup;

}   
add_shortcode('forms_testimonial', 'testimonial_shortcode');





// Work shortcode
function work_shortcode( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(
        'count'    => '-1',
    ), $atts ) );

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'work', 'orderby' => 'menu_order') );


    $testimonial_markup = '
        <div class="row">';
            
        while($q->have_posts()) : $q->the_post();
            $idd = get_the_ID();
            $image_icon = get_the_post_thumbnail_url($idd, 'full');

            if(get_post_meta($idd, 'theme_work_meta', true)) {
                $slide_meta = get_post_meta($idd, 'theme_work_meta', true);
            } else {
                $slide_meta = array();
            }

            if(array_key_exists('work_url', $slide_meta)){
                $work_url = $slide_meta['work_url'];
            }else{
                $work_url = '';
            }

        $testimonial_markup .= '
            <div class="col-md-4">
            	<div class="single-project singp22">
            		<a href="'.get_page_link($work_url).'" ><img src="'.$image_icon.'">
                        <div class="project_d">
                            <h1>'.get_the_title($idd).'</h1>
                            <p>'.get_the_content($idd).'</p>
                        </div>
                    </a>
                    
            	</div>
            </div>
        ';

        endwhile;

    $testimonial_markup .= '
        </div>
    ';
    wp_reset_query();
    
        
    return $testimonial_markup;

}   
add_shortcode('forms_work', 'work_shortcode');




// More project shortcode
function more_shortcode( $atts, $content = null  ) {
 
    extract( shortcode_atts( array(
        'count'    => '-1',
    ), $atts ) );

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'more', 'orderby' => 'menu_order') );

    $testimonial_markup = '
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 style="margin-bottom: 50px;">More projects</h2>
            </div>
        </div>
        <div class="row">';
            
        while($q->have_posts()) : $q->the_post();
            $idd = get_the_ID();
            $image_icon = get_the_post_thumbnail_url($idd, 'full');

            if(get_post_meta($idd, 'theme_more_project', true)) {
                $slide_meta = get_post_meta($idd, 'theme_more_project', true);
            } else {
                $slide_meta = array();
            }

            if(array_key_exists('more_url', $slide_meta)){
                $more_url = $slide_meta['more_url'];
            }else{
                $more_url = '';
            }

        $testimonial_markup .= '
            <div class="col-md-4">
                <div class="single-project more_project">
                    <a href="'.get_page_link($more_url).'" ><img src="'.$image_icon.'">
                        <div class="project_d">
                            <h1>'.get_the_title($idd).'</h1>
                            <p>'.get_the_content($idd).'</p>
                        </div>
                    </a>

                </div>
            </div>
        ';

        endwhile;

    $testimonial_markup .= '
        </div>
    ';
    wp_reset_query();
    
        
    return $testimonial_markup;

}   
add_shortcode('forms_more', 'more_shortcode');

// Call to action shortcode
function  brendan_cta_theme_shortcode($atts, $content = null) {
    extract(shortcode_atts( array(
        // 'bg_img'    => '',
        'title'     => 'Got a project in mind?',
        'desc'      => 'Ready to take action & bring your business to the next level?',
        'btn_link'  => 'https://shahinwp.com/wordpress-work/bho/',
        'btn_text'  => 'Start your project',
        'lbtn_link' => 'https://shahinwp.com/wordpress-work/bho/',
        'lbtn_text' => 'Or learn how I do it!',
    ), $atts ));

    // $cta_bg = wp_get_attachment_image_src( $bg_img, 'large', 'true' );

    $html = '
    <div class="cta-wrapper cta-bg-theme" style="background-color: #2496C7">
        <div class="container">
            <div class="row">
                <div class="col text-center my-auto">
                    <div class="cta-content">
                        <h2>'.$title.'</h2>
                        '.wpautop( $desc ).'
                        <div class="cta-btn">
                            <a href="'.$btn_link.'" class="boxed-btn">'.$btn_text.'</a>
                            <a href="'.$lbtn_link.'" class="learnmore">'.$lbtn_text.'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'cta', 'brendan_cta_theme_shortcode' );
// End Call to action shortcode


// Post shortcode 
function brendan_posts_theme_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
        'count'         => 3,
        'img_height'    => 224,
    ), $atts ));

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'post') );
    
    $html = '
    <div class="row">';
    while($q->have_posts()) : $q->the_post();
        $post_id = get_the_ID();
        $post_excerpt = get_the_excerpt();

        if(has_post_thumbnail()){
            $posts_img_markup = 'style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'medium')).');height: '.esc_attr( $img_height ).'px"';
        } else {
            $posts_img_markup = '';
        }

        $html .= '
            <div class="col-sm-12">
                <div class="brendan-single-post-block">
                    <a class="sin-post-link" href="'.esc_url(get_permalink($post_id)).'" '.$posts_img_markup.'></a>
                    <div class="post-block-content">
                        <h2><a href="'.esc_url(get_permalink($post_id)).'">'.esc_html(get_the_title($post_id)).'</a></h2>
                        <div class="post-block-excerpt">'.esc_html($post_excerpt).'</div>
                    </div>    
                </div>
            </div>    
        ';
    endwhile;

    $html .= '</div>';
    wp_reset_query();
    return $html; 
}
add_shortcode( 'brendan_posts', 'brendan_posts_theme_shortcode' );
// End post shortcode


// Get free course shortcode
function  brendan_get_free_course_theme_shortcode($atts, $content = null) {
    extract(shortcode_atts( array(
        'title'     => 'Get my 6-part mini course </br>sent to your inbox for FREE!',
    ), $atts ));

    $html = '
    <div class="gfc-wrapper cta-bg gfc-theme">
        <div class="container">
            <div class="row">
                <div class="col text-center my-auto">
                    <div class="gfc-left-content gfc-left-bg"></div>
                </div>
                <div class="col my-auto">
                    <div class="gfc-right-content">
                        <h5>'.$title.'</h5>
                        '.do_shortcode('[contact-form-7 id="1162" title="Get my free course"]').'
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html;
}
add_shortcode( 'get_free_courses', 'brendan_get_free_course_theme_shortcode' );
// End Get free course shortcode