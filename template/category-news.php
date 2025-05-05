<?php get_header(); ?>

<div class="news-category container">

    <h2>This is category-news.php</h2>

    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="news-post">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <p><?php the_excerpt(); ?></p>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
    <p>No news posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>