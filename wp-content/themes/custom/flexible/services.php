<?php if (! defined('ABSPATH')) : exit; endif; ?>
<section class="services">
<?php  if (have_rows('services')) : ?>
    <div class="container-fluid max-width-container">
        <div class="row">
                <?php while (have_rows('services')) : the_row();  $content = get_sub_field('content'); ?>
                    <div class="col-lg col-md-6" data-text="<?= $content['title']; ?>">
                       <?php
                        if($content['link']):
                          echo '<a class="icon" href="' . esc_url($content['link']['url']) . '">';
                          if($content['svg_code']):
                            echo  $content['svg_code'];
                          endif;
                          echo '</a>';
                        endif;
                      ?>
                    </div>
                <?php endwhile; ?>
                <p class="title">Services</p>
        </div>
    </div>
<?php endif; ?>
<?php  if (have_rows('services')) : ?>
    <ul class="backgrounds">
        <?php while (have_rows('services')) : the_row(); $videos = get_sub_field('background')['background']; ?>
            <?php foreach ($videos as $video): ?>
                <li>
                  <video class="background-video media" defaultmuted="" muted="" loop="" autoplay="" playsinline="" webkit-playsinline="" width="100%" height="auto" type="<?= $video['mime_type'] ?>" poster="<?= $video['icon'] ?>" src="<?= $video['url'] ?>"></video>
                 </li>
            <?php endforeach; ?>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</section>
