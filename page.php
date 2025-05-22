<?php get_header(); 
the_post(); 
?>

<a href="<?php echo site_url();?>"></a>


<?php
$bg_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>

<section class="about-us" style="background-image: url('<?php echo esc_url($bg_image); ?>');">
    <div class="all-title container">
        <h1><?php the_title(); ?></h1>
    </div>
</section>




<div class="about-flex container">
    <div>
        <?php the_content(); ?>
    </div>
    
    <div class="sidebar-all">
    <?php get_sidebar(); ?>
    </div>

</div>

<?php get_footer(); ?>