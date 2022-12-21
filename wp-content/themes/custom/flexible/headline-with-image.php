<?php if (! defined('ABSPATH')) : exit; endif; ?>
<?php $options = get_sub_field('options'); $content = get_sub_field('content') ?>
<section class="headline-with-image">
  <div class="container-fluid max-width-container">
    <div class="row <?php if( $options['flip']): echo 'flip'; endif; ?>">
      <div class="col-lg-9">
        <div class="media-wrapper">
          <?php if( $options['background_type']): $video = get_sub_field('background_video')[0];?>
          <video class="background-video media" defaultmuted="" muted="" loop="" autoplay="" playsinline="" webkit-playsinline="" width="100%" height="auto" type="<?= $video['mime_type'] ?>" poster="<?= $video['icon'] ?>" src="<?= $video['url'] ?>"></video>
          <?php else: ?>
            <img class="background-image media" src="<?= get_sub_field('background_image')['sizes']['large'] ?>"></img>
          <?php endif; ?>
          <div class="cover"></div>
        </div>
      </div>
      <div class="col-lg-5 overlap">
        <h2 class="h1 headline"><?= $content['headline'] ?></h2>
      </div>
    </div>
    <?php if($content['content'] ): ?>
    <div class="row <?php if( $options['flip']): echo 'justify-content-end"'; endif; ?>" >
      <div class="col-lg-9">
        <article>
            <?= $content['content'] ?>
        </article>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
