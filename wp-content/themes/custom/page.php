<?php if ( ! defined( 'ABSPATH' ) ) {	exit;} ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_flexible_content();?>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
