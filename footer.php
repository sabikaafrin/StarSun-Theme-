<footer>
    <div class="footer-container">
        <div class="footer-widgets">

            <?php if (is_active_sidebar('footer1')) : ?>

            <div class="footer-column logo-contact">
                <?php dynamic_sidebar('footer1'); ?>
            </div>

            <?php endif; ?>


            <?php if (is_active_sidebar('footer2')) : ?>
            <div class="footer-column">
                <?php dynamic_sidebar('footer2'); ?>
            </div>
            <?php endif; ?>


            <?php if (is_active_sidebar('footer3')) : ?>
            <div class="footer-column">
                <?php dynamic_sidebar('footer3'); ?>
            </div>
            <?php endif; ?>


            <?php if (is_active_sidebar('footer4')) : ?>
            <div class="footer-column">
                <?php dynamic_sidebar('footer4'); ?>
            </div>
            <?php endif; ?>


            <?php if (is_active_sidebar('footer5')) : ?>
            <div class="footer-column">
                <?php dynamic_sidebar('footer5'); ?>
            </div>
            <?php endif; ?>
        </div>



        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>

            <div class="link">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>

        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>