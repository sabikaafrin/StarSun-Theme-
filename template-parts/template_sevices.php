<?php
/* Template Name: servicepage */
get_header();
?>


<div class="acf-page container">
    <h1><?php the_field('title_text'); ?></h1>
    <p><?php the_field('description_textarea'); ?></p>

    <?php if ($img = get_field('featured_image')): ?>
    <img src="<?php echo esc_url($img); ?>" alt="Image" class="acf-img">
    <?php endif; ?>

    <?php if (get_field('is_active')): ?>
    <div class="acf-box">This profile is active</div>
    <?php endif; ?>

    <p><strong>Skills:</strong> <?php the_field('skills_checkbox'); ?></p>
    <p><strong>Gender:</strong> <?php the_field('gender_radio'); ?></p>
    <p><strong>Country:</strong> <?php the_field('country_select'); ?></p>

    <?php if ($file = get_field('resume_upload')): ?>
    <a href="<?php echo esc_url($file['url']); ?>" download class="acf-btn">Download Resume</a>
    <?php endif; ?>

    <p><strong>Website:</strong> <a href="<?php the_field('website_url'); ?>"
            target="_blank"><?php the_field('website_url'); ?></a></p>
    <p><strong>Birth Date:</strong> <?php the_field('birth_date'); ?></p>
    <p><strong>Meeting Time:</strong> <?php the_field('meeting_time'); ?></p>

    <?php if ($group = get_field('profile_group')): ?>
    <div class="acf-box">
        <h3>Profile Info</h3>
        Name: <?php echo esc_html($group['name']); ?><br>
        Age: <?php echo esc_html($group['age']); ?><br>
        Email: <?php echo esc_html($group['email']); ?>
    </div>
    <?php endif; ?>

    <?php $images = get_field('gallery_images'); if ($images): ?>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="" class="gallery-img">
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php $related = get_field('related_posts'); if ($related): ?>
    <div class="acf-box">
        <h3>Related Posts</h3>
        <ul>
            <?php foreach ($related as $post): setup_postdata($post); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endforeach; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php $post_obj = get_field('featured_post'); if ($post_obj): ?>
    <div class="acf-box">
        <h3>Featured Post</h3>
        <a href="<?php echo get_permalink($post_obj); ?>"><?php echo get_the_title($post_obj); ?></a>
    </div>
    <?php endif; ?>

    <?php if (have_rows('faq_repeater')): ?>
    <div class="faq-wrapper">
        <h2>FAQs</h2>
        <?php while (have_rows('faq_repeater')): the_row(); ?>
        <div class="faq-item">
            <strong>Q:</strong> <?php the_sub_field('question'); ?><br>
            <strong>A:</strong> <?php the_sub_field('answer'); ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <!-- flexible content -->
    <?php if (have_rows('layout_section')): ?>
    <div class="acf-box">
        <?php while (have_rows('layout_section')): the_row(); ?>

        <?php if (get_row_layout() == 'text_block'): ?>
        <p><?php the_sub_field('text'); ?></p>

        <?php elseif (get_row_layout() == 'image_block'): ?>
        <?php $image = get_sub_field('image'); ?>
        <?php if ($image): ?>
        <img src="<?php echo esc_url($image); ?>" alt="" class="acf-img">
        <?php endif; ?>

        <?php elseif (get_row_layout() == 'author_block'): ?>
        <?php
    $author_info = get_sub_field('author_info');
    if ($author_info):
      $id = $author_info['id'] ?? '';
      $bio = $author_info['bio'] ?? '';
    ?>
        <?php if ($id || $bio): ?>
        <div class="author-block">
            <h4>ID: <?php echo esc_html($id); ?></h4>
            <p><?php echo esc_html($bio); ?></p>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>


        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <!-- author group -->
    <?php if ($author_info = get_field('author_info')): ?>
    <div class="acf-box">
        <h2>Author Info for clone</h2>
        <?php if (!empty($author_info['id'])): ?>
        <p><strong>ID:</strong> <?php echo esc_html($author_info['id']); ?></p>
        <?php endif; ?>

        <?php if (!empty($author_info['bio'])): ?>
        <p><strong>Bio:</strong> <?php echo esc_html($author_info['bio']); ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>



</div>


<?php get_footer(); ?>