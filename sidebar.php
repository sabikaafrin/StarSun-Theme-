  <!-- add sidebar using widgets -->
  <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
            <div class="hero-sidebar-widget">
                <?php dynamic_sidebar( 'sidebar1' ); ?>
            </div>
            <?php endif; ?>



    