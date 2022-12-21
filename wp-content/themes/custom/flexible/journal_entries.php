<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php
$query = new WP_Query( array(
     'post_type' => 'post',
     'post_status' => 'publish',
     'posts_per_page' => '-1'
 ));
  if($query->have_posts()):
     $count = 1;
 ?>
<section class="journal_entries">
  <div class="container">
      <div class="row">
          <div class="col">
              <ul>
              <?php  while ($query->have_posts() ) : $query->the_post(); ?>
                  <li class="h2"><a href="<?php the_permalink() ?>"><span class="portfolio-count"><?= sprintf("%02d", $count); ?></span><span><?php the_title() ?></span></a></li>
              <?php $count++; endwhile; wp_reset_postdata(); wp_reset_query(); ?>
            </ul>
          </div>
      </div>
  </div>
</section>
<?php endif; ?>
