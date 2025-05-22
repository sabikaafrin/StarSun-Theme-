<?php get_header(); ?>
<?php get_template_part('template/section','content');?>



<main>
    <section class="hero "
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/background.png');">
        <div class="banner container">
            <div>
                <h1>Your Local Plumbing and Drain Cleaning Experts</h1>
                <p>With more than 50 years of experience, and millions of satisfied customers, RooterMan remains
                    the
                    number
                    one choice for professional plumbing, sewer, and drain cleaning services.</p>
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/car.png" alt="car">
            </div>

            <div class="sidebar-home">
                <?php get_sidebar();?>
            </div>

        </div>

    </section>

    <section class="search-section">
        <div class="container">
            <div class="search-left">
                <h2>Find Your Local RooterMan</h2>
                <p>Enter your zip code below to find your local RooterMan. We'll meet your plumbing needs!</p>
                <div class="search-box">
                    <input type="text" placeholder="City, State, or Zip Code">
                    <button>Search</button>
                </div>
            </div>

            <div class="map-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/map.png" alt="map">
            </div>
        </div>
    </section>




    <section class="services container">
        <h2>Our Services</h2>
        <p>With decades worth of experience we are available to solve your problems 24 hours a day, 7 days a
            week.
        </p>

        <div class="service-cards">
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image1.png" alt="map">
                <h3>Emergency Plumbing</h3>
                <p>Our plumbers are ready to go 24/7 for emergencies - including nights, weekends and holidays.</p>
                <button>Explore this Service</button>
            </div>

            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image2.png" alt="map">
                <h3>Plumbing & Drains</h3>
                <p>As the largest plubing and draini service company, we make thousands of repairs every day.</p>
                <button>Explore this Service</button>
            </div>

            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image3.png" alt="map">
                <h3>Water Damage</h3>
                <p>Our teams are equipped with state-of-the-art water extraction and cleanup equipment.</p>
                <button>Explore this Service</button>
            </div>

            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image4.png" alt="map">
                <h3>Water Heaters</h3>
                <p>Trust Roto-Rooter for repair and replacement of gas, electric and tankless water heaters.</p>
                <button>Explore this Service</button>
            </div>
        </div>
        </div>
    </section>





    <section class="fitting-service container"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fiting.png');">
        <div class="fitting-content">
            <h4>THIS IS WHAT WE DO</h4>
            <h2>RooterMan To The Rescue!</h2>
            <p>Over the last 50+ years, the RooterMan name has spread to hundreds of locations across the US and
                Canada, all of them offering expert drain cleaning and plumbing services. If you have a plumbing
                problem – give us a call!</p>
            <button class="contact-button">866-577-1221</button>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/man.png" alt="man" class="fitting-image">
    </section>



    <section class="customer-feedback container">
        <h4>WHAT PEOPLE ARE SAYING</h4>
        <div class="view">
            <h2>Customer Feedback</h2>
            <button>View More</button>
        </div>

        <!-- carousal slider -->
        <div class="feedback-cards owl-carousel">
            <div class="feedback-card">
                <div class="stars"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/star1.png"
                        alt="star">
                </div>
                <p>Precious ipsum dolor sit amet consectetur adipisicing elit, sed dos mod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad min veniam, quis nostrud Precious ips um dolor sit
                    amet, consecte</p>
                <div class="customer-info">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/man1.png" alt="map">
                    <div class="name">
                        <b>Jacob William</b>
                        <p>SELLING AGENTS</p>
                    </div>
                </div>
            </div>


            <div class="feedback-card">
                <div class="stars"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.png"
                        alt="star">
                </div>
                <p>Precious ipsum dolor sit amet consectetur adipisicing elit, sed dos mod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad min veniam, quis nostrud Precious ips um dolor sit
                    amet, consecte</p>
                <div class="customer-info">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/man2.png" alt="map">
                    <div class="name">
                        <b>Jacob Williams</b>
                        <p>MARKETING AGENT</p>
                    </div>
                </div>
            </div>



            <div class="feedback-card">
                <div class="stars"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.png"
                        alt="star">
                </div>
                <p>Precious ipsum dolor sit amet consectetur adipisicing elit, sed dos mod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad min veniam, quis nostrud Precious ips um dolor sit
                    amet, consecte</p>
                <div class="customer-info">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/man2.png" alt="map">
                    <div class="name">
                        <b>Jacob Williams</b>
                        <p>MARKETING AGENT</p>
                    </div>
                </div>
            </div>

            <div class="feedback-card">
                <div class="stars"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.png"
                        alt="star">
                </div>
                <p>Precious ipsum dolor sit amet consectetur adipisicing elit, sed dos mod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad min veniam, quis nostrud Precious ips um dolor sit
                    amet, consecte</p>
                <div class="customer-info">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/man2.png" alt="map">
                    <div class="name">
                        <b>Jacob Williams</b>
                        <p>MARKETING AGENT</p>
                    </div>
                </div>
            </div>
        </div>


    </section>






    <section class="why-choose container"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/footer.png');">
        <div class="why-text">
            <h2>Why Choose RooterMan?</h2>
            <p>We provide fast and dependable plumbing services at reasonable rates.</p>
            <ul>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check"> 50+
                    Years of Service</li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check">
                    Professional and Friendly Technicians</li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check">Same-day
                    Service for Most Non-Emergencies</li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check">
                    Guaranteed
                    Repairs</li>
            </ul>
            <ul>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check">Best
                    Training in the Industry
                </li>

                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check">
                    Unrivaled Reputation</li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check">Drain &
                    Plumbing Experts
                </li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.png" alt="check"> Simple
                    and Fair Pricing</li>
            </ul>
        </div>
        <div class="video-button">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.png" alt="Play Button">
        </div>
    </section>










    <?php if ( is_active_sidebar( 'category' ) ) : ?>
    <div class="taxonomy-widget-area">
        <?php dynamic_sidebar( 'category' ); ?>
    </div>
    <?php endif; ?>




</main>




<?php get_footer(); ?>