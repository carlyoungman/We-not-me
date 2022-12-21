<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php $content = get_sub_field('content'); $image = get_sub_field('image') ?>
<section class="content-image-and-coloured-background">
  <div class="container-fluid max-width-container">
      <div class="row justify-content-between">
            <div class="col-lg-4 d-flex align-items-center">
                <article>
                    <?= $content['content'] ?>
                </article>
            </div>
            <div class="col-lg-7 d-flex align-items-center">
                <div class="headline"><h2 class="h3"><?= $content['headline'] ?></h2></div>
                <span class="colour-background  <?php if($image['background_colour']): echo 'background-'.$image['background_colour']; endif;  ?>"></span>
                <img class="background-image" src="<?= $image['background_image']['sizes']['large'] ?>"></img>
            </div>
      </div>
  </div>
</section>
