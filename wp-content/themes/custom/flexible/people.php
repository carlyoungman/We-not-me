<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php if( have_rows('person', 'options') ): ?>
<section class="people">
  <div class="container-fluid max-width-container">
      <div class="row">
        <?php  while ( have_rows('person', 'options') ) : the_row();
              $image = get_sub_field('image'); $content = get_sub_field('content')  ?>
              <div class="col-lg-2 col-6">
                  <div class="person">
                      <img src="<?=$image['sizes']['thumbnail'];?>" alt="<?=$image['title'] ?>"></img>
                      <h6><?= $content['name']; ?></h6>
                      <p><?= $content['job_title']; ?></p>
                  </div>
             </div>
         <?php  endwhile; ?>
      </div>
  </div>
</section>
<?php endif; ?>
