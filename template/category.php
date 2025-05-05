<?php get_header(); ?>

<div class="category-posts container">
    <h1><?php single_cat_title(); ?></h1>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found in this category.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
