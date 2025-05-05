<?php

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = ['post_type' => get_post_types(['public' => true]),
    's' => get_search_query(),
    'posts_per_page' => 10,
    'paged' => $paged,
];
$query = new WP_Query($args);

if ( $query->found_posts === 1 ) {
    $query->the_post();
    if ( get_post_type() === 'page' ) {
        wp_redirect( get_permalink() );
        exit;
    }
    wp_reset_postdata();
}

?>


<?php get_header(); ?>


<div class="container text">
    <h1>Search Results for: <?php echo get_search_query(); ?></h1>


    <div class="search-results blog-posts">
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

        <section class="post">
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            </div>
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>

            <div class="post-category">
                <?php if ( get_post_type() === 'post' ) : ?>
                <h4>Category Name: <?php the_category(', '); ?></h4>
                <?php else : ?>
                <h4>Page</h4>
                <?php endif; ?>
            </div>

            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>"><button id="blog-btn">Read More</button></a>
        </section>

        <?php endwhile; else : ?>
        <div>
            <p>No results found. Try another search. <?php get_search_form(); ?></p>
        </div>
        <?php endif; ?>

    </div>

    <!-- pagination -->
    <div class="pagination">
        <?php
    echo paginate_links([
        'total' => $query->max_num_pages,
        'prev_text' => __('« Previous'),
        'next_text' => __('Next »'),
    ]);
    ?>
    </div>

</div>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>