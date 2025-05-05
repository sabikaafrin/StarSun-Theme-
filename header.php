<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php wp_title();?></title>
    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>

    <header>
        <!-- <div class="container"> -->
            <div class="container top-header">
                <div class="logo">

                    <?php $logoImage=get_header_image() ;?>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo $logoImage;?>" alt="logo">
                    </a>
                </div>


                <!-- search button -->
                <div class="search-btn">
                    <?php get_search_form(); ?>
                </div>


                <div class="contact-info">
                    <a href="tel:8665771221" class="phone">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Symbol.png"
                            alt="Phone Icon">
                        <p>866.577.1221</p>
                    </a>
                    <a href="tel:8665771221" class="call-button">Call RooterMan</a>

                </div>
            </div>
       

        <nav class="main-nav">
            <div class="container">
                <?php
        wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'menu_class'     => '', 
          'container'      => false
        ));
        ?>
            </div>
        </nav>
    </header>