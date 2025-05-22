<?php get_header(); ?>
<div class="container single-post">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>

    <h1><?php the_title(); ?></h1>


    <div class="Address">
        <a href="<?php echo home_url(); ?>">Home</a> &raquo;
        <a href="<?php echo site_url('/article'); ?>">Article</a> &raquo;
        <?php
    $categories = get_the_category();
    if (!empty($categories)) {
        $first_cat = $categories[0];
        echo '<a href="' . esc_url(get_category_link($first_cat->term_id)) . '">' . esc_html($first_cat->name) . '</a> &raquo; ';
    }
    ?>
        <span><?php the_title(); ?></span>
    </div>



    <p class="post-meta post-author">
        <?php
    $author_email = get_the_author_meta('user_email');
    $author_avatar = get_avatar_url($author_email, ['size' => 40]);
    $author_name = get_the_author();
    ?>
        <img src="<?php echo esc_url($author_avatar); ?>" alt="author profile" class="profile">
        <span><?php echo esc_html($author_name); ?> | </span>
        <span><?php the_date(); ?></span>
    </p>

    <?php if (has_post_thumbnail()) : ?>
    <div class="single-img">
        <?php the_post_thumbnail(); ?>


        <!-- sidebar -->
        <div class="sidearticle">

            <aside class="article-widget-sidebar">
                <h3 class="widget-title">Categories</h3>
                <ul>
                    <?php
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tag' => 'article1',
        );
        $cat_query = new WP_Query($args);
        $category_ids = [];

        if ($cat_query->have_posts()) {
            while ($cat_query->have_posts()) {
                $cat_query->the_post();
                foreach ((array) get_the_category() as $cat) {
                    $category_ids[] = $cat->term_id;
                }
            }
            wp_reset_postdata();
        }

        $category_ids = array_unique($category_ids);
        if (!empty($category_ids)) {
            foreach ($category_ids as $cat_id) {
                $category = get_category($cat_id);
                echo '<li><a href="' . esc_url(add_query_arg('article-category', $category->slug, get_permalink())) . '">' . esc_html($category->name) . '</a></li>';
            }
        } else {
            echo '<li>No categories found</li>';
        }
        ?>
                </ul>
            </aside>
        </div>
        <?php endif; ?>
    </div>

    <div class="post-content">
        <?php the_content(); ?>
    </div>



    <?php
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>


</div>






<?php get_footer(); ?>