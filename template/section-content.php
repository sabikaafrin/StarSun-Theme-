<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div><?php the_content(); ?></div>
    <?php endwhile; ?>

   

    <?php else : ?>
    <p>No posts found.</p>
<?php endif; ?>

