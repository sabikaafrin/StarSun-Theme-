<?php get_header(); ?>
<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>

    <h1><?php the_title(); ?></h1>
    <div class="post-content">
        <?php the_content(); ?> <br>
    </div>
    <?php if (has_post_thumbnail()) : ?>
    <div class="post-thumbnail">
        <?php the_post_thumbnail('large'); ?>
    </div>
    <?php endif; ?>


    <!-- name -->
    <p><strong>Full Name:</strong> <?php the_field('full_name'); ?></p>
    <!-- age -->
    <p><strong>Age:</strong> <?php the_field('age'); ?></p>
    <!-- password -->
    <p><strong>Password:</strong> <?php echo esc_html(get_field('password')); ?></p>
    <!-- email -->
    <p><strong>Email:</strong> <?php echo esc_html(get_field('email')); ?></p>

    <!-- image -->
    <p><strong>Image:</strong><br>
        <?php
     $image = get_field('image');
        if ($image) {
            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" style="max-width:200px;" />';
        }
    ?>
    </p>
    <!-- link -->
    <p><strong>Portfolio:</strong> <a
            href="<?php the_field('portfilio_link'); ?>"><?php the_field('portfilio_link'); ?></a></p>
    <!-- comment -->
    <p><strong>Comment:</strong> <?php the_field('comment'); ?></p>
    <!-- date -->
    <p><strong>Date:</strong> <?php echo esc_html(get_field('date')); ?></p>
    <!-- file -->
    <p><strong>My Files:</strong>
        <?php
        $file = get_field('my_files');
            if ($file) {
             echo '<a href="' . esc_url($file['url']) . '" target="_blank">' . esc_html($file['filename']) . '</a>';
                 }
        ?></p>

    <!-- profile pic -->
    <p><strong>Profile:</strong></p>
    <?php 
    $image = get_field('profile_picture');
    if( $image ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

    <!-- gallery -->
    <h4>Gallery:</h4>
    <div class="gallery">
        <?php 
    $gallery = get_field('gallery');
    if( $gallery ): 
        foreach( $gallery as $img ): ?>
        <img src="<?php echo esc_url($img['sizes']['medium']); ?>" />
        <?php endforeach; endif; ?>
    </div>

    <!-- button -->
    <?php
        $status = get_field('click_here');
        echo $status ? "<p><strong>Status:</strong> " . esc_html($status) . "</p>" : "<p>No status selected.</p>";
    ?>

    <!-- true -->
    <?php
      $show = get_field('agree');

      if( $show ):
        echo '<p>This section is visible.</p>';
      else:
        echo '<p>This section is hidden.</p>';
      endif;
    ?><br>

    <!-- oEmbed-->
    <?php if ($video = get_field('featured_video')): ?>
    <div class="video-wrapper">
        <?php echo $video; ?>
    </div>
    <?php endif; ?>

<!--wysiwyg Editor-->
    <?php if ($content = get_field('rich_text_content')): ?>
    <div class="wysiwyg-content">
        <?php echo $content; ?>
    </div>
<?php endif; ?> <br>

    <!-- relationship -->
    <h2><u>Relationship</u></h2>
    <?php
$related_portfolios = get_field('our_information');

if( $related_portfolios ): ?>
    <div class="related-portfolio">
        <h2>Related Portfolio</h2>
        <ul>
            <?php foreach( $related_portfolios as $post ): 
                setup_postdata( $post ); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>


    <!-- for post object -->
    <?php
$related_page = get_field('post_object');
if( $related_page ):
?>
    <a href="<?php echo get_permalink($related_page->ID); ?>">
        <?php echo get_the_title($related_page->ID); ?>
    </a>
    <?php endif; ?>

    <br><br>
    <!-- group -->
    <h4>Group:</h4>
    <?php
$group = get_field('personal_group');

if ($group && !empty($group['show_personal_info'])): ?>
    <p><strong>Address:</strong> <?php echo esc_html($group['address']); ?></p>
    <p><strong>Age:</strong> <?php echo esc_html($group['age']); ?></p>
    <?php endif; ?>



    <br><br>

    <!-- repeater -->
    <h2><u>Repeater</u></h2>
    <?php if( have_rows('classmate') ): ?>
    <div class="classmate-wrapper">
        <?php while( have_rows('classmate') ): the_row(); 
            $name = get_sub_field('name'); 
            $roll = get_sub_field('roll'); 
            $future_plan = get_sub_field('future_plan');
            $social_link = get_sub_field('social-link');
        ?>
        <div class="classmate">
            <p><strong>Name:</strong> <?php echo esc_html($name); ?></p>
            <p><strong>Roll:</strong> <?php echo esc_html($roll); ?></p>

            <p><strong>Future Plan:</strong> <?php echo esc_html($future_plan); ?></p>

            <p><strong>Social Link:</strong><?php if( $social_link ): ?>
                <a href="<?php echo esc_url($social_link['url']); ?>"
                    target="<?php echo esc_attr($social_link['target']); ?>">
                    <?php echo esc_html($social_link['title']); ?>
                </a>
            </p><br><br>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php else: ?>
    <p>No classmate data found.</p>
    <?php endif; ?>


    <!-- flexible content -->
    <h2><u>Flexible Content</u></h2>
    <?php if( have_rows('content') ): ?>
    <div class="content-flexible">
        <?php while( have_rows('content') ): the_row(); ?>

        <?php if( get_row_layout() == 'columns' ): ?>

        <?php if( have_rows('column1_items') ): ?>
        <?php while( have_rows('column1_items') ): the_row(); 
                        $title = get_sub_field('title');
                        $submit_date = get_sub_field('submit_date');
                        $contribution = get_sub_field('contribution');
                    ?>
        <div class="column1-item">
            <p><strong>Title:</strong> <?php echo esc_html($title); ?></p>
            <p><strong>Date:</strong> <?php echo esc_html($submit_date); ?></p>
            <p><strong>Contribution:</strong> <?php echo esc_html($contribution); ?></p>
            <br><br>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>No column1 items found.</p>
        <?php endif; ?>

        <h5>All Info</h5><br>
        <?php elseif( get_row_layout() == 'all_information' ): ?>

        <?php if( have_rows('informations') ): ?>
        <?php while( have_rows('informations') ): the_row(); 
                        $image = get_sub_field('image');
                        $salary = get_sub_field('salary');
                    ?>
        <div class="info">
            <?php if ($image): ?>
            <p><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                    style="max-width:150px;" /></p>
            <?php endif; ?>
            <p><strong>Salary:</strong> <?php echo esc_html($salary); ?></p>
            <br><br>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>No information items found.</p>
        <?php endif; ?>

        <?php endif; ?>

        <?php endwhile; ?>
    </div>
    <?php else: ?>
    <p>No flexible content found.</p>
    <?php endif; ?>



    <?php endwhile; ?>



</div>


<?php get_footer(); ?>