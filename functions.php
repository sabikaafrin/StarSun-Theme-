<?php
// Add menus option
function starsun_register_menus() {
    register_nav_menus( array(
        'main-menu'   => __( 'Main Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
    ) );
}

add_action('after_setup_theme', 'starsun_register_menus');




//add owl caroceal css
function starsun_link_css() {
  wp_enqueue_style(
    'owl-carousel', 
    'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'
);

wp_enqueue_style(
    'owl-carousel-theme', 
    'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'
);

//add css
wp_enqueue_style('starsun-style', get_stylesheet_uri());
wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css'); // custom CSS
wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css'); // custom CSS
}
add_action('wp_enqueue_scripts', 'starsun_link_css');


//add slider js
function starsun_enqueue_scripts() {

  wp_enqueue_script(
      'jquery-cdn',
      'https://code.jquery.com/jquery-3.6.0.min.js',
      array(),
      null,
      true
  );

  // Owl Carousel JS 
  wp_enqueue_script(
      'owl-carousel-js',
      'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
      array('jquery-cdn'),
      null,
      true
  );

  //  slider.js file
  wp_enqueue_script(
      'starsun-slider-js',
      get_template_directory_uri() . '/assets/js/slider.js',
      array('jquery-cdn', 'owl-carousel-js'),
      null,
      true
  );
}
add_action('wp_enqueue_scripts', 'starsun_enqueue_scripts');



//add wordpress image , all-page header, title
add_theme_support('post-thumbnails');
add_theme_support('custom-header');
add_theme_support( 'title-tag' );
add_theme_support( 'widgets' );
add_theme_support( 'custom-background' );


// sidebar widget
register_sidebar(
    array(
        'name'=>'Sidebar Location',
        'id'=>'sidebar1'
    )
);

//footer widget
register_sidebar(
    array(
        'name' => 'Footer section1',
        'id' => 'footer1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => 'Footer section2',
        'id' => 'footer2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => 'Footer section3',
        'id' => 'footer3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => 'Footer section4',
        'id' => 'footer4',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => 'Footer section5',
        'id' => 'footer5',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    )
);

//for taxomony
register_sidebar(
    array(
        'name'=>'Taxonomy',
        'id'=>'category'
    )
);

//custom post
function register_portfolio() {
    $labels = array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Portfolio',
    'edit_item' => 'Edit Portfolio',
    'new_item' => 'New Portfolio',
    'view_item' => 'View Portfolio',
    'search_items' => 'Search Portfolios',
    'not_found' => 'No portfolios found',
    'menu_name' => 'Portfolio',
    );
    
    $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-portfolio',
    'exclude_from_search' => true,
    'menu_position' => 5,
    'hierarchical' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'portfolio'),
    'supports' => array('title', 'thumbnail', 'editor'),
    'show_in_rest' => true, 
    );
    
    register_post_type('portfolio', $args);
    }
    add_action('init', 'register_portfolio');


// add custom post taxonomy
    // function register_portfolio_taxonomy() {
       
    //     $args = array(
    //         'labels'                     => $labels,
    //         'hierarchical'               => true,  
    //         'public'                     => true,
    //         'show_ui'                    => true,
    //         'show_admin_column'          => true,
    //         'show_in_nav_menus'          => true,
    //         'show_tagcloud'              => true,
    //         'query_var'                  => true,
    //         'show_in_rest'               => true,
    //         'rewrite'                    => array('slug' => 'portfolio-category', 'with_front' => false),
    //     );
        
    //     register_taxonomy('portfolio_category', 'portfolio', $args);
        
    // }
    
    // add_action('init', 'register_portfolio_taxonomy');


// Register Portfolio Category Taxonomy
function portfolio_category_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Portfolio Categories', 'text_domain' ),
		'all_items'                  => __( 'All Portfolio Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Portfolio Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Portfolio Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Portfolio Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Portfolio Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Portfolio Category', 'text_domain' ),
		'update_item'                => __( 'Update Portfolio Category', 'text_domain' ),
		'view_item'                  => __( 'View Portfolio Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Portfolio Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Portfolio Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Portfolio Categories', 'text_domain' ),
		'popular_items'              => __( 'Popular Portfolio Categories', 'text_domain' ),
		'search_items'               => __( 'Search Portfolio Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Portfolio Categories', 'text_domain' ),
		'items_list'                 => __( 'Portfolio Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Portfolio Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => true,
		'show_in_rest'               => true,
		'rewrite'                    => array('slug' => 'portfolio-category', 'with_front' => false),
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}
add_action( 'init', 'portfolio_category_taxonomy', 0 );

function query_post_type($query){
    if( is_tax('portfolio_category') && $query->is_main_query() ) {
        $query->set('post_type', 'portfolio');
    }
    return $query;
}
add_filter("pre_get_posts", 'query_post_type');




// Exclude only specific tags from Blog page
function exclude_tags_from_blog($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $exclude_tags = array(
            get_term_by('slug', 'article1', 'post_tag')->term_id, 
        );

        $query->set('tag__not_in', $exclude_tags);
    }
}
add_action('pre_get_posts', 'exclude_tags_from_blog');


// page serial


function custom_ordered_posts($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'meta_key' => 'order_number',  
            'orderby' => 'meta_value_num',  
            'order' => 'ASC',  
        );

        $ordered_query = new WP_Query($args);
        $query = $ordered_query;
    }
}
add_action('pre_get_posts', 'custom_ordered_posts');



// Enable category support for 'page' post type
function add_category_to_pages() {
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_category_to_pages');


// access author in screen
add_post_type_support( 'post', 'author' );



// article page sidebar
function register_article_sidebar() {
    register_sidebar(array(
        'name'          => 'Article Page Sidebar',
        'id'            => 'article_sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'register_article_sidebar');


?>