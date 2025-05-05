<?php get_header(); ?>

<h1>Our Portfolio</h1>
<h1>Archive-portfolio.php page</h1>

<div class="portfolio-items">



    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="portfolio-item">
            <?php the_post_thumbnail(); ?>
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="read-more">View All</a>
        </div>


    <?php endwhile; else : ?>
        <p>No portfolio items found.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
