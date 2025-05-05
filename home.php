<?php get_header(); ?>

<div class="blog-posts container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   
        <section class="post">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <h2 ><?php the_title(); ?></h2>

            <div class="post-category">
               <h4>Category Name: <?php the_category(', '); ?> </h4>
            </div>

            <p><?php the_excerpt(); ?></p> 
            <a href="<?php the_permalink(); ?>"><button id="blog-btn">Read More</button></a>
        </section>

        

    <?php endwhile; else : ?>
        <p>No posts found.</p>
    <?php endif; ?>

    
</div>
<div class="pagination">
            <?php
            echo paginate_links([
                'prev_text' => __('« Previous'),
                'next_text' => __('Next »'),
            ]);
            ?>
        </div>

<?php get_footer(); ?>
