<?php
/* Template Name: Article Page */
get_header();
?>

<div class="article-page">
    <h1 id="article" class="container"><?php the_title(); ?></h1>

    <!-- Search Box -->
    <div class="search-btn position">
        <form method="get" action="">
            <input type="text" name="search"
                value="<?php echo isset($_GET['search']) ? esc_attr($_GET['search']) : ''; ?>"
                placeholder="Search articles...">
            <input type="submit" value="Search" id="article-src">
            <?php
            if (isset($_GET['article-category'])) {
                echo '<input type="hidden" name="article-category" value="' . esc_attr($_GET['article-category']) . '">';
            }
            ?>
        </form>
    </div>

    <!-- Category Menu -->
    <div class="post-categories">
        <ul class="category-nav">
            <li><a href="<?php echo get_permalink(); ?>">All</a></li>
            <?php
            // collect all category IDs from article1 tagged posts
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'tag' => 'article1',
            );
            $cat_query = new WP_Query($args);
            $category_ids = array();

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
            if (!empty($category_ids)) :
                foreach ($category_ids as $cat_id) :
                    $category = get_category($cat_id);
            ?>
            <li>
                <a href="<?php echo esc_url(add_query_arg('article-category', $category->slug, get_permalink())); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            </li>
            <?php endforeach; else : ?>
            <li>No categories found from posts</li>
            <?php endif; ?>

        </ul>
    </div>

    <!-- Article Query -->
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $selected_category_slug = isset($_GET['article-category']) ? sanitize_text_field($_GET['article-category']) : '';
    $search_term = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'tag' => 'article1',
        'meta_key' => 'order_number',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'paged' => $paged,
    );

    if (!empty($selected_category_slug)) {
        $args['category_name'] = $selected_category_slug;
    }

    if (!empty($search_term)) {
        $args['s'] = $search_term;
    }

    $article_query = new WP_Query($args);

    if ($article_query->have_posts()) :
        $first_post_displayed = false;

        while ($article_query->have_posts()) : $article_query->the_post();
            if (!$first_post_displayed) :
    ?>
    <section class="first-post container">
        <div class="article-category ">
            <h2 id="blog-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
        </div>
        <div class="article-image ">
            <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <div class="blog-posts container">
        <?php
                $first_post_displayed = true;
                continue;
            endif;
    ?>
        <section class="normal-post">
            <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
            <?php endif; ?>
            <div class="article-category2">
                <p id="cate"><?php the_category(', '); ?></p>
                <p class="post-date"><?php echo get_the_date(); ?></p>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
            
            <div class="post-author">
                <?php
                    $author_email = get_the_author_meta('user_email');
                    $author_avatar = get_avatar_url($author_email, ['size' => 80]);
                    $author_name = get_the_author();
                    ?>
                <img src="<?php echo esc_url($author_avatar); ?>" alt="profile" class="profile">
                <?php echo esc_html($author_name); ?>
            </div>
        </section>
        <?php
        endwhile;
        echo '</div>';
    else :
        echo '<p class="container">No articles found.</p>';
    endif;

    
    wp_reset_postdata();
    ?>



        <!-- Pagination -->
        <div class="pagination">
            <?php
        echo paginate_links([
            'total'   => $article_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'mid_size' => 2,
            'end_size' => 1,
            'prev_next' => false,
        ]);
        ?>
        </div>
    </div>

    <?php get_footer(); ?>