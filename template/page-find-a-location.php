<?php
/* Template Name: Find A Location */
get_header();
?>
<main class="find-location-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="location-content">
                <?php the_content(); ?> <br><br><br>

                <div class="acf-fields">
                    <p><strong>Name:</strong> <?php echo esc_html(get_field('name')); ?></p>
                    <p><strong>ID:</strong> <?php echo esc_html(get_field('id')); ?></p>
                    <p><strong>Password:</strong> <?php echo esc_html(get_field('password')); ?></p>
                    <p><strong>Email:</strong> <?php echo esc_html(get_field('email')); ?></p>

                    <p><strong>Image:</strong><br>
                        <?php
                        $image = get_field('image');
                        if ($image) {
                            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" style="max-width:200px;" />';
                        }
                        ?>
                    </p>

                    <p><strong>Date:</strong> <?php echo esc_html(get_field('date')); ?></p>

                    <p><strong>My Files:</strong>
                        <?php
                        $file = get_field('my_files');
                        if ($file) {
                            echo '<a href="' . esc_url($file['url']) . '" target="_blank">' . esc_html($file['filename']) . '</a>';
                        }
                        ?>
                    </p>

                    <p><strong>Gallery:</strong><br>
                        <?php
                        $gallery = get_field('gallery');
                        if ($gallery) {
                            foreach ($gallery as $img) {
                                echo '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($img['alt']) . '" style="max-width:100px; margin:5px;" />';
                            }
                        }
                        ?>
                    </p>

                    <p><strong>Favourite color:</strong> <?php echo esc_html(get_field('favourite_color')); ?></p>

                    <p><strong>Comment:</strong><?php echo nl2br(esc_html(get_field('comment'))); ?></p>

                    <p><strong>Programming Language(s):</strong>
                        <?php
                        $langs = get_field('programming_language');
                        if ($langs && is_array($langs)) {
                            echo implode(', ', array_map('esc_html', $langs));
                        }
                        ?>
                    </p>

                    <p><strong>Gender:</strong> <?php echo esc_html(get_field('gender')); ?></p>

                    <p><strong>Address (Google Map):</strong><br>
                        <?php
                        $location = get_field('address');
                        if ($location) {
                            echo esc_html($location['address']);
                            echo '<div class="acf-map" style="height:300px;margin-top:10px;">';
                            echo '<div class="marker" data-lat="' . esc_attr($location['lat']) . '" data-lng="' . esc_attr($location['lng']) . '"></div>';
                            echo '</div>';
                        }
                        ?>
                    </p>

                    <p><strong>Page:</strong>
                        <?php
                        $page = get_field('page');
                        if ($page) {
                            echo '<a href="' . esc_url($page) . '" target="_blank">' . esc_html($page) . '</a>';
                        }
                        ?>
                    </p>

                    <p><strong>Go-Link:</strong>
                        <?php
                        $link = get_field('go-link');
                        if ($link) {
                            echo '<a href="' . esc_url($link['url']) . '" target="' . esc_attr($link['target']) . '">' . esc_html($link['title']) . '</a>';
                        }
                        ?>
                    </p>
                </div>
            </div>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
