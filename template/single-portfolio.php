<?php
get_header();
?>
<h1>single-portfolio.php page</h1>
<div class="portfolio-single">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title(); ?></h1>

                <div class="portfolio-thumbnail">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </div>

                <div class="portfolio-content">
                    <?php the_content(); ?>
                </div>

            <?php endwhile;
        else :
            echo '<p>No portfolio found.</p>';
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
?>
