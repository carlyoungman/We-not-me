<?php
get_header(); ?>
<?php if ( have_posts( )) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php if ( ! is_page_template() ) : ?>
      <?php get_flexible_content();?>
      <?php if ( is_404() || is_page() ) : ?>
      <?php endif; ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
