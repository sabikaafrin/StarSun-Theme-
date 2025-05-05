<?php
/* Template Name: Portfolio Page */
get_header(); 
?>

<h1 class="portfolio-title">Our Portfolio</h1>
<div class="portfolio-archive container">

<!-- pagination setting -->
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 3, 
    'paged' => $paged,
);

$portfolio_query = new WP_Query($args);

if ($portfolio_query->have_posts()) :
    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
?>
        <div class="portfolio-item">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="portfolio-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <h2 class="portfolio-title"><?php the_title(); ?></h2>

            <!-- Display Taxonomy -->
            <div class="post-category">
                <h4>Category Name: 
                    <?php 
                    $terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        foreach ( $terms as $term ) {
                            echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> ';
                        }
                    }
                    ?>
                </h4>
            </div>

            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="port-btn-wrapper">
                <button id="port-btn">Read More</button>
            </a>
        </div>

<?php
    endwhile;
    ?>

    
<?php
    wp_reset_postdata();
else :
    echo '<p>No portfolio items found.</p>';
endif;
?>

</div>

<!-- pagination -->
<div class="pagination">
        <?php
        echo paginate_links([
            'total' => $portfolio_query->max_num_pages,
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
        ]);
        ?>
    </div>


<?php get_footer(); ?>
